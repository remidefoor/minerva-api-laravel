<?php

namespace App\Http\Controllers;


use App\Modules\BookUser\Services\BookUserService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
   public function getUserBooks(Request $request, BookUserService $service) {  // TODO remove request
       $email = $request->header('email');
       $id = $this->getUserIdByEmail($email);
       $userBooks = $service->getUserBooks($id);
       return response($userBooks)
           ->setStatusCode(200);
   }

   public function addUserBook(Request $request) {

   }

   public function deleteUserBook($isbn) {

   }

   private function getUserIdByEmail($email) {  // TODO remove
       return User::where('email', $email)->first()->id;
   }
}
