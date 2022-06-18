<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard Admin

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', function () {
        return view('users');
    })->name('users');
    Route::get('/books', function () {
        return view('books');
    })->name('books');
});

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin', 'verified'])
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin-dashboard');
        Route::get('/users', function () {
            return view('admin.users.index');
        })->name('admin-users');
        Route::get('/books', function () {
            return view('admin.books.index');
        })->name('admin-books');
    });
