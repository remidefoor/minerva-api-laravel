<?php

namespace App\Http\Controllers;


use App\Modules\UserBooks\Services\UserBookService;
use App\Modules\Users\Models\User;
use App\Modules\Validation\Models\Error;
use Illuminate\Http\Request;

class UserBookApiController extends Controller
{
   public function getUserBooks(UserBookService $service, $userId) {
       try {
           $userBooks = $service->retrieveUserBooks($userId);
           return response($userBooks)
               ->setStatusCode(200);
       } catch (Error $error) {
           return response(['message' => $error->getMessage(), 'errors' => $error->getErrors()])
               ->setStatusCode($error->getCode());
       }
   }

   public function postUserBook(UserBookService $service, Request $request, $userId) {
       $data = $request->all();
       $service->addUserBook($userId, $data);

       if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getCode());
        }

        return response('')
            ->setStatusCode(201);
   }

   public function deleteUserBook(UserBookService $service, $userId, $isbn) {
        $service->removeUserBook($userId, $isbn);

        if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getCode());
        }

        return response('')
            ->setStatusCode(204);
   }
}
