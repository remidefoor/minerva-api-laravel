<?php

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

// auth
Route::post('/register', function () {});
Route::post('/login', function () {});

// books
Route::get('/books', function () {});
Route::post('/books', function () {});
Route::delete('/books/{isbn}', function () {});

// notes
Route::get('/books/{isbn}/notes', function () {});
Route::post('/books/{isbn}/notes', function () {});
Route::delete('/books/{isbn}/notes/{id}', function () {});
