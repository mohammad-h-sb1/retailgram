<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Influencer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->type === 'influencer' | 'admin') {
            return $next($request);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ],403);
    }
}
