<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\User;
use App\Models\Library;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Library::getUserRegisteredBook(Auth::user()->id)
        ];
        
        return view('pages.user.library', $data);
    }

    public function add($id_book)
    {
        $book = Book::find($id_book);

        $isUserRegistered = Library::where('book_id', $id_book)->where('user_id', Auth::user()->id)->first();

        if($isUserRegistered) {
            return redirect('/')->with('sudah-terdaftar', 'Anda sudah terdaftar pada book '. $book->title . ' silahkan cek bagian Library');
        } else {
            // mendaftarkan user pada book yang dimaksud
            $newLibrary = new Library;
            $newLibrary->book_id = $id_book;
            $newLibrary->user_id = Auth::user()->id;
            $newLibrary->save();
            
            return redirect('/library')->with('berhasil', 'Berhasil mendaftar ke acara '. $book->title);
        }
    }
}
