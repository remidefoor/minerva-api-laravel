<?php

namespace App\Http\Controllers;

use App\Modules\Users\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function createUser(UserService $service, Request $request) {
        $data = $request->all();
        $service->createUser($data);
        if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getStatusCode());
        }
        return response(['id' => $service->getResult()])
            ->setStatusCode(201);
    }

    public function logIn(UserService $service, Request $request) {
        $data = $request->all();
        $service->login($data);
        if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getStatusCode());
        }
        return response(['id' => $service->getResult()])
            ->setStatusCode(200);
    }
}
