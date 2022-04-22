<?php

namespace App\Http\Controllers;

use App\Modules\Notes\Services\NoteService;
use App\Modules\Validation\Models\Error;
use Illuminate\Http\Request;

class NoteApiController extends Controller
{
    public function getNotes(NoteService $service, $userId, $isbn) {
        try {
            $notes = $service->retrieveNotes($userId, $isbn);
            return response($notes)
                ->setStatusCode(200);
        } catch (Error $error) {
            return response(['message' => $error->getMessage(), 'errors' => $error->getErrors()])
                ->setStatusCode($error->getCode());
        }
    }

    public function postNote(NoteService $service, Request $request, $userId, $isbn) {
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
        $service->removeNote($userId, $isbn, $noteId);

        if ($service->hasError()) {
            return response(['message' => $service->getError()->getMessage(), 'errors' => $service->getError()->getErrors()])
                ->setStatusCode($service->getError()->getCode());
        }

        return response('')
                ->setStatusCode(204);
    }
}
