<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
           'quotes' => Quote::where('user_id',Auth::user()->id)->get()
        ];

        return view('pages.user.quotes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'quotes' => Quote::where('user_id',Auth::user()->id)->get(),
            'user' => Auth::user()->id
        ];

        return view('pages.user.quotes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        // $data['cover'] = $request->file('cover')->store('assets/book','public');

        Quote::create($data);

        return redirect()->route('user.quotes.index')->with('success', 'Quote berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
        $data = [
            'item' => $quote,
            'user' => Auth::user()->id
        ];

        return view('pages.user.quotes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
        $data = $request->all();
        $quote->update($data);
        return redirect()->route('user.quotes.index')->with('success', 'Quote berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
        $quote->delete();
        return redirect()->route('user.quotes.index')->with('success', 'Quote berhasil dihapus');
    }
}
