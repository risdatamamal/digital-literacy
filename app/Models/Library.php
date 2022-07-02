<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    protected $table = 'libraries';

    protected $fillable = [
        'book_id', 'user_id'
    ];

    public function book() 
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public static function getRegisteredUser($id_book) {
        return DB::table('users')
            ->join('libraries', 'users.id', '=', 'libraries.user_id')
            ->join('books', 'books.id', '=', 'libraries.book_id')
            ->select('users.*')
            ->where('books.id', $id_book)
            ->get()->toArray();
    }

    public static function getRegisteredUserEmail($id_book) {
        $user = DB::table('users')
            ->join('libraries', 'users.id', '=', 'libraries.user_id')
            ->join('books', 'books.id', '=', 'libraries.book_id')
            ->select('users.email')
            ->where('books.id', $id_book)
            ->get()->toArray();
        
        // transform format from [{email: email1}, {email: email2}, ...] to [email1, email2, ...]
        $emails = [];
        foreach($user as $data) {
            array_push($emails, $data->email);
        }
        return $emails;
    }

    public static function getUserRegisteredBook($id_user) {
        return DB::table('users')
            ->join('libraries', 'users.id', '=', 'libraries.user_id')
            ->join('books', 'books.id', '=', 'libraries.book_id')
            ->select('books.*')
            ->where('users.id', $id_user)
            ->get()->toArray();
    }
}
