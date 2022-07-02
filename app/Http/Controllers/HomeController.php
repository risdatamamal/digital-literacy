<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all()->take(6);

        return view('pages.index', [
            'books' => $books
        ]);
    }

    public function details(Request $request, $slug)
    {
        $book = Book::all()->where('slug', $slug)->firstOrFail();

        return view('pages.details', ['book' => $book]);
    }
}
