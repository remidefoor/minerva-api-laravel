<?php

namespace App\Http\Controllers;

use App\Modules\Notes\Services\NoteService;
use Illuminate\Http\Request;

class NoteApiController extends Controller
{
    public function getNotes(NoteService $service, $userId, $isbn) {
        $notes = $service->getNotes($userId, $isbn);
        return response($notes)
            ->setStatusCode(200);
    }

    public function addNote(NoteService $service, Request $request, $userId, $isbn) {
        $data = $request->all();
        $service->addNote($userId, $isbn, $data);
        if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getCode());
        }
        return response(['id' => $service->getResult()])
            ->setStatusCode(201);
    }

    public function deleteNote(NoteService $service, $userId, $isbn, $noteId) {
        $service->deleteNote($userId, $isbn, $noteId);
        return response('')
                ->setStatusCode(204);
    }
}
