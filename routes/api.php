<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\NoteApiController;

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
Route::post('/register', [UserApiController::class, 'createUser']);
Route::post('/login', [UserApiController::class, 'login']);

// books
Route::get('/books', [BookApiController::class, 'getUserBooks']);
Route::post('/books', [BookApiController::class, 'addUserBook']);
Route::delete('/books/{isbn}', [BookApiController::class, 'deleteUserBook']);

// notes
Route::get('/books/{isbn}/notes', [NoteApiController::class, 'getNotes']);
Route::post('/books/{isbn}/notes', [NoteApiController::class, 'addNote']);
Route::delete('/books/{isbn}/notes/{id}', [NoteApiController::class, 'deleteNote']);
