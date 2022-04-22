<?php

namespace App\Modules\Validation\Models;

use Illuminate\Support\MessageBag;

class Error extends \Exception
{
    private $errors;

    public function __construct($message, $code, $associativeErrorArray = []) {
        parent::__construct($message, $code);
        $this->errors = new MessageBag($associativeErrorArray);
    }

    public function getErrors() {
        return $this->errors->all();
    }
}
