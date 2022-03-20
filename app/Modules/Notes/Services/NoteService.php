<?php

namespace App\Modules\Notes\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Notes\Models\Note;

class NoteService extends Service
{
    protected $validationRules = [];

    public function __construct(Note $model) {
        parent::__construct($model);
    }

    public function getNotes($userId, $isbn) {
        return $this->model->where([
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->get();
    }

    public function addNote() {

    }

    public function deleteNote() {

    }

    public function noteExists() {

    }
}
