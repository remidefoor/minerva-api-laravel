<?php

namespace App\Http\Controllers;


use App\Modules\BookUser\Services\BookUserService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
   public function getUserBooks(BookUserService $service, $id) {  // TODO remove request
       $userBooks = $service->getUserBooks($id);
       return response($userBooks)
           ->setStatusCode(200);
   }

   public function addUserBook(Request $request) {

   }

   public function deleteUserBook($isbn) {

   }
}
