<?php

namespace App\Modules\Notes\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Notes\Models\Note;

class NoteService extends Service
{
    protected $validationRules = [
        'note' => ['string', 'required']
    ];

    public function __construct(Note $model) {
        parent::__construct($model);
    }

    public function getNotes($userId, $isbn) {
        return $this->model->where([
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->get();
    }

    public function addNote($userId, $isbn, $data) {
        $this->validate($data);
        if (!$this->hasError()) {
            $note = new Note();

            $note->user_id = $userId;
            $note->ISBN = $isbn;
            $note->note = $data['note'];

            $note->save();

            $this->result = $note->id;
        }
    }

    private function getNote($userId, $isbn, $noteId) {
        return $this->model->where([
            ['id', $noteId],
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->first();
    }

    public function deleteNote($userId, $isbn, $noteId) {
        $this->model->where([
            ['id', $noteId],
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->delete();
    }

    public function noteExists($userId, $isbn, $noteId) {
        return $this->getNote($userId, $isbn, $noteId) != null;
    }
}
