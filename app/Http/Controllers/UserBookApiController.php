<?php

namespace App\Http\Controllers;


use App\Modules\UserBooks\Services\UserBookService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;

class UserBookApiController extends Controller
{
   public function getUserBooks(UserBookService $service, $userId) {  // TODO remove request
       $userBooks = $service->getUserBooks($userId);
       return response($userBooks)
           ->setStatusCode(200);
   }

   public function addUserBook(Request $request) {

   }

   public function deleteUserBook(UserBookService $service, $userId, $isbn) {
        $service->deleteUserBook($isbn, $userId);
        return response()
            ->setStatusCode(204);
   }
}
