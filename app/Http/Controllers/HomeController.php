<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $books = Book::with(['cover'])->latest()->get();

        // return view('pages.index', compact('books'));
        return view('pages.index');
    }
}
