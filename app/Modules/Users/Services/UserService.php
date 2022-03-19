<?php

namespace App\Modules\Users\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends Service
{
    protected $validationRules = [];

    public function __construct(User $model) {
        parent::__construct($model);
    }
}
