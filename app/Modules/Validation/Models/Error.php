<?php

namespace App\Modules\Validation\Models;

use Illuminate\Support\MessageBag;

class Error
{
    private $message;
    private $statusCode;
    private $errors;

    public function __construct($message, $statusCode, $associativeErrorArray = []) {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->errors = new MessageBag($associativeErrorArray);
    }

    public function getMessage() {
        return $this->message;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getErrors() {
        return $this->errors->all();
    }
}
