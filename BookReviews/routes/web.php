<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewsController;

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
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class)->only(['index', 'show']);

Route::resource('books.reviews', ReviewsController::class)->shallow()->only(['create', 'store']);

Route::fallback(function () {
    echo "nothing";
});

