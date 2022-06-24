<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

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
        return view('pages.admin.books.create');
    }
}
