<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index() 
    {
        $data = [
            'users' => User::all(),
            'books' => Book::all()
        ];

        return view('pages.admin.dashboard', $data);
    }
}
