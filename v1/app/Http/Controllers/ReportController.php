<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Orders;
use App\Models\Orders_status;
use App\Models\Orders_Details;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use App\Mail\OrderDispatched;
use App\Mail\OrderProcessing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Exports\AccountExport;
use App\Exports\AccountExportSecond;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 


public function export_account_report(Request $request){		
				
				
				

		if($request->cat) {			
		$cat_id=1;		
		$cat_info = true;
		if($cat_info)
		{
			$pageTitle="Accounts Report";	
			$categoryid=$cat_id;			
			//return (new ProductsImport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
				$data = [
				'category_attributes' =>1, 
				'category_id' =>1,
				'fd' =>$request->fd,
				'td' =>$request->td,
				// other data here
				];				
				return Excel::download(new AccountExport($data), "Report_for_admin.xls");				
			   
		    //return Excel::download(new ProductsExport, 'invoices.xlsx');
		   //return Excel::download(new ProductsExport , $cat_info->name.'.xls');			
		}
		else{
			//return redirect('admin/categories')->with('error', 'Category not found.');
		}
		}
		else{
			//return redirect('admin/categories')->with('error', 'Please check category selection.');
		}
}	
public function account_report(Request $request ,$type=NULL,$slug_status=false)
{		
			$pageTitle= $type;
			$pageTitle = "";  

			if (!$request->ajax()) {
			$filter_type= $request->filter;
			$filter_value= Crypt::decryptString($request->value);
			$pageTitle= str::ucfirst($filter_value) .' '."Payments";
			$pageTitle= "Payments";

			}

			if ($request->ajax()) {


				
			//$payment_data=Orders::select('orders.ship_to_country','orders.shipped_traking_no','orders.order_number','orders.grand_total','orders.total_items','orders.ship_to_name','orders.order_status');
		
		$payment_data=Orders::select('users.phone as uphone','users.firstname as fn','users.lastname as ln','users.email as uemail','orders.order_number as order_number','orders.grand_total as grand_total','orders.total_shipping_fee as total_shipping_fee','orders.total_items as total_items','orders.ship_to_country as ship_to_country','orders.order_status as order_status','orders.shipped_traking_no as shipped_traking_no','orders.ship_to_name as ship_to_name','orders.created_at as created_at','orders.gateway_name as gateway_name','orders.total_shipping_weight as total_shipping_weight')
			     ->leftjoin('users','users.id','=','orders.user_id');			
			if ($request->calender_type=="today") {           
            	$payment_data->whereDate('orders.created_at', Carbon::today());

            }
            if($request->calender_type=="recent") {            
            	$payment_data->whereDate('orders.created_at', '>', Carbon::now()->startOfWeek());
     			$payment_data->whereDate('orders.created_at', '<=', Carbon::now()->endOfWeek());
            }			
			
            if($request->calender_type=="monthly") {
            $from_date = $request->searchByFromdate;
			$to_date = $request->searchByTodate;  				
		$payment_data->whereDate('orders.created_at', '>=', "$from_date 00:00:00");
		$payment_data->whereDate('orders.created_at', '<=',"$to_date 23:59:59");

            }            

			if($request->searchByStatus) {			
            	//$payment_data->where('paypal_payment_status', $request->searchByStatus);	

            }   
			if($request->searchByCurrency) {			
            	//$payment_data->where('paypal_currency_type', $request->searchByCurrency);	
            }    
			
			$payment_data->OrderBy('orders.created_at','desc')->get();		
			return Datatables::of($payment_data)
                    //->addIndexColumn()					
                    ->addColumn('order_number', function($row){                          
                            return $row->order_number;
                    })					
					->addColumn('grand_total', function($row){                          
                            return $row->grand_total;
                    })
                    ->addColumn('total_items', function($row){					
						return  $row->total_items;
                    })					
					->addColumn('inkg', function($row){                          
                           return  $row->total_shipping_weight;
                    })					
					->addColumn('customer', function($row){                          
                           return  str::ucfirst($row->fn).' '.str::ucfirst($row->ln);
                    })
                    ->addColumn('shippername', function($row){     
						return $row->ship_to_name;
                    })  
					->addColumn('payment', function($row){     
						return $row->gateway_name;
                    })
           
                    ->addColumn('paymentdate', function($row){     
						return   date('d-m-yy', strtotime($row->created_at));
                    })
					->addColumn('shipto', function($row){
						 return str::ucfirst($row->ship_to_country);						
                    })
					->addColumn('status', function($row){     
						 return str::ucfirst($row->order_status);
                    })           
                    ->addColumn('tracking', function($row){
                          	return str::ucfirst($row->shipped_traking_no);							
                    })							
                    ->addColumn('Email', function($row){			
						return $row->uemail;						
                    })
					->addColumn('Phone', function($row){
						return $row->uphone;
                    })
					->addColumn('shipping_charges', function($row){				
						return $row->total_shipping_fee;						
                    }) 
					->addColumn('Action', function($row){
						return '';
                    })                  
                    ->make(true);		
			}			
	return view('admin.reports.payments.listing',compact('pageTitle','type','filter_type','filter_value'));

}	




