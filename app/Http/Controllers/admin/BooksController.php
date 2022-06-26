<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
