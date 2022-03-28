<?php

namespace App\Http\Controllers;


use App\Modules\UserBooks\Services\UserBookService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;

class UserBookApiController extends Controller
{
   public function getUserBooks(UserBookService $service, $userId) {
       $userBooks = $service->getUserBooks($userId);
       return response($userBooks)
           ->setStatusCode(200);
   }

   public function addUserBook(UserBookService $service, Request $request, $userId) {
        $data = $request->all();
       $service->addUserBook($userId, $data);

       if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getStatusCode());
        }

        return response('')
            ->setStatusCode(201);
   }

   public function deleteUserBook(UserBookService $service, $userId, $isbn) {
        $service->deleteUserBook($userId, $isbn);
        return response('')
            ->setStatusCode(204);
   }
}
