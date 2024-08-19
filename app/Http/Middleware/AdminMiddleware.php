<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth_user = auth()->user()->role;
        if ($auth_user === User::ROLE_MODERATOR || $auth_user === User::ROLE_INTERN) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
