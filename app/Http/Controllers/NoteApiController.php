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

    public function addNote(Request $request, $isbn) {

    }

    public function deleteNote($isbn, $id) {

    }
}
