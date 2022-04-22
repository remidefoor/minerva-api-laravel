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

    public function retrieveNotes($userId, $isbn) {
        $this->userService->ensureUserExists($userId);
        if ($this->userService->hasError()) throw $this->userService->getError();

        $this->userBookService->ensureUserBookExists($userId, $isbn);
        if ($this->userBookService->hasError()) throw $this->userBookService->getError();

        return $this->readNotes($userId, $isbn);
    }

    private function readNotes($userId, $isbn) {
        return $this->model->where([
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->get();
    }

    private function getNote($userId, $isbn, $noteId) {
        return $this->model->where([
            ['id', $noteId],
            ['user_id', $userId],
            ['ISBN', $isbn]
        ])->first();
    }

    public function addNote($userId, $isbn, $data) {
        $this->userService->ensureUserExists($userId);
        if ($this->userService->hasError()) {
            $this->setError($this->userService->getError());
        } else {
            $this->userBookService->ensureUserBookExists($userId, $isbn);
            if ($this->userBookService->hasError()) {
                $this->setError($this->userBookService->getError());
            } else {
                $this->validate($data);
                if (!$this->hasError()) $this->createNote($userId, $isbn, $data['note']);
            }
        }
    }

    private function createNote($userId, $isbn, $noteText) {
        $note = new Note();

        $note->user_id = $userId;
        $note->ISBN = $isbn;
        $note->note = $noteText;

        $note->save();

        $this->result = $note->id;
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
