<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all()->take(6);

        return view('pages.index', [
            'books' => $books
        ]);
        // return view('pages.index');
    }
}
