<?php

namespace App\Modules\Users\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Validation\Models\Error;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UserService extends Service
{
    protected $validationRules = [
        'email' => ['email', 'required'],
        'password' => ['string', 'required']
    ];

    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function emailIsAvailalbe($email) {
        return $this->model->where('email', $email)->get()->isEmpty();
    }

    public function createUser($data) {
        $this->validate($data);
        if (!$this->hasError() && $this->emailIsAvailalbe($data['email'])) {
            $user = new User();

            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);

            $user->save();

            $this->result = $user->id;
        } else {
            $this->setError(new Error('The email is already taken.', 409));
        }
    }

    public function login($data) {
        $this->validate($data);
        if (!$this->hasError() && !$this->emailIsAvailalbe($data['email'])) {
            $user = $this->model->where('email', $data['email'])->first();
            if (Hash::check($data['password'], $user->password)) {
                $this->result = $user->id;
            } else {
                $this->setError(new Error('The username or password is invalid.', 403));
            }
        } else {
            $this->setError(new Error('The username or password is invalid.', 403));
        }
    }

    public function ensureUserExists($userId) {
        if (!$this->userExists($userId)) {
            $this->setError(new Error("The user with ID $userId has not been found.", 404));
        }
    }

    private function userExists($userId) {
        return $this->find($userId) != null;
    }
}
