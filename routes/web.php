<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

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

// User

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', function () {
        return view('users');
    })->name('users');
    Route::get('/books', function () {
        return view('books');
    })->name('books');
});

// Admin

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin', 'verified'])
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin-dashboard');
        Route::resource('/users', UsersController::class);
        Route::get('/books', function () {
            return view('admin.books.index');
        })->name('admin-books');
    });
