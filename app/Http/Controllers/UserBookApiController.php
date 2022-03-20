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

        $service->validate($data);
        if ($service->hasErrors()) {
            return response(['message' => 'The request contains an invalid body.', 'errors' => $service->getErrors()])
                ->setStatusCode(400);
        }

        if ($service->userBookExists($userId, $data['isbn'])) {
            return response(['message' => 'The book is already present in the user\'s library.'])
                ->setStatusCode(409);
        }

        $service->addUserBook($userId, $data);
        return response('')
            ->setStatusCode(201);
   }

   public function deleteUserBook(UserBookService $service, $userId, $isbn) {
        $service->deleteUserBook($userId, $isbn);
        return response('')
            ->setStatusCode(204);
   }
}
