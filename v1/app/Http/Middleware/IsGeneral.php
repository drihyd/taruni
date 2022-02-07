<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsGeneral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		
        if (Auth::user() &&  Auth::user()->role == 4) {
             return $next($request);
        }

        return redirect('/admin')->with('error','You have not admin access');
    }
}