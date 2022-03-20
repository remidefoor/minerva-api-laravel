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
        if ($service->hasErrors()) {
            return response(['message' => 'The request contains an invalid body.', 'errors' => $service->getErrors()])
                ->setStatusCode(400);
        }
        return response('')
            ->setStatusCode(201);
    }

    public function deleteNote($isbn, $id) {

    }
}
