<?php

namespace App\Modules\UserBooks\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Users\Services\UserService;
use App\Modules\Validation\Models\Error;
use App\Modules\UserBooks\Models\BookUser;

class UserBookService extends Service
{
    private $userService;
    protected $validationRules = [
        'isbn' => ['string', 'required']
    ];

    public function __construct(BookUser $model, UserService $userService) {
        parent::__construct($model);
        $this->userService = $userService;
    }

    public function retrieveUserBooks($userId) {
        $this->userService->ensureUserExists($userId);
        if ($this->userService->hasError()) throw $this->userService->getError();
        return $this->model->where('user_id', $userId)->get();
    }

    public function addUserBook($userId, $data) {
        $this->userService->ensureUserExists($userId);
        if ($this->userService->hasError()) $this->setError($this->userService->getError());

        $this->validate($data);
        if(!$this->hasError()) {
            $this->ensureUserBookNotExists($userId, $data['isbn']);
            if (!$this->hasError()) $this->createUserBook($userId, $data['isbn']);
        }
    }

    private function ensureUserBookNotExists($userId, $isbn) {
        if ($this->userBookExists($userId, $isbn)) {
            $this->setError(new Error('The book is already present in the user\'s library.', 409));
        }
    }

    private function createUserBook($userId, $isbn) {
        $userBook = new BookUser();

        $userBook->user_id = $userId;
        $userBook->ISBN = $isbn;

        $userBook->save();
    }

    private function getUserBook($userId, $isbn) {
        return $userBook = $this->model->where([
            ['ISBN', $isbn],
            ['user_id', $userId]
        ])->first();
    }

    public function removeUserBook($userId, $isbn) {
        $this->userService->ensureUserExists($userId);
        if ($this->userService->hasError()) $this->setError($this->userService->getError());

        $this->ensureUserBookExists($userId, $isbn);
        if (!$this->hasError()) $this->deleteUserBook($userId, $isbn);
}

    private function deleteUserBook($userId, $isbn) {
        $userBook = $this->model->where([
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->delete();
    }

    public function ensureUserBookExists($userId, $isbn) {
        if (!$this->userBookExists($userId, $isbn)) {
            $this->setError(new Error("The book with ISBN $isbn has not been found for the current user.", 404));
        }
    }

    private function userBookExists($userId, $isbn) {
        return $this->getUserBook($userId, $isbn) != null;
    }
}
