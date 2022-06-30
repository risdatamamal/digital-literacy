<?php

namespace App\Http\Controllers\user;

use App\Models\CommentArticle;
use App\Models\ReportCommentArticle;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentArticleController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        CommentArticle::create($data);

        return redirect()->back();
    }

    public function report(Request $request)
    {
        // dd($request);
        $data = $request->all();
        // dd($data);
        ReportCommentArticle::create($data);

        return redirect()->back();
    }
}
