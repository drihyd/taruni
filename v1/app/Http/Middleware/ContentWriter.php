<?php
namespace App\Http\Middleware;
use Auth;
use Closure;
class ContentWriter
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
		if (Auth::user() &&  Auth::user()->role == 3) {
             return $next($request);
        }
        return redirect()->route('admin.login')->with('error','You have not admin access');
    }
}