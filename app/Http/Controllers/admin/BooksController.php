<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BooksRequest;

class BooksController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Book::all()
        ];

        return view('pages.admin.books.index', $data);
    }

    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'users' => User::all()
        ];

        return view('pages.admin.books.create', $data);
    }

    public function store(BooksRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $data['cover'] = $request->file('cover')->store('assets/book','public');

        Book::create($data);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $data = [
            'item' => $book,
            'categories' => Category::all(),
            'users' => User::all()
        ];

        return view('pages.admin.books.edit', $data);
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

        return redirect()->route('books.index');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        unlink('storage/'. $book->cover);

        return redirect()->route('books.index');

    }
}
