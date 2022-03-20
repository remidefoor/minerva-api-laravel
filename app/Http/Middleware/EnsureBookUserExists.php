<?php

namespace App\Http\Middleware;

use App\Modules\UserBooks\Models\BookUser;
use App\Modules\UserBooks\Services\UserBookService;
use Closure;
use Illuminate\Http\Request;

class EnsureBookUserExists
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
        $service = new UserBookService(new BookUser());

        if (!$service->userBookExists($userId, $isbn)) {
            return response(['message' => "The book with ISBN $isbn has not been found for the user with ID $userId."])
                ->setStatusCode(404);
        }

        return $next($request);
    }
}
