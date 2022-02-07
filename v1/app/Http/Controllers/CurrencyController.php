<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
class CurrencyController extends Controller
{
	public function switchLang($currency)
    {		

       if (array_key_exists($currency, Config::get('currency'))) {
            Session::put('appcurrency', Str::upper($currency));
        }
        return Redirect::back()->with('success', "Switch to ".Str::upper($currency));
    }	
}