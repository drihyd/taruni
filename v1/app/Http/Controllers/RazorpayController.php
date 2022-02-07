<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Orders;
use App\Models\Orders_Details;
use DB;
use App\Models\Sku;
use App\Mail\OrderConfirmation;
use Mail;
use Carbon;
use Route;

class RazorpayController extends Controller
{    
    public function payWithRazorpay()
    {        
        return view('payWithRazorpay');
    }

  
	
	public function paymentprocessing(Request $request)
    {		
	
		$request_data=$request;

		$logparams=
		[
		'subject'=>'Payment processing before receive response from razopay - '.$request_data->razorpay_order_id??0,
		'order_id'=>0,
		'order_number'=>0,
		'razorpay_order_id'=>$request_data->razorpay_order_id??0,
		];
		\LogActivity::addToLog($logparams);

	

		
		return view('frontend.razorpay_processing',compact('request_data'));
		
		
	}
	
	
	
	public function payment_callback(Request $request){
				
	
	
		$razorpay_order_id=$request->order_id??0;
		
		if($request->order_id)			
		{			
			
			$url="https://".env('RAZOR_KEY').":".env('RAZOR_SECRET')."@api.razorpay.com/v1/orders/".$razorpay_order_id."/payments";
			$APIURL=$url;			
			$httpClient = new \GuzzleHttp\Client();
			$request =
			$httpClient
			->get($APIURL);			
			$response = json_decode($request->getBody()->getContents());
			
			$count=$response->count;
			
	
				if($count>0)
				{
				
				foreach($response->items as $key=>$value){		
					if($value->status=="captured"){				
						$this->migrate_cart_order_tables($razorpay_order_id);	
						$this->Update_OrderNumber_to_Order($razorpay_order_id);			
						$this->Decrease_stocks_applaceorder($razorpay_order_id);			
						$this->Payment_update_selftable($razorpay_order_id);
						$this->send_order_confirmation_mail($razorpay_order_id);

						$logparams=
						[
						'subject'=>'Payment callback received from razorpay to home server - '.$razorpay_order_id,
						'order_id'=>0,
						'order_number'=>0,
						'razorpay_order_id'=>$razorpay_order_id,
						];

						\LogActivity::addToLog($logparams);				
						return redirect()->route('payment.success',"razorpay_order_id=$razorpay_order_id")->with('success', 'Payment successful');
						exit();	
					
					}		
				}	

				//$this->order_failed_not_response($razorpay_order_id);	


				$logparams=
				[
				'subject'=>'Payment failed received from razorpay to home server - '.$razorpay_order_id,
				'order_id'=>0,
				'order_number'=>0,
				'razorpay_order_id'=>$razorpay_order_id,
				];

				\LogActivity::addToLog($logparams);	
				
				return redirect()->route('payment.error')->with('error', 'Payment failed. Please try again.');		
				exit();
				
				}
				else{					
					
					
					//$this->order_failed_not_response($razorpay_order_id);			
					return redirect()->route('payment.error')->with('error', 'Payment failed. Please try again.');		
					exit();
					
				}
		}
		else{	
			//$this->order_failed_not_response($razorpay_order_id);			
			return redirect()->route('payment.error')->with('error', 'Payment failed. Please try again.');		
			exit();
		}  
    }
	

