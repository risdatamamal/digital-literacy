<?php

use App\Http\Controllers\admin\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\QuotesController;

use App\Http\Controllers\user\BooksController as UserBooksController;
<<<<<<< HEAD
use App\Http\Controllers\user\ArticleController as UserArticleController;
=======
>>>>>>> dev

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
    return view('pages.index');
})->name('home');

// User
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
<<<<<<< HEAD
    Route::resource('/books', UserBooksController::class, ['as' => 'user']);
    Route::resource('/articles', UserArticleController::class, ['as' => 'user']);
    
=======
    Route::resource('/books', UserBooksController::class, ['as'=>'user']);
>>>>>>> dev
});

// Admin
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin', 'verified'])
    ->group(function() {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin-dashboard');
        Route::resource('/users', UsersController::class);
        Route::resource('/books', BooksController::class);
        Route::resource('/categories', CategoriesController::class);
        Route::resource('/quotes', QuotesController::class);
        Route::resource('/articles', ArticleController::class);
    });
