<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkTokenApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (config('constants.x_static_token') != $request->header('X-Static-Token')) {
            return response()->json(array('status' => 'error', 'message' => 'Unauthorized'), Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
