<?php

namespace App\Modules\Errors\Models;

use Illuminate\Support\MessageBag;

class Error
{
    private $statusCode;
    private $errors;

    public function __construct($statusCode, $errorsArray) {
        $this->statusCode = $statusCode;
        $this->errors = $errorsArray;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getErrors() {
        return $this->errors;
    }
}
