<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\QuotesController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DashboardAdminController;

use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\BookController as UserBooksController;
use App\Http\Controllers\user\ArticleController as UserArticleController;
use App\Http\Controllers\user\PointsController;
use App\Http\Controllers\user\WritingController;
use App\Http\Controllers\user\BooksRatingController;
use App\Http\Controllers\user\ArticlesRatingController;

use App\Http\Controllers\user\CommentBookController;
use App\Http\Controllers\user\CommentArticleController;
use App\Http\Controllers\user\CommentQuoteController;
use App\Http\Controllers\user\QuotesController as UserQuotesController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// User
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', UserBooksController::class, ['as' => 'user']);
    Route::resource('articles', UserArticleController::class, ['as' => 'user']);
    Route::get('/points', [PointsController::class, 'index'])->name('user.points');
    Route::resource('/quotes', UserQuotesController::class, ['as' => 'user']);

    Route::prefix('writings')
    ->group(function() {
        Route::prefix('books')
        ->group(function() {
            Route::get('/', [WritingController::class, 'books'])->name('user.writing.books');
            Route::put('/{id}/comment', [CommentBookController::class, 'store'])->name('user.books.comment.store');
            Route::put('/{id}/comment/report', [CommentBookController::class, 'report'])->name('user.books.comment.report');
            Route::put('/{id}/rating/rate', [BooksRatingController::class, 'set'])->name('user.books.rating.set');
        });

        Route::prefix('articles')
        ->group(function() {
            Route::get('/', [WritingController::class, 'articles'])->name('user.writing.articles');
            Route::put('/{id}/comment', [CommentArticleController::class, 'store'])->name('user.articles.comment.store');
            Route::put('/{id}/comment/report', [CommentArticleController::class, 'report'])->name('user.articles.comment.report');
            Route::put('/{id}/rating/rate', [ArticlesRatingController::class, 'set'])->name('user.articles.rating.set');
        });

        Route::prefix('quotes')
        ->group(function() {
            Route::get('/', [WritingController::class, 'quotes'])->name('user.writing.quotes');
            Route::put('/{id}/comment', [CommentQuoteController::class, 'store'])->name('user.quotes.comment.store');
            Route::put('/{id}/comment/report', [CommentQuoteController::class, 'report'])->name('user.quotes.comment.report');
        });
    });

});

// Admin
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin', 'verified'])
    ->group(function() {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin-dashboard');
        Route::resource('users', UsersController::class);
        Route::resource('books', BooksController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('quotes', QuotesController::class);
        Route::resource('articles', ArticleController::class);
    });
