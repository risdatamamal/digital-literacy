<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\User;
use App\Models\CommentBook;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\BooksRequest;

class BookController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Book::where('user_id',Auth::user()->id)->get()
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

    public function show($id)
    {
        $data = [
            'book' => Book::find($id),
            'comments' => CommentBook::where('book_id',$id)->get()
        ];
        // dd($data)
        return view('pages.user.books.show', $data);
    }

    public function store(BooksRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $data['cover'] = $request->file('cover')->store('assets/book','public');

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

    public function update(BooksRequest $request, Book $book)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $item = Book::find($book->id);

        if ($request->file('cover') == null) 
        {
            $data['cover'] = $item->cover;
        } 
            
        else if($request->file('cover') != null)
        {
            unlink('storage/'. $item->cover);
            $data['cover'] = $request->file('cover')->store('assets/book','public');
        }

        $book->update($data);

        return redirect()->route('user.books.index')->with('success', 'Buku berhasil diupdate');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        // unlink('storage/'. $book->cover);

        return redirect()->route('user.books.index')->with('success', 'Buku berhasil dihapus');

    }
}
