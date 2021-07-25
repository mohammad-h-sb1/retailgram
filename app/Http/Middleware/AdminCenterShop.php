<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCenterShop
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
        if (auth()->user()->type == 'admin_center' | 'admin'){
            return $next($request);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);}
    }
}
