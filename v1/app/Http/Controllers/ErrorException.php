<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Mail\ExceptionOccured;
use Mail;




class ErrorException extends Controller
{

	
	
	static function push_exception_error($exception){
		try{
		//Mail::to("venkat@deepredink.com")->send(new ExceptionOccured($exception->getMessage()));
	}
	catch(\Exception $exception){
		abort(404);
	}
	}
	
	
}
