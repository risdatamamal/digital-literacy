<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('pages.user.dashboard');
    }
}
