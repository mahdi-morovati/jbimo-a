<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/books', [BooksController::class, 'getCollection']);

Route::post('/books', [BooksController::class, 'post'])->middleware('auth.admin');

Route::post('/books/{book}/reviews', [BooksController::class, 'postReview'])->middleware('auth.admin');

