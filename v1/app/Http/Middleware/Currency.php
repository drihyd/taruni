<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
class Currency
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
        if (Session()->has('appcurrency') AND array_key_exists(Session()->get('appcurrency'), config('currency'))) {
            App::setLocale(Session()->get('appcurrency'));
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
		    
			if(empty(Session()->get('appcurrency'))){		
			  Session::put('appcurrency', Str::upper(config('app.fallback_currency')));
			}		
			App::setLocale(Session()->get('appcurrency'));
			}
        return $next($request);
    }
}