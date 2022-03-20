<?php

namespace App\Modules\Users\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends Service
{
    protected $validationRules = [
        'email' => ['email', 'required', 'unique:users'],
        'password' => ['string', 'required']
    ];

    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function createUser($data) {
        $this->validate($data);
        if (!$this->hasErrors()) {
            $this->model->create($data);
        }
    }

    public function userExists($id) {
        return $this->find($id) != null;
    }
}
