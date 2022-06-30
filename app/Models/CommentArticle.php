<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    use HasFactory;
    protected $table = 'comment_articles';
    protected $fillable = ['article_id','user_id','message'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
