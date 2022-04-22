<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\UserBookApiController;
use App\Http\Controllers\NoteApiController;
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

// users
Route::post('/users', [UserApiController::class, 'createUser']);
Route::post('/users/log-in', [UserApiController::class, 'logIn']);

// user books
Route::get('/users/{userId}/books', [UserBookApiController::class, 'getUserBooks']);
Route::post('/users/{userId}/books', [UserBookApiController::class, 'addUserBook']);
Route::delete('/users/{userId}/books/{isbn}', [UserBookApiController::class, 'deleteUserBook']);

// notes
Route::get('/users/{userId}/books/{isbn}/notes', [NoteApiController::class, 'getNotes']);
Route::post('/users/{userId}/books/{isbn}/notes', [NoteApiController::class, 'addNote']);
Route::delete('/users/{userId}/books/{isbn}/notes/{noteId}', [NoteApiController::class, 'deleteNote']);

Route::get('/books/bestsellers', [BookApiController::class, 'getBestsellers']);
