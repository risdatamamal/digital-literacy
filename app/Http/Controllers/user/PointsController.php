<?php

namespace App\Http\Controllers\user;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{
    public function index() 
    {
        $personal_point = Point::where('user_id',Auth::user()->id);
    
        $data = [
            'points' => $personal_point->get(),
            'total_points' => $personal_point->sum('amount')
        ];

        return view('pages.user.points.index', $data);
    }
}
