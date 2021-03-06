<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$gate)
    {

        if (!Gate::allows($gate)) {
            return response()->json([
                'status' => 'ACCESS_DENIED'
            ], 403);
        }
        return $next($request);
    }

}