	public function payment(Request $request){
				
	
		if($request->razorpay_payment_id)			
		{			
	
	
	
			$razorpay_order_id=$request->razorpay_order_id;
			$this->migrate_cart_order_tables($razorpay_order_id);	
			$this->Update_OrderNumber_to_Order($razorpay_order_id);			
			$this->Decrease_stocks_applaceorder($razorpay_order_id);			
			$this->Payment_update_selftable($razorpay_order_id);					
			$_token=$request['_token'];
			$razorpay_payment_id=$request['razorpay_payment_id'];
			
			
				$logparams=
				[
				'subject'=>'Payment response received from razorpay to home server - '.$razorpay_order_id,
				'order_id'=>0,
				'order_number'=>0,
				'razorpay_order_id'=>$razorpay_order_id,
				];

				\LogActivity::addToLog($logparams);	
			
			
			
			
			return redirect()->route('payment.success',"tokenvalue=$_token&paymentid=$razorpay_payment_id&razorpay_order_id=$razorpay_order_id")->with('success', 'Payment successful');
			exit();
		}
		else{
			
			$razorpay_order_id=$request->razorpay_order_id;
			$this->order_failed_not_response($razorpay_order_id);			
			return redirect()->route('payment.error')->with('error', 'Payment failed. Please try again.');		
			exit();
		}  
    }	

public function getNextOrderNumber()
{
  #Store Unique Order/Product Number
     $unique_no = Orders::orderBy('id', 'DESC')->pluck('id')->first();
        if($unique_no == null or $unique_no == ""){
        #If Table is Empty
        $unique_no = 1;
        }
        else{
        #If Table has Already some Data
        $unique_no = $unique_no + 1;
      }
    return $unique_no;
}

public function migrate_cart_order_tables($razorpayorderid){
	
$isexistorder = Orders::select('id')->where('order_id',$razorpayorderid)->count();	
if($isexistorder==0 || $isexistorder==1){
$Cart = Cart::select('*')->where('order_id',$razorpayorderid)->get();
$insert_allow = Orders::select('id')->where('order_id',$razorpayorderid)->count();
if($insert_allow==0){
foreach($Cart as $key=>$value){	
	$movecart_Order=Orders::insert(
	    [
		'session_id' =>"$value->session_id", 
		'user_id' =>$value->user_id, 
		'cart_id' =>$value->id, 
		'order_id' =>$value->order_id, 
		'order_number' =>$value->order_number, 
		'checked_out' =>$value->checked_out, 
		'checkout_mode' =>$value->checkout_mode,
		'discount_coupon' =>$value->discount_coupon, 
		'total_amount' =>$value->total_amount, 
		'total_items' =>$value->total_items, 
		'total_shipping_weight' =>$value->total_shipping_weight, 
		'total_shipping_fee' =>$value->total_shipping_fee, 
		'cod_fee' =>$value->cod_fee, 
		'shipping_cost' =>$value->shipping_cost, 
		'grand_total' =>$value->grand_total, 
		'currency' =>$value->currency, 
		'bill_to_name' =>$value->bill_to_name, 
		'bill_to_email' =>$value->bill_to_email, 
		'bill_to_phone' =>$value->bill_to_phone, 
		'bill_to_address' =>$value->bill_to_address, 
		'bill_to_city' =>$value->bill_to_city, 
		'bill_to_state' =>$value->bill_to_state, 
		'bill_to_country' =>$value->bill_to_country, 
		'bill_to_postalcode' =>$value->bill_to_postalcode, 
		'ship_to_name' =>$value->ship_to_name, 
		'ship_to_email' =>$value->ship_to_email, 
		'ship_to_phone' =>$value->ship_to_phone, 
		'ship_to_alt_phone' =>$value->ship_to_alt_phone, 
		'ship_to_address' =>$value->ship_to_address, 
		'ship_to_city' =>$value->ship_to_city, 
		'ship_to_state' =>$value->ship_to_state, 
		'ship_to_country' =>$value->ship_to_country, 
		'ship_to_country_id' =>$value->ship_to_country_id, 
		'ship_to_state_id' =>$value->ship_to_state_id, 
		'ship_to_city_id' =>$value->ship_to_city_id, 
		'ship_to_postalcode' =>$value->ship_to_postalcode, 
		'payment_mode' =>$value->payment_mode, 
		'gateway_name' =>$value->gateway_name, 
		'tax_percentage' =>$value->tax_percentage, 
		'shipping_rate' =>$value->shipping_rate, 
		'shipping_base_price' =>$value->shipping_base_price, 
		'shipping_time' =>$value->shipping_time, 
		'shipping_time_id' =>$value->shipping_time_id, 
		'shipping_rate_id' =>$value->shipping_rate_id, 
		'our_hash' =>$value->our_hash, 
		'clicked_paypal' =>$value->clicked_paypal, 
		'v_ip' =>$value->v_ip, 
		'v_user_agent' =>$value->v_user_agent, 
		'v_platform' =>$value->v_platform, 
		'v_browser' =>$value->v_browser, 
		'v_is_mobile' =>$value->v_is_mobile, 
		'v_mobile_type' =>$value->v_mobile_type, 
		'v_is_bot' =>$value->v_is_bot, 
		'v_source_url' =>$value->v_source_url, 
		'v_landed_on' =>$value->v_landed_on, 
		'utm_source' =>$value->utm_source, 
		'utm_medium' =>$value->utm_medium, 
		'utm_campaign' =>$value->utm_campaign, 
		'utm_term' =>$value->utm_term, 
		'utm_content' =>$value->utm_content, 
		'v_failed_campaigns' =>$value->v_failed_campaigns, 
		'guest_checkout' =>$value->guest_checkout, 
		'went_to_gateway' =>$value->went_to_gateway,		
		'razor_payorderid' =>$value->razor_payorderid, 
		'gateway_name' =>'razorpay',
		'payment_mode' =>'online',
		'payment_status' =>'paid',
		'order_status' =>'placed',
		'returned_from_gateway' =>'yes',
		'schedule_discount' =>$value->schedule_discount, 
		'abandoned_coupon_id' =>$value->abandoned_coupon_id, 
		'last_discount_mailer' =>$value->last_discount_mailer, 
		'verified' =>$value->verified,
		'created_at' =>Carbon\Carbon::now(), 	
		'updated_at' =>Carbon\Carbon::now(), 
	
		]
	);
		
	
}


}




$Cart_details = Cart_details::select('*')->where('order_id',$razorpayorderid)->get();
$Insert_Cart_details = Cart_details::select('*')->where('order_id',$razorpayorderid)->count();

if($Insert_Cart_details==0 || $Insert_Cart_details>0){
	
foreach($Cart_details as $key1=>$value1){


	$check_sku_is_exist = Orders_Details::select('*')->where('order_id',$razorpayorderid)->where('sku_id',$value1->sku_id)->count();

	if($check_sku_is_exist==0){
		$movecartdetail_Orderdetails=Orders_Details::insert(
			[
			'cart_id' =>$value1->cart_id, 
			'order_number' =>$value1->order_number, 
			'order_id' =>$value1->order_id, 
			'item_status' =>'placed', 
			'sku_id' =>$value1->sku_id, 
			'fit_profile_id' =>$value1->fit_profile_id, 
			'qty' =>$value1->qty, 
			'custom' =>$value1->custom, 
			'custom_standard' =>$value1->custom_standard, 
			'unstitched' =>$value1->unstitched, 
			'unit_price' =>$value1->unit_price, 
			'gst' =>$value1->gst, 
			'discount_percentage' =>$value1->discount_percentage, 
			'price' =>$value1->price, 
			'currency' =>$value1->currency, 
			'item_size' =>$value1->item_size, 
			'item_size' =>$value1->item_size, 
			'alter_sleeves' =>$value1->alter_sleeves, 
			'alter_dress' =>$value1->alter_dress, 
			'alterations' =>$value1->alterations, 
			'sleeve_json' =>$value1->sleeve_json, 
			'dress_json' =>$value1->dress_json, 	
			'created_at' =>Carbon\Carbon::now(), 	
			'updated_at' =>Carbon\Carbon::now(), 	
		
			]
		);
	
	}	
	
}

}
	
}	
	
	
}


public function Update_OrderNumber_to_Order($razorpayorderid){
	
$check_ordernumber= Orders::select('order_number')->where('order_id',$razorpayorderid)->get()->first();
if(isset($check_ordernumber->order_number)){
$ordernumber=$check_ordernumber->order_number;
}
else{		
	$ordernumber=$this->getNextOrderNumber();
}	
	
/* OrderNumber update Order Table */
$Orderupdate=Orders::where('order_id',$razorpayorderid)->update(['order_number'=>$ordernumber??0]);
$Orderdetailsupdate=Orders_Details::where('order_id',$razorpayorderid)->update(['order_number'=>$ordernumber??0]);
/* OrderNumber update Cart Table */
$Cartupdate=Cart::where('order_id',$razorpayorderid)->update(['order_number'=>$ordernumber??0,'gateway_name'=>'razorpay','payment_mode'=>'online','payment_status'=>'paid','order_status'=>'placed','returned_from_gateway'=>'yes']);
$Cartdetailsupdate=Cart_details::where('order_id',$razorpayorderid)->update(['order_number'=>$ordernumber??0,'item_status'=>'placed']);
/* OrderNumber update payment table */	
$Paymentupdate=Payment::where('razorpay_order_id',$razorpayorderid)->update(['order_number'=>$ordernumber??0]);
	
}


public function Decrease_stocks_applaceorder($razorpayorderid){
	if($razorpayorderid){
		$Oderdetail_info = Orders_Details::select('*')->where('order_id',$razorpayorderid)->get();
		if($Oderdetail_info){
			if($Oderdetail_info->count()>0){			
				foreach($Oderdetail_info as $items){					
					$product_sku = Sku::find($items->sku_id);
					if($product_sku->stock>0){
						if($product_sku){						
							 $product_sku->decrement('stock',$items->qty);
						}	
					}					
				}
				
			}
		}
	}

}




public function Payment_update_selftable($razorpayorderid){	
$razorpay_order_id=$razorpayorderid;
$url="https://".env('RAZOR_KEY').":".env('RAZOR_SECRET')."@api.razorpay.com/v1/orders/".$razorpay_order_id."/payments";
$APIURL=$url;			
$httpClient = new \GuzzleHttp\Client();
$request =
$httpClient
->get($APIURL);			
$response = json_decode($request->getBody()->getContents());

/* Payment Details update payment table */	

$count=$response->count;

if($count==0){
	
}
else if($count==1){
	$Paymentupdate=Payment::where('razorpay_order_id',$razorpayorderid)->update(['entity'=>$response->items[0]->entity??'','payment_id'=>$response->items[0]->id??'','paypal_currency_type'=>$response->items[0]->currency??'','payment_method'=>$response->items[0]->method??'','paypal_payment_status'=>$response->items[0]->status??'','amount_paid'=>($response->items[0]->amount/100)??'']);
}
else if($count>1){	
	foreach($response->items as $key=>$value){		
		if($value->status=="captured"){		
			$Paymentupdate=Payment::where('razorpay_order_id',$razorpayorderid)->update(['entity'=>$value->entity??'','payment_id'=>$value->id??'','paypal_currency_type'=>$value->currency??'','payment_method'=>$value->method??'','paypal_payment_status'=>$value->status??'','amount_paid'=>($value->amount/100)??'']);
		}		
	}	
}

/* Payment Details update payment table */	
//$Paymentupdate=Payment::where('razorpay_order_id',$razorpayorderid)->update(['entity'=>$response->items[0]->entity??'','payment_id'=>$response->items[0]->id??'','paypal_currency_type'=>$response->items[0]->currency??'','payment_method'=>$response->items[0]->payment_method??'','paypal_payment_status'=>$response->items[0]->status??'','amount_paid'=>($response->items[0]->amount/100)??'']);
//$Orderupdate=Orders::where('order_id',$razorpayorderid)->update(['payment_gateway_response'=>$request->getBody()->getContents()??'']);
}


public function send_order_confirmation_mail($razorpayorderid){
	
	if($razorpayorderid){
	$Oder_info = Orders::select('*')->where('order_id',$razorpayorderid)->latest()->first();

	if($Oder_info){
	
		$mail_params = [
		'name' =>$Oder_info->ship_to_name??'',
		'order_number' =>$Oder_info->order_number??'',
		'amount' =>$Oder_info->grand_total??'',
		'total_items' =>$Oder_info->total_items??'',
		'payment_status' =>$Oder_info->payment_status??'',
		'gateway_name' =>$Oder_info->gateway_name??'',
		'ship_to_address' =>$Oder_info->ship_to_address??'',
		'ship_to_phone' =>$Oder_info->ship_to_phone??'',
		'ship_to_state' =>$Oder_info->ship_to_state??'',
		'ship_to_country' =>$Oder_info->ship_to_country??'',
		'ship_to_postalcode' =>$Oder_info->ship_to_postalcode??'',
		'ship_to_city' =>$Oder_info->ship_to_city??'',
		'currency' =>$Oder_info->currency??'',
		'created_at' =>$Oder_info->created_at??'',
		];
		
		if($Oder_info->ship_to_email){
			
			try{
				
			$logparams=
			[
			'subject'=>'Order Confirmation email triggered - '.$razorpayorderid,
			'order_id'=>0,
			'order_number'=>0,
			'razorpay_order_id'=>$razorpayorderid,
			];
			\LogActivity::addToLog($logparams);	
				
				
			Mail::to($Oder_info->ship_to_email)->cc('nchary@taruni.in')->bcc('venkat@deepredink.com')->send(new OrderConfirmation($mail_params));
			
			}catch (\Exception $exception) {

			}
		}
	}
	}
	
	
	
	
}

public function order_failed_not_response($razorpayorderid=false){
/* OrderNumber update Cart Table */
$Cartupdate=Cart::where('order_id',$razorpayorderid)->update(['gateway_name'=>'razorpay','payment_mode'=>'online','payment_status'=>'unpaid','order_status'=>'payment-failed','returned_from_gateway'=>'no']);
$Cartdetailsupdate=Cart_details::where('order_id',$razorpayorderid)->update(['item_status'=>'payment-failed']);
		
}

public function payment_success(Request $request){
$razorpay_order_id=$request->razorpay_order_id;	
$Ordersdetails = Orders::select('order_id','total_items','grand_total','currency','order_number','checkout_mode')->where('order_id',$razorpay_order_id)->get()->first();
return view('frontend.paymentis_success',compact('Ordersdetails'));
}