public function account_report_second(Request $request ,$type=NULL,$slug_status=false)
{		
			$pageTitle= $type;
			$pageTitle = "";  

			if (!$request->ajax()) {
			$filter_type= $request->filter;
			$filter_value= Crypt::decryptString($request->value);
			//$pageTitle= str::ucfirst($filter_value) .' '."Payments";
			$pageTitle= "Payments";

			}

			if ($request->ajax()) {		
			//$payment_data=Orders::select('orders.ship_to_country','orders.shipped_traking_no','orders.order_number','orders.grand_total','orders.total_items','orders.ship_to_name','orders.order_status');
				$payment_data=Orders::select('payments.razorpay_order_id as razorpay_order_id','payments.payment_id as payment_id','users.phone as uphone','users.firstname as fn','users.lastname as ln','users.email as uemail','orders.order_number as order_number','orders.grand_total as grand_total','orders.total_shipping_fee as total_shipping_fee','orders.total_items as total_items','orders.ship_to_country as ship_to_country','orders.order_status as order_status','orders.shipped_traking_no as shipped_traking_no','orders.ship_to_name as ship_to_name','orders.created_at as created_at','orders.gateway_name as gateway_name','orders.currency as ocurrency','orders.total_amount as netamount','orders.total_shipping_weight as total_shipping_weight')
			     ->leftjoin('users','users.id','=','orders.user_id')
				 ->leftjoin('payments','payments.razorpay_order_id','=','orders.order_id');				 
			if ($request->calender_type=="today") {           
            	$payment_data->whereDate('orders.created_at', Carbon::today());

            }
            if($request->calender_type=="recent") {            
            	$payment_data->whereDate('orders.created_at', '>', Carbon::now()->startOfWeek());
     			$payment_data->whereDate('orders.created_at', '<=', Carbon::now()->endOfWeek());
            }			
			
            if($request->calender_type=="monthly") {
            $from_date = $request->searchByFromdate;
			$to_date = $request->searchByTodate;  				
		$payment_data->whereDate('orders.created_at', '>=', "$from_date 00:00:00");
		$payment_data->whereDate('orders.created_at', '<=',"$to_date 23:59:59");

            }            

			if($request->searchByStatus) {			
            	//$payment_data->where('paypal_payment_status', $request->searchByStatus);	

            }   
			if($request->searchByCurrency) {			
            	//$payment_data->where('paypal_currency_type', $request->searchByCurrency);	
            }    
			
			$payment_data->OrderBy('orders.created_at','desc')->get();		
			return Datatables::of($payment_data)
                    //->addIndexColumn()					
                    ->addColumn('order_number', function($row){                          
                            return $row->order_number;
                    })					
					->addColumn('grand_total', function($row){                          
                            return $row->grand_total;
                    })
					->addColumn('usdcurrency', function($row){                          
                            	if($row->ocurrency=="USD"){						
								return $row->grand_total;
								}				
                           
                    })
					->addColumn('inrcurrency', function($row){

							if($row->ocurrency=="INR"){						
                            return $row->grand_total;
							}
                    })
                    ->addColumn('total_items', function($row){					
						return  $row->total_items;
                    })					
					->addColumn('inkg', function($row){                          
                            return  $row->total_shipping_weight;
                    })					
				    ->addColumn('shippername', function($row){     
						return $row->ship_to_name;
                    })  
					->addColumn('payment', function($row){     
						return $row->gateway_name;
                    })
           
                    ->addColumn('paymentdate', function($row){     
						return   date('d-m-yy', strtotime($row->created_at));
                    })
					->addColumn('shipto', function($row){
						 return str::ucfirst($row->ship_to_country);						
                    })
					->addColumn('status', function($row){     
						 return str::ucfirst($row->order_status);
                    })           
                    ->addColumn('tracking', function($row){
                          	return str::ucfirst($row->shipped_traking_no);							
                    })							
                    ->addColumn('Email', function($row){			
						return $row->uemail;						
                    })
					->addColumn('Phone', function($row){
						return $row->uphone;
                    })
					->addColumn('shipping_charges', function($row){				
						return $row->total_shipping_fee;						
                    }) 
					->addColumn('netamount', function($row){				
						return $row->netamount;						
                    }) 
					->addColumn('payment_id', function($row){				
						return $row->payment_id;						
                    }) 
					->addColumn('razorpay_order_id', function($row){				
						return $row->razorpay_order_id;						
                    }) 
					->addColumn('Action', function($row){
						return '';
                    })                  
                    ->make(true);		
			}			
	return view('admin.reports.payments_second.listing',compact('pageTitle','type','filter_type','filter_value'));

}	


public function export_account_report_second(Request $request){		
				
		if($request->cat) {			
		$cat_id=1;		
		$cat_info = true;
		if($cat_info)
		{
			$pageTitle="Accounts Report";	
			$categoryid=$cat_id;		
			
				$data = [
				'category_attributes' =>1, 
				'category_id' =>1,
				'fd' =>$request->fd,
				'td' =>$request->td,			
				];				
				return Excel::download(new AccountExportSecond($data), "Report_for_account_team.xls");			
					
		}
		else{
			//return redirect('admin/categories')->with('error', 'Category not found.');
		}
		}
		else{
			//return redirect('admin/categories')->with('error', 'Please check category selection.');
		}
}	

	
}
