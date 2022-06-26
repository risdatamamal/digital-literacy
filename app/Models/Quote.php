<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';

    protected $fillable = [
      'title',
      'rating',
      'content',
      'user_id'  
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
