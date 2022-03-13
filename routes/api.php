<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApiController;

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

// auth
Route::post('/register', function () {});
Route::post('/login', function () {});

// books
Route::get('/books', [BookApiController::class, 'getBooks']);
Route::post('/books', [BookApiController::class, 'addBook']);
Route::delete('/books/{isbn}', [BookApiController::class, 'deleteBook']);

// notes
Route::get('/books/{isbn}/notes', function () {});
Route::post('/books/{isbn}/notes', function () {});
Route::delete('/books/{isbn}/notes/{id}', function () {});
