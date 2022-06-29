<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

<<<<<<< HEAD
=======

>>>>>>> dev
class BooksController extends Controller
{
    public function index()
    {
        $data = [
<<<<<<< HEAD
            'books' => Book::where('user_id',Auth::user()->id )->get()
=======
            'books' => Book::where('user_id',Auth::user()->id)->get()
>>>>>>> dev
        ];

        return view('pages.user.books.index', $data);
    }

    public function create()
    {
        $data = [
            'categories' => Category::all(),
<<<<<<< HEAD
            'user' => Auth::user()->id 
=======
            'user' => Auth::user()->id
>>>>>>> dev
        ];

        return view('pages.user.books.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Book::create($data);

<<<<<<< HEAD
        return redirect()->route('user.books.index')->with('success', 'Buku berhasil dibuat');
=======
        return redirect()->route('user.books.index')->with('success', 'Data berhasil dibuat');
>>>>>>> dev
    }

    public function edit(Book $book)
    {
        $data = [
            'item' => $book,
            'categories' => Category::all(),
<<<<<<< HEAD
            'user' => Auth::user()->id 
=======
            'user' => Auth::user()->id
>>>>>>> dev
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

<<<<<<< HEAD
        return redirect()->route('user.books.index')->with('success', 'Buku Berhasil dihapus');
=======
        // unlink('storage/'. $book->cover);

        return redirect()->route('user.books.index')->with('success', 'Buku berhasil dihapus');
>>>>>>> dev

    }
}
