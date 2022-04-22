<?php

namespace App\Modules\UserBooks\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Validation\Models\Error;
use App\Modules\UserBooks\Models\BookUser;

class UserBookService extends Service
{
    protected $validationRules = [
        'isbn' => ['string', 'required']
    ];

    public function __construct(BookUser $model) {
        parent::__construct($model);
    }

    public function getUserBooks($userId) {
        return $this->model->where('user_id', $userId)->get();
    }

    public function addUserBook($userId, $data) {
        $this->validate($data);
        if(!$this->hasError() && !$this->userBookExists($userId, $data['isbn'])) {
            $userBook = new BookUser();

            $userBook->user_id = $userId;
            $userBook->ISBN = $data['isbn'];

            $userBook->save();
        } else {
            $this->setError(new Error('The book is already present in the user\'s library.', 409));
        }
    }

    private function getUserBook($userId, $isbn) {
        return $userBook = $this->model->where([
            ['ISBN', $isbn],
            ['user_id', $userId]
        ])->first();
    }

    public function deleteUserBook($userId, $isbn) {
        $userBook = $this->model->where([
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->delete();
    }

    public function userBookExists($userId, $isbn) {
        return $this->getUserBook($userId, $isbn) != null;
    }
}
