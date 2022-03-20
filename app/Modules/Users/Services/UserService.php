<?php

namespace App\Modules\Users\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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
            $user = new User();

            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);

            $user->save();

            $this->result = $user->id;
        }
    }

    public function userExists($userId) {
        return $this->find($userId) != null;
    }
}
