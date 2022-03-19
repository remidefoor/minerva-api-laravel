<?php

namespace App\Modules\Base\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

abstract class Service
{
    protected $model;
    private $result;
    private $errors;
    protected $validationRules;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->errors = new MessageBag();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return $this->errors->isNotEmpty();
    }

    protected function validate($data)
    {
        $this->errors = new MessageBag();

        $validator = Validator::make($data, $this->validationRules);
        if ($validator->fails()) $this->errors = $validator->errors();
    }

    protected function find($id) {
        return $this->model->find($id);
    }
}
