<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $allowed = array_map('trim', preg_split('/[|,]/', $roles));
        if (! $request->user() || ! in_array($request->user()->role, $allowed)) {
            abort(403);
        }

        return $next($request);
    }
}
