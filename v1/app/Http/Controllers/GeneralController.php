<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Cart_details;

use App\Models\Orders;
use App\Models\Orders_Details;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
class GeneralController extends Controller
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

			
			return view('admin.general.dashboard.show',compact('orders_data','pageTitle','registratons','orders_amount_inr','orders_amount_usd'));
		
		}
		
		
		
		public function Listing(Request $request ,$type=NULL,$slug_status=false)
		{
	
			 $pageTitle= $type. " Payments";

		if (!$request->ajax()) {
				$filter_type= $request->filter;
				$filter_value= Crypt::decryptString($request->value);
				$pageTitle= str::ucfirst($filter_value) ." Payments";
				
			}

			if ($request->ajax()) {
		
			$payment_data=Payment::select();
			
			if ($request->calender_type=="today") {           
            	$payment_data->whereDate('created_at', Carbon::today());

            }
            if($request->calender_type=="recent") {          
            
            	$payment_data->whereDate('created_at', '>', Carbon::now()->startOfWeek());
     			$payment_data->whereDate('created_at', '<', Carbon::now()->endOfWeek());

            }			
			
            if($request->calender_type=="monthly") {
            $from_date = $request->searchByFromdate;
			$to_date = $request->searchByTodate;    
				
		$payment_data->whereDate('created_at', '>=', "$from_date 00:00:00");
		$payment_data->whereDate('created_at', '<=',"$to_date 23:59:59");				

            }            

			if($request->searchByStatus) {			
            	$payment_data->where('paypal_payment_status', $request->searchByStatus);	

            }   
			if($request->searchByCurrency) {			
            	$payment_data->where('paypal_currency_type', $request->searchByCurrency);	

            }    
			
			$payment_data->OrderBy('created_at','desc')->get();			
			
	
			return Datatables::of($payment_data)
                    ->addIndexColumn()
                    ->addColumn('order_id', function($row){                          
                            return $row->razorpay_order_id;
                    })
					    ->addColumn('payment_id', function($row){                          
                            return $row->payment_id;
                    })

                    ->addColumn('payment_date', function($row){ 
						return  date('d M, Y', strtotime($row->created_at));
                    })
					
					->addColumn('entity', function($row){                          
                            return str::ucfirst($row->entity);
                    })
						->addColumn('order_number', function($row){                          
                            return str::ucfirst($row->order_number);
                    })
                    ->addColumn('email', function($row){     
						return $row->billing_email;
                    })  
					->addColumn('phone', function($row){     
						return $row->billing_phone;
                    })
           
                    ->addColumn('currency', function($row){     
						return str::ucfirst(trans($row->paypal_currency_type));
                    })
					->addColumn('order_amount', function($row){     
						return $row->amount;
                    })
					->addColumn('paid_amount', function($row){     
						return $row->amount_paid;
                    })
           
                    ->addColumn('method', function($row){
                          	return str::ucfirst($row->payment_method);
                    })
                    ->addColumn('status', function($row){
						return str::ucfirst($row->paypal_payment_status);
                    })   
               
                    ->make(true);		
			}
			return view('admin.finance.payments.listing',compact('pageTitle','type','filter_type','filter_value'));
		
		}
		
}
