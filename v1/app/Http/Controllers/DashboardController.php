<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_details;

use App\Models\Orders;
use App\Models\Orders_Details;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
		{
			$orders_data=Orders::select('orders.*')
			->whereDate('orders.created_at', Carbon::today()) 
			 ->count();
			$registratons=User::select('users.*')
			->whereDate('users.created_at', Carbon::today()) 
			->where('users.role','0')
			 ->count();

			 $orders_amount_inr = DB::table('orders')
			 ->whereDate('orders.created_at', Carbon::today())
			 ->where('currency','INR')
    		 ->sum('orders.grand_total');
			 
			 $orders_amount_usd = DB::table('orders')
			 ->whereDate('orders.created_at', Carbon::today())
			 ->where('currency','USD')
    		 ->sum('orders.grand_total');
			 
			 
			$pageTitle = "Dashboard";	
			return view('admin.dashboard.show',compact('orders_data','pageTitle','registratons','orders_amount_inr','orders_amount_usd'));
		
		}
}
