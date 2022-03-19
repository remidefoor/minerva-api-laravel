<?php

namespace App\Modules\Books\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Books\Models\BookUser;

class BookService extends Service
{
    protected $validationRules = [];

    public function __construct(BookUser $model) {
        parent::__construct($model);
    }
}
