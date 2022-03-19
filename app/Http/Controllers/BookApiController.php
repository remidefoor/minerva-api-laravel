<?php

namespace App\Http\Controllers;


use App\Modules\BookUser\Services\BookUserService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
   public function getBooks(Request $request, BookUserService $service) {  // TODO remove request
       $email = $request->header('email');
       $id = $this->getUserIdByEmail($email);
   }

   public function addBook(Request $request) {

   }

   public function deleteBook($isbn) {

   }

   private function getUserIdByEmail($email) {  // TODO remove
       return User::where('email', '=', $email)->first()->id;
   }
}
