<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'points';

    protected $fillable = [
        'amount',
        'user_id',
        'resource_type',
        'book_id',
        'article_id',
        'quote_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

    public function quote()
    {
        return $this->belongsTo('App\Models\Quotes');
    }
}
