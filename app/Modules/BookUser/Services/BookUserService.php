<?php

namespace App\Modules\BookUser\Services;

use App\Modules\Base\Services\Service;
use App\Modules\BookUser\Models\BookUser;

class BookUserService extends Service
{
    protected $validationRules = [];

    public function __construct(BookUser $model) {
        parent::__construct($model);
    }

    public function getUserBooks($id) {
        return $this->model->where('user_id', $id)->get();
    }

    public function addUserBook($data) {

    }

    public function deleteUserBook($isbn, $id) {

    }
}
