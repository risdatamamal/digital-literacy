<?php

namespace App\Http\Controllers\user;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\Book;
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


}
