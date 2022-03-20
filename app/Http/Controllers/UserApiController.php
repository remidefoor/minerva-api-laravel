<?php

namespace App\Http\Controllers;

use App\Modules\Users\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function createUser(UserService $service, Request $request) {
        $data = $request->all();
        $service->createUser($data);
        if ($service->hasErrors()) {
            return response(['message' => 'The request contains an invalid body.', 'errors' => $service->getErrors()])
                ->setStatusCode(400);
        }
        return response('')
            ->setStatusCode(201);
    }

    public function login(Request $request) {

    }
}
