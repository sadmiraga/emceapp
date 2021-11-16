<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class kelnerMiddleware
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
        if ($user = Auth::user()) {

            if (Auth::user()->type_id == 2) {
                return $next($request);
            } else {
                return redirect('/access-denied');
            }
        } else {
            return redirect('/login');
        }
    }
}
