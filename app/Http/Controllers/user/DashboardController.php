<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Article;
use App\Models\Quote;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        $data = [
            'books' => Book::where('user_id',Auth::user()->id)->get(),
            'articles' => Article::where('user_id',Auth::user()->id)->get(),
            'quotes' => Quote::where('user_id',Auth::user()->id)->get()
        ];
        // dd($data);
        return view('pages.user.dashboard',$data);
    }
}
