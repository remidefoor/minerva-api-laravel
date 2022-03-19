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
}
