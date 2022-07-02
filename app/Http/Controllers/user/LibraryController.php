<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        return view('pages.user.books.index');
    }
}
