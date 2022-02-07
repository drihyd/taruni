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
use Mail;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		public function index()
		{

		$pageTitle = "Orders";	

			
		$orders_data=Cart_details::select('carts.created_at as created_at','carts.grand_total as grand_total','carts.order_status as order_status','carts.ship_to_name as shipername','carts.ship_to_email as shiperemail','carts.ship_to_phone as shiperphone','carts.gateway_name as pggateway','carts.id as order_number','cart_items.item_size as item_size','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','cart_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->leftjoin('carts','carts.id','=','cart_items.cart_id')
		->wherein("carts.order_status",['placed','processing'])
		->get();
		
		return view('admin.orders.orders_list',compact('orders_data','pageTitle'));
		
	}
		
		
		public function Listing(Request $request ,$type=NULL,$slug_status=false)
		{

			 $pageTitle= $type. " Orders";
			$pageTitle = "Orders";

			if (!$request->ajax()) {
			        $filter_type= $request->filter;
			        $filter_value= Crypt::decryptString($request->value);
			        $pageTitle= str::ucfirst($filter_value) .' '."Orders";
			        
			    }

			if ($request->ajax()) {


		
			$orders_data=Orders::select('orders.*');
			
			
	

			if ($request->calender_type=="today") {           
            	$orders_data->whereDate('orders.created_at', Carbon::today());

            }
            if($request->calender_type=="recent") {           
            	// $orders_data->whereDate('orders.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            	//$orders_data->whereDate('orders.created_at', '>=', Carbon::now()->startOfWeek());
     			//$orders_data->whereDate('orders.created_at', '<=', Carbon::now()->endOfWeek());
     			
     		  $orders_data->whereDate('orders.created_at', '>', Carbon::now()->subDays(30));

            }
            if($request->calender_type=="monthly") {
            $from_date = $request->searchByFromdate;
			$to_date = $request->searchByTodate;  		
            	//$orders_data->whereBetween('orders.created_at', [$from_date, $to_date]);           	
            
            $orders_data->whereDate('orders.created_at', '>=', $from_date);
            $orders_data->whereDate('orders.created_at', '<=', $to_date);	



		
	
            }
			
			
			if($request->serchbystring){
                $orders_data->where('orders.ship_to_name','LIKE','%'.$request->serchbystring.'%');
                $orders_data->orwhere('orders.ship_to_email','LIKE','%'.$request->serchbystring.'%');
                $orders_data->orwhere('orders.ship_to_phone','LIKE','%'.$request->serchbystring.'%');
                $orders_data->orwhere('orders.order_number','LIKE','%'.$request->serchbystring.'%');
            }
			
			
            if ($request->filter_type=="orders") {

                if($request->filter_value =="placed"){
                    $orders_data->where([           
                'orders.order_status' =>"placed",
                ]);
                }elseif ($request->filter_value =="processing") {
                	$orders_data->where([           
                'orders.order_status' =>"processing",
                ]);
                }elseif ($request->filter_value =="dispatched") {
                	$orders_data->where([           
                'orders.order_status' =>"dispatched",
                ]);
                }elseif ($request->filter_value =="hold") {
                	$orders_data->where([           
                'orders.order_status' =>"hold",
                ]);
                }elseif ($request->filter_value =="cancelled") {
                	$orders_data->where([           
                'orders.order_status' =>"cancelled",
                ]);
                }elseif ($request->filter_value =="delivered") {
                	$orders_data->where([           
                'orders.order_status' =>"delivered",
                ]);
                }
                elseif ($request->filter_value =="payment failed") {
                	$orders_data->where([           
                'orders.order_status' =>"payment-failed",
                ]);
                }
            }
            
			$orders_data->orderBy('created_at', 'DESC')->get();
	
			return Datatables::of($orders_data)
                    ->addIndexColumn()
                    ->addColumn('order_no', function($row){
     
                          
                            $order_no = '<a href="'.URL("admin/order/".Crypt::encryptString($row->order_number)).'">'.$row->order_number.'</a>';
                            
                             return $order_no;
                    })

                    ->addColumn('order_date', function($row){
     
                          						
                            // $order_date = Carbon::parse($row->from_date)->format('d M, Y');
                            $order_date = date('d M, Y', strtotime($row->created_at));
                            $order_date .='<br>';
                              $order_date .= date('H:i A', strtotime($row->created_at));
							
                             return $order_date;
                    })
                    ->addColumn('ship_to_country', function($row){
     
                          if ($row->ship_to_country!="india") {
                          	$ship_to_country = '<i class="fas fa-globe fa-w-12 fa-2x"></i>';
                          }else{
                          	$ship_to_country = '<img src="'.url("assets/admin/img/ico-india.svg").'" width="25px">';
                          }
                            
                            
                             return $ship_to_country;
                    })
                    ->addColumn('ship_to_details', function($row){
     
                          
                          	$ship_to_details = '<b>'.ucwords($row->ship_to_name).'</b><br>'.$row->ship_to_email.'<br>'.$row->ship_to_phone.'<br><span class="text text-danger">'.ucwords($row->checkout_mode).'</span>';
                            $ship_to_details .= '<p class="text text-info">Order Id: '.$row->order_id.'</p>';
                            
                             return $ship_to_details;
                    })
                    ->addColumn('total_items', function($row){
     						
     						if($row->total_items==1){
     							$items= "Item";
     						}else{
     							$items= "Items";
     						}
                          
                          	$total_items = '<b>'.$row->total_items.' '.$items.'</b>';
							
							
							         
                                $alter_sleeves = Orders_Details::where('order_number', $row->order_number)->where('alter_sleeves', 'yes')->get()->count();
                                $alter_dress = Orders_Details::where('order_number', $row->order_number)->where('alter_dress', 'yes')->get()->count();
                        
                        if($alter_sleeves!=0 || $alter_dress!=0){
                            $alterations = '<br><br><i class="fas fa-cut"></i>';
							$total_items.=$alterations;
                        }
                        else{
                            $alterations='';
							$total_items.=$alterations;
                            
                        }
                          	
                          
							
                             return $total_items;
                    })             
                    ->addColumn('payments', function($row){

							if($row->currency=="inr" || $row->currency=="INR"){
                          	$payments = '<i class="fas fa-rupee-sign" style="font-size: 12px;"></i> '.number_format($row->grand_total??'', 2, '.', ',');
							}
							else{
								$payments ='<i class="fas fa-dollar-sign" style="font-size: 12px;"></i> '.$row->grand_total;
							}
							
							
							
							$payments.='<br><b>Gateway:</b> Razorpay';
						if($row->payment_gateway_response){
						$response = json_decode($row->payment_gateway_response);						
						//$payinfo='<br><b>Order Id:</b> '.$response->items[0]->order_id??'';
						
						$payinfo='<br><b>Method:</b> '.ucwords($response->items[0]->method??'');
						  
						
						if($response->items[0]->wallet){
						$payinfo.='<br><b>Wallet:</b> '.ucwords($response->items[0]->wallet??'');
						}					
						$payments.=$payinfo;
						
						}
						else{
							$payments.="";
						}
							
							
							
							
							
							
							
							
							
							 return $payments;
                    })   
					
					->addColumn('tracking_number', function($row){

                          	$tracking_number = strtoupper($row->shipped_by).' - '.strtoupper($row->shipped_traking_no);
                             return $tracking_number;
                    })
                    ->addColumn('status', function($row){
						
							$order_status=$this->set_status_color($row->order_status);

                          	$status ='<button type="button" class="'.$order_status.'">'.ucfirst($row->order_status).'</button>';
                             return $status;
                    })
                    

                    
                    ->addColumn('action', function($row){
     

                    	$btn = '<a title="View Order Details" alt="View Order Details" target="" href="'.url("admin/order/".Crypt::encryptString($row->order_number)).'"><i class="fas fa-shopping-cart"></i></a>&nbsp;&nbsp;';
						$btn .= '<a title="Print Order" alt="Print Order" target="_new" href="'.url("admin-order-print/".Crypt::encryptString($row->order_number)).'"><i class="fas fa-print"></i></a>&nbsp;&nbsp;';
						$btn .= '<a onclick="return confirm(\'Are you sure, Check order items from cart?\')" title="Recheck Order Items" alt="Recheck Order Items" href="'.url("admin-order-items-recheck/".$row->order_id).'"><i class="fas fa-check-double"></i></a>';
                            return $btn;
                    })
                    
                    ->rawColumns(['action','order_no','order_date','ship_to_country','ship_to_details','total_items','payments','status'])
                    ->make(true);		
			}
			return view('admin.orders.orders_list',compact('pageTitle','type','filter_type','filter_value'));
		
		}
		// public function orders_today(Request $request)
		// {
		// 	return view('admin.orders.orders_list',compact('pageTitle'));
		// }




public function set_status_color($status=false) {
	
	switch ($status) {
  case 'hold':
    $color='btn btn-sm btn-info';
    break;
	  case 'placed':
     $color='btn btn-sm btn-success';
    break;
  case 'confirmed':
    $color='btn btn-sm btn-primary';
    break;
	  case 'processing':
    $color='btn btn-sm btn-warning';
    break;
	case 'delivered':
   $color='btn btn-sm btn-light';
    break;		 
	case 'dispatched':
   $color='btn btn-sm btn-danger';
    break;  
	case 'cancelled':
   $color='btn btn-dark';
    break;	
  default:
  $color='btn btn-sm btn-primary';
}

return $color;
	
}
		public function dashboard()
		{
			$orders_data=Orders::select('orders.*')
			//->leftjoin('order_items','order_items.order_number','=','orders.order_number')
			->where("orders.order_status",'=','placed')
			->get();			
			$pageTitle = "Dashboard";	
			return view('admin.dashboard.show',compact('orders_data','pageTitle'));
		
		}		
		
		public function Single_Listing($param1=Null)
		{
		
		$orderID=Crypt::decryptString($param1);

		$orders_data=Orders::select('orders.*')
		->leftjoin('users','users.id','=','orders.user_id')
		->where("orders.order_number", $orderID)
		->get()->first();


		$order_items = Orders_Details::select('categories.product_upload_path','products.slug as pslug','order_items.*','skus.id as skuid','skus.sku_code','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','order_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->leftjoin('categories', 'categories.id','=','skus.cat_id')
		->where('order_items.order_number',$orderID)
		->get();
		
		
		
		
		
		
		$payment_data=Payment::select('payments.*')
		->where("payments.order_number", $orderID)
		->latest()->first();

		$order_status=Orders_status::select('orders_statuses.*')
		->where("orders_statuses.order_number", $orderID)
		->latest()->first();

		
		$pageTitle = "Order Number: #".$orderID;	
		return view('admin.orders.single_orders_list',compact('orders_data','order_items','pageTitle','payment_data','order_status'));
		
		}
		public function Single_Order_Invoice(Request $request)
		{
		
		$orderID=Crypt::decryptString($request->order_number);
		$orders_data=Orders::select('orders.*')
		->leftjoin('users','users.id','=','orders.user_id')
		->where("orders.order_number", $orderID)
		->get()->first();


		$order_items = Orders_Details::select('products.slug as pslug','order_items.*','skus.id as skuid','skus.sku_code','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','order_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->where('order_items.order_number',$orderID)
		->get();
		
		
		$payment_data=Payment::select('payments.*')
		->where("payments.order_number", $orderID)
		->latest()->first();

		$order_status=Orders_status::select('orders_statuses.*')
		->where("orders_statuses.order_number", $orderID)
		->latest()->first();

		
		$pageTitle = "Order Number: #".$orderID;	
		$encrypt_ordernumber=$request->order_number;
		return view('frontend.myaccount.single_order_invoice',compact('orders_data','order_items','pageTitle','payment_data','encrypt_ordernumber','order_status'));
		
		}
		
		public function Single_Order_Status(Request $request){
			

			
			if(!empty($request->orderStatus) && !empty($request->order_number))
			{
			$order_number=Crypt::decryptString($request->order_number);	

			$orders_data=Orders::select('orders.*')
		->leftjoin('users','users.id','=','orders.user_id')
		->where("orders.order_number", $order_number)
		->get()->first();

		$name=auth()->user()->firstname.' '.auth()->user()->lastname;

		if($orders_data->order_status== 'placed' && $request->orderStatus == 'placed')
		{
			return redirect('admin/order/'.$request->order_number)->with('error', 'Status not updated. Please try again.');

		}else{



if($request->orderStatus=='dispatched') 
{
		

		$cartupdate=Orders::updateOrCreate(
			['order_number' =>$order_number],
			[
			'order_status' => $request->orderStatus,		
			'shipped_traking_no' => $request->shipped_traking_no??'',		
			'shipped_by' => $request->shipped_by??'',
			'shipping_to_date' => $request->shipping_to_date??'',				
			]
			);	


			
}

else{
	

	$cartupdate=Orders::updateOrCreate(
			['order_number' =>$order_number],
			[
			'order_status' =>$request->orderStatus				
			]
			);	
}

			if ($cartupdate) {
				$order_status=Orders_status::insert(
			[
			'order_id' =>$orders_data->id,
			'order_number' =>$order_number,
			'order_status' => $request->orderStatus,		
			'shipped_by' => $request->shipped_by??'',		
			'shipped_traking_no' => $request->shipped_traking_no??'',		
			'shipping_to_date' => $request->shipping_to_date??\Carbon\Carbon::now(),		
			'cancelled_date' => $request->cancelled_date??NULL,		
			'remarks' =>$request->remarks??'',		
			'action_id' =>auth()->user()->id,		
			'action_by' =>$name,		
			'action_name' =>auth()->user()->email,		
			'action_ip_address' =>$request->ip(),		
			]
			);
			}
		}

$this->send_order_status_emails($request->orderStatus,$order_number);


			return redirect('admin/order/'.$request->order_number)->with('message', 'Successfully update '.$request->orderStatus.' Status');
		
			}
			else{
			 return redirect('admin/order/'.$request->order_number)->with('error', 'Status not updated. Please try again.');
			}
			
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
	 
public function send_order_status_emails($status=false,$ordernumber=false) {

	switch ($status) {
  case 'hold':
    $color='btn btn-sm btn-info';
    break;
	  case 'placed':
     $color='btn btn-sm btn-success';
    break;
  case 'confirmed':
    $color='btn btn-sm btn-primary';
    break;
	  case 'processing':
	$this->send_order_processing_mail($ordernumber);
    break;
	case 'delivered':
   $color='btn btn-sm btn-light';
    break;		 
	case 'dispatched':
	$this->send_order_dispatched_mail($ordernumber);
    break;  
	case 'cancelled':
   $color='btn btn-dark';
    break;	
  default:
  $color='btn btn-sm btn-primary';
}


	
}
	 
	 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
	
	
	
	
	public function send_order_processing_mail($ordernumber=null){
		
	if($ordernumber){
	$Oder_info = Orders::select('*')->where('order_number',$ordernumber)->get()->first();
		$mail_params = [
		'name' =>$Oder_info->ship_to_name??'',
		'order_number' =>$Oder_info->order_number??'',
		'amount' =>$Oder_info->total_amount??'',
		'total_items' =>$Oder_info->total_items??'',
		'payment_status' =>$Oder_info->payment_status??'',
		'gateway_name' =>$Oder_info->gateway_name??'',
		'ship_to_address' =>$Oder_info->ship_to_address??'',
		'ship_to_phone' =>$Oder_info->ship_to_phone??'',
		'ship_to_state' =>$Oder_info->ship_to_state??'',
		'ship_to_country' =>$Oder_info->ship_to_country??'',
		'ship_to_postalcode' =>$Oder_info->ship_to_postalcode??'',
		'ship_to_city' =>$Oder_info->ship_to_city??'',
		'created_at' =>\Carbon\Carbon::parse($Oder_info->created_at)->format('d-m-Y')??'',
		'currency' =>$Oder_info->currency??'',
		];
		
		if($Oder_info->ship_to_email){
		Mail::to($Oder_info->ship_to_email)->send(new OrderProcessing($mail_params));
		}
	}
}
	
	public function send_order_dispatched_mail($ordernumber=null){
		
	if($ordernumber){
	$Oder_info = Orders::select('*')->where('order_number',$ordernumber)->get()->first();
		$mail_params = [
		'name' =>$Oder_info->ship_to_name??'',
		'order_number' =>$Oder_info->order_number??'',
		'amount' =>$Oder_info->total_amount??'',
		'total_items' =>$Oder_info->total_items??'',
		'payment_status' =>$Oder_info->payment_status??'',
		'gateway_name' =>$Oder_info->gateway_name??'',
		'ship_to_address' =>$Oder_info->ship_to_address??'',
		'ship_to_phone' =>$Oder_info->ship_to_phone??'',
		'ship_to_state' =>$Oder_info->ship_to_state??'',
		'ship_to_country' =>$Oder_info->ship_to_country??'',
		'ship_to_postalcode' =>$Oder_info->ship_to_postalcode??'',
		'ship_to_city' =>$Oder_info->ship_to_city??'',
		'shipped_traking_no' =>$Oder_info->shipped_traking_no??'',
		'shipped_by' =>$Oder_info->shipped_by??'',
		'created_at' =>\Carbon\Carbon::parse($Oder_info->created_at)->format('d-m-Y')??'',
		'currency' =>$Oder_info->currency??'',
		];
		
		if($Oder_info->ship_to_email){
		Mail::to($Oder_info->ship_to_email)->send(new OrderDispatched($mail_params));
		}
	}
}

public function abandoned_list()
		{

		$pageTitle = "Abandoned Carts";				
		$abandoned_data=Cart::select('carts.*')->where('order_status','hold')
		->leftjoin('users','users.id','=','carts.user_id')		
		->whereNotNull("carts.order_id")
		->orderBy('created_at','DESC')
		->get();

		return view('admin.orders.abandoned_list',compact('abandoned_data','pageTitle'));
		
	}
	public function update_order_id(Request $request)
    {

    	// dd($request->id);
        
      Cart::where('id', $request->id)
            ->update(
            [
                "order_id"=> $request->order_no,
            ]
            );
      Cart_details::where('cart_id', $request->id)
            ->update(
            [
                "order_id"=> $request->order_no,
            ]
            );
        return redirect('admin/abandoned_carts')->with('success', "Success! New Order ID Updated successfully."); 
    }

public function print_placed_orders($order_number=false)
{

	$orderID=Crypt::decryptString($order_number);	
	

try{
	
		$orders_data=Orders::select('orders.*')
		->leftjoin('users','users.id','=','orders.user_id')
		->where("orders.order_number", $orderID)
		->get();


		$order_items = Orders_Details::select('order_items.alter_dress as alter_dress','order_items.dress_json as dress_json','order_items.alter_sleeves as alter_sleeves','order_items.alterations as alterations','products.desc as pdesc','products.slug as pslug','order_items.*','skus.id as skuid','skus.sku_code','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','order_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->where('order_items.order_number',$orderID)
		->get();
		
		
		$payment_data=Payment::select('payments.*')
		->where("payments.order_number", $orderID)
		->latest()->first();

		$order_status=Orders_status::select('orders_statuses.*')
		->where("orders_statuses.order_number", $orderID)
		->latest()->first();

		
		$pageTitle = "Order Number: #".$orderID;	
		$encrypt_ordernumber=$orderID;	
	


} catch (\Exception $exception) {
	//dd($exception);
//ErrorException::push_exception_error($exception);
// There was another exception.
return false;
}
		
		return view('admin.orders.today_placed_order_print',compact('orders_data','order_items','pageTitle','payment_data','order_status'));
	



}



}
