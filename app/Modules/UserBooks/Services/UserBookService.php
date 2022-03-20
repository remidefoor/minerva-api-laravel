<?php

namespace App\Modules\UserBooks\Services;

use App\Modules\Base\Services\Service;
use App\Modules\UserBooks\Models\BookUser;

class UserBookService extends Service
{
    protected $validationRules = [];

    public function __construct(BookUser $model) {
        parent::__construct($model);
    }

    public function getUserBooks($userId) {
        return $this->model->where('user_id', $userId)->get();
    }

    public function addUserBook($data) {

    }

    public function deleteUserBook($isbn, $userId) {
        $this->model->where([
            ['ISBN', '=', $isbn],
            ['user_id', '=', $userId]
        ])->delete();
    }
}
