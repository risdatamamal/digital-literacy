<?php

namespace App\Http\Controllers\user;

use App\Models\CommentQuote;
use App\Models\ReportCommentQuote;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentQuoteController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        CommentQuote::create($data);

        return redirect()->back();
    }

    public function report(Request $request)
    {
        // dd($request);
        $data = $request->all();
        // dd($data);
        ReportCommentQuote::create($data);

        return redirect()->back();
    }
}
