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

        Book::create($data);

        return redirect()->route('user.books.index')->with('success', 'Buku berhasil dibuat');
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

        $book->update($data);

        return redirect()->route('user.books.index')->with('success', 'Buku berhasil diupdate');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('user.books.index')->with('success', 'Buku Berhasil dihapus');

    }
}
