<?php

namespace App\Modules\Base\Services;

use App\Modules\Validation\Models\Error;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

abstract class Service
{
    protected $model;
    protected $result;
    private $error;
    protected $validationRules;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getResult() {
        return $this->result;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError($error) {
        if (is_null($this->error)) {
            $this->error = $error;
        }
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function validate($data)
    {
        $validator = Validator::make($data, $this->validationRules);
        if ($validator->fails()) $this->setError(new Error(
            'The request contains an invalid body.',
            400,
            $validator->errors()->toArray()
        ));
    }

    public function find($id) {
        return $this->model->find($id);
    }
}