 public function payment_failed(Request $request){
	return view('frontend.payment_failed');
}

 public function Recheck_Order_Itemsform_Order($razorpay_order_id){
		$this->migrate_cart_order_tables($razorpay_order_id);	
		$this->Update_OrderNumber_to_Order($razorpay_order_id);			
		$this->Decrease_stocks_applaceorder($razorpay_order_id);			
		$this->Payment_update_selftable($razorpay_order_id);	
		$this->send_order_confirmation_mail($razorpay_order_id);
		return Redirect::back()->with('message', 'Successfully moved order mismatched items.');
}


 public function move_cart_as_order($razorpay_order_id){	 
	$recheck_payment_issuccess=$this->Is_Payment_in_Razorpay($razorpay_order_id);
	$isexistorder = Orders::select('id')->where('order_id',$razorpay_order_id)->count();	
	$count=$recheck_payment_issuccess->count;
	$is_captured=$recheck_payment_issuccess->items[0]->status??'';
	
	
	if($count==0){
			return Redirect::back()->with('error', 'Provided Order Id does not exist in the Razorpay gateway.');
		}
		else if($count==1){			
				$is_captured=$recheck_payment_issuccess->items[0]->status??'';			
				if($is_captured=="captured" && $isexistorder==0){			
				$this->migrate_cart_order_tables($razorpay_order_id);	
				$this->Update_OrderNumber_to_Order($razorpay_order_id);			
				$this->Decrease_stocks_applaceorder($razorpay_order_id);			
				$this->Payment_update_selftable($razorpay_order_id);		
				$this->send_order_confirmation_mail($razorpay_order_id);
				return Redirect::back()->with('message', 'Successfully moved cart as an order. Please check-in as an order listing.');
				}
				else{	 
				return Redirect::back()->with('error', 'This payment status seems failed. Please check again before move to order.');
				}

		}
		else if($count>1){
			foreach($recheck_payment_issuccess->items as $key=>$value){		
				if($value->status=="captured" && $isexistorder==0){					
					$this->migrate_cart_order_tables($razorpay_order_id);	
					$this->Update_OrderNumber_to_Order($razorpay_order_id);			
					$this->Decrease_stocks_applaceorder($razorpay_order_id);			
					$this->Payment_update_selftable($razorpay_order_id);		
					$this->send_order_confirmation_mail($razorpay_order_id);
					return Redirect::back()->with('message', 'Successfully moved cart as an order. Please check-in as an order listing.');
				}
			
			}
		}		
}


public function Is_Payment_in_Razorpay($razorpayorderid){	
$razorpay_order_id=$razorpayorderid;
$url="https://".env('RAZOR_KEY').":".env('RAZOR_SECRET')."@api.razorpay.com/v1/orders/".$razorpay_order_id."/payments";
$APIURL=$url;			
$httpClient = new \GuzzleHttp\Client();
$request =
$httpClient
->get($APIURL);			
$response = json_decode($request->getBody()->getContents());
return $response;
}





public function Check_Abandoned_Carts_Move_As_Order(){
	/* This function checking if any payment stuck in gateway but not respond to taruin server */
	$hourlyOrders = Cart::select('order_id')->whereDate('updated_at', Carbon\Carbon::today())
	->where('order_status','hold')
	->whereNotNull("carts.order_id")
	->orderBy('created_at','ASC')
	->get();
	$total_records=$hourlyOrders->count();
	if($total_records>0){
		foreach($hourlyOrders as $key=>$value){								
				$this->move_cart_as_order($value->order_id);
				$this->Order_Converted_Through_Cron($value->order_id);



				
		
		}	
	}
	
}


public function Order_Converted_Through_Cron($razorpayorderid){
	

		
		
	
	$order= Orders::select('order_number')->where('order_id',$razorpayorderid)->get()->first();
	if($order){
		
		
			
	$logparams=
		[
		'subject'=>'Order converted by cron-manual - '.$razorpayorderid??0,
		'order_id'=>0,
		'order_number'=>0,
		'razorpay_order_id'=>$razorpayorderid??0,
		];
		
		\LogActivity::addToLog($logparams);
		
		
		/* Update order converted from abandoned cart to order Order table */
		$Orderupdate=Orders::where('order_id',$razorpayorderid)->update(['order_converted_by_cron'=>'ORD_CNV_BY_CRON']);
		/* Update order converted from abandoned cart to order Cart Table */
		$Cartupdate=Cart::where('order_id',$razorpayorderid)->update(['order_converted_by_cron'=>'ORD_CNV_BY_CRON']);
	}	
}





public function Gateway_Jsondata_update_selftable($razorpayorderid){	
$url="https://".env('RAZOR_KEY').":".env('RAZOR_SECRET')."@api.razorpay.com/v1/orders/".$razorpayorderid."/payments";
$APIURL=$url;			
$httpClient = new \GuzzleHttp\Client();
$request =
$httpClient
->get($APIURL);			
/* Payment Details update order table */	
$Orderupdate=Orders::where('order_id',$razorpayorderid)->update(['payment_gateway_response'=>$request->getBody()->getContents()]);
}




public function Auto_update_payment_response_data(){	
	
	/* This function update payment response data to order table */
	$hourlyOrders = Orders::select('order_id')->where('order_number','>','0')	
	->whereNull("payment_gateway_response")
	->orWhere("payment_gateway_response",'=','')
	->orderBy('created_at','DESC')
	->get();
	$total_records=$hourlyOrders->count();
	if($total_records>0){
		foreach($hourlyOrders as $key=>$value){				
				$this->Gateway_Jsondata_update_selftable($value->order_id);				
		}	
	}
	
}



public function missed_alteration_order_table(){	
	/* This function update payment response data to order table */
	$hourlyOrders = Cart_details::select('*')->where('order_number','>','0')	
	->orderBy('created_at','DESC')
	->get();	
	foreach($hourlyOrders as $key=>$value){	
		//$Orderdetailsupdate=Orders_Details::where('order_id',$value->order_id)->update(['alterations'=>$value->alterations,'alter_dress'=>$value->alter_dress]);
	}
}
}