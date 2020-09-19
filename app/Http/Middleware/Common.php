<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Common
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $allowed = true;
        foreach ($permissions as $p) {
            $allowed *= Gate::allows($p);
        }
        if (! $allowed) {
            return response()->json(['message' => 'Insufficient permission'], 403);
        }
        return $next($request);
    }
}
