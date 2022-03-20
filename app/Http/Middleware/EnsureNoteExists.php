<?php

namespace App\Http\Middleware;

use App\Modules\Notes\Models\Note;
use App\Modules\Notes\Services\NoteService;
use Closure;
use Illuminate\Http\Request;

class EnsureNoteExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route()->parameter('userId');
        $isbn = $request->route()->parameter('isbn');
        $noteId = $request->route()->parameter('noteId');
        $service = new NoteService(new Note());

        if (!$service->noteExists($userId, $isbn, $noteId)) {
            return response(['message' => "A note with ID $noteId has not been found for the current user and book."])
                ->setStatusCode(404);
        }

        return $next($request);
    }
}
