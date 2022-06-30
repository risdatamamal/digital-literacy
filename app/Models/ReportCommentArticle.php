<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCommentArticle extends Model
{
    use HasFactory;
    protected $table = 'report_comment_articles';
    protected $fillable = ['comment_id','user_id'];
}
