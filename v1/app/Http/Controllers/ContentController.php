<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContentController extends Controller
{
    public function dashboard()
		{

			$pageTitle = "Dashboard";	
			return view('admin.contentwriter.dashboard.show',compact('pageTitle'));
		
		}
}
