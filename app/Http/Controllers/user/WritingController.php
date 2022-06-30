<?php

namespace App\Http\Controllers\user;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Article;
use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WritingController extends Controller
{
    public function books(Request $request) 
    {
        $key = $request->key;
        
        if($key != []) $books = Book::where('title', 'LIKE', "%{$key}%")->get();
        else $books = Book::all();

        $data = [
            'books' => $books,
            'key' => $key
        ];

        return view('pages.user.writings.books', $data);
    }

    public function articles(Request $request) 
    {
        $key = $request->key;
        
        if($key != []) $articles = Article::where('title', 'LIKE', "%{$key}%")->get();
        else $articles = Article::all();

        $data = [
            'articles' => $articles,
            'key' => $key
        ];

        return view('pages.user.writings.articles', $data);
    }

    public function quotes(Request $request) 
    {
        $key = $request->key;
        
        if($key != []) $quotes = Quote::where('title', 'LIKE', "%{$key}%")->get();
        else $quotes = Quote::all();

        $data = [
            'quotes' => $quotes,
            'key' => $key
        ];

        return view('pages.user.writings.quotes', $data);
    }

    
}
