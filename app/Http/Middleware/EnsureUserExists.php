<?php

namespace App\Http\Middleware;

use App\Modules\Users\Models\User;
use App\Modules\Users\Services\UserService;
use Closure;
use Illuminate\Http\Request;

class EnsureUserExists
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
        $userId = $request->route()->parameters()['userId'];
        $service = new UserService(new User());
        if (!$service->userExists($userId)) {
            return response(['message' => 'The user with ID '.$userId.' has not been found.'])
                ->setStatusCode(404);
        }

        return $next($request);
    }
}
