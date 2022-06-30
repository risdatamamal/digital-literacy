<?php

namespace App\Http\Controllers\user;

use App\Models\CommentBook;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentBookController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        CommentBook::create($data);

        return redirect()->back();
    }

}
