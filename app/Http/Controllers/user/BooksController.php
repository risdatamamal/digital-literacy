<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Book::where('user_id',Auth::user()->id )->get()
        ];

        return view('pages.user.books.index', $data);
    }

    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'user' => Auth::user()->id 
        ];

        return view('pages.user.books.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // $data['cover'] = $request->file('cover')->store('assets/book','public');

        Book::create($data);

        return redirect()->route('user.books.index')->with('success', 'Data berhasil dibuat');
    }

    public function edit(Book $book)
    {
        $data = [
            'item' => $book,
            'categories' => Category::all(),
            'user' => Auth::user()->id 
        ];

        return view('pages.user.books.edit', $data);
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        // $item = Book::find($book->id);

        // if ($request->file('cover') == null) 
        // {
        //     $data['cover'] = $item->cover;
        // } 
            
        // else if($request->file('cover') != null)
        // {
        //     unlink('storage/'. $item->cover);
        //     $data['cover'] = $request->file('cover')->store('assets/book','public');
        // }

        $book->update($data);

        return redirect()->route('user.books.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        // unlink('storage/'. $book->cover);

        return redirect()->route('user.books.index')->with('success', 'Data berhasil dihapus dari Admin');

    }
}
