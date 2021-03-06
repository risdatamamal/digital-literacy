<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBook extends Model
{
    use HasFactory;
    
    protected $table = 'request_books';

    protected $fillable = [
        'title',
        'genre',
        'author',
        'user_id'
    ];
}
