<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\QuotesRating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;

class QuotesRatingController extends Controller
{
    //
    public function set(Request $request)
    {
        $data = $request->all();
        // dd($data);
        QuotesRating::updateOrCreate(
            [
                'quote_id' => $data['quote_id'],
                'user_id' => $data['user_id']
            ],
            ['value' => $data['value']]
        );
        Quote::find($data['quote_id'])
            ->update(['rating' => QuotesRating::where('quote_id',$data['quote_id'])->avg('value')]);

        return redirect()->back();
    }
}
