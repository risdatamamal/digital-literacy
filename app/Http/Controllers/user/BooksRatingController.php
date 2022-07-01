<?php

namespace App\Http\Controllers\user;

use App\Models\BooksRating;
use App\Models\ReportCommentBook;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BooksRatingController extends Controller
{
    public function set(Request $request)
    {
        $data = $request->all();
        // dd($data);
        BooksRating::updateOrCreate(
            [
                'book_id' => $data['book_id'],
                'user_id' => $data['user_id']
            ],
            ['value' => $data['value']]
        );
        Book::find($data['book_id'])
            ->update(['rating' => BooksRating::where('book_id',$data['book_id'])->avg('value')]);

        return redirect()->back();
    }

}
