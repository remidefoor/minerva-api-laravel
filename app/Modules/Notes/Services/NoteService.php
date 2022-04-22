<?php

namespace App\Modules\Notes\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Notes\Models\Note;
use App\Modules\UserBooks\Services\UserBookService;
use App\Modules\Users\Services\UserService;
use App\Modules\Validation\Models\Error;

class NoteService extends Service
{
    private $userService;
    private $userBookService;
    protected $validationRules = [
        'note' => ['string', 'required']
    ];

    public function __construct(Note $model, UserService $userService, UserBookService $userBookService) {
        parent::__construct($model);
        $this->userService = $userService;
        $this->userBookService = $userBookService;
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

    private function ensureNoteExists($userId, $isbn, $noteId) {
        if (!$this->noteExists($userId, $isbn, $noteId)) {
            $this->setError(new Error("A note with ID $noteId has not been found for the current user and book.", 404));
        }
    }

    public function noteExists($userId, $isbn, $noteId) {
        return $this->getNote($userId, $isbn, $noteId) != null;
    }
}
