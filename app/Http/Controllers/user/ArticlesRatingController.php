<?php

namespace App\Http\Controllers\user;

use App\Models\ArticlesRating;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesRatingController extends Controller
{
    //
    public function set(Request $request)
    {
        $data = $request->all();
        // dd($data);
        ArticlesRating::updateOrCreate(
            [
                'article_id' => $data['article_id'],
                'user_id' => $data['user_id']
            ],
            ['value' => $data['value']]
        );
        Article::find($data['article_id'])
            ->update(['rating' => ArticlesRating::where('article_id',$data['article_id'])->avg('value')]);

        return redirect()->back();
    }
}
