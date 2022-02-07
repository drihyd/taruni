<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
Use Exception;
use App\Models\Payment;
class RazorpayApi extends Controller
{
	//
	
	public function fetch_created_payments($order_id=false){	

		

		try{
		    
		    if(empty($order_id)){
			$Payments = Payment::select('razorpay_order_id','order_number')->orderBy('id', 'DESC')->where('paypal_payment_status','created')->get();
		    }
		    else{
		        	$Payments = Payment::select('razorpay_order_id','order_number')->orderBy('id', 'DESC')->where('razorpay_order_id',$order_id)->get();
		        	

		        
		    }
			foreach($Payments as $key=>$value){	
				$this->fetch_single_payment($value->razorpay_order_id,$value->order_number,"byapi");
			}
		} catch (\Exception $exception) {
			// There was another exception.
		}
	}
	
	 static function fetch_single_payment($Order_Id=false,$order_number=false,$call_by_api=false)
    {  
			try{
			$razorpay_order_id=$Order_Id;
			$url="https://".env('RAZOR_KEY').":".env('RAZOR_SECRET')."@api.razorpay.com/v1/orders/".$razorpay_order_id."/payments";
			$APIURL=$url;			
			//$today = Carbon::now()->toDateString();
			$httpClient = new \GuzzleHttp\Client();
			$request =
			$httpClient
			->get($APIURL);			
			$response = json_decode($request->getBody()->getContents());
			
			RazorpayApi::update_payments_info($razorpay_order_id,$response,$order_number,$call_by_api);	
			
			
			
			} catch (RequestException $exception) {
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		
//abort(500);	
			}
			}		
			
			// You can check for whatever error status code you need 
		return false;
			} catch (\Exception $exception) {

			// There was another exception.

			}			
    }	
    
    
    
	
	static function update_payments_info($order_id=false,$response=false,$order_number=false,$call_by_api=false){

	Payment::updateOrCreate(
				['razorpay_order_id' =>$order_id],			
				[			
				 'entity' =>$response->items[0]->entity??'',	
				 'payment_id' =>$response->items[0]->id??'',	
				 'paypal_currency_type' =>$response->items[0]->currency??'',	
				 'payment_method' =>$response->items[0]->method??'',	
				 'paypal_payment_status' =>$response->items[0]->status??'',
				 'amount_paid' =>($response->items[0]->amount/100)??'',				 
				]
			); 	
			
			
	
		if($call_by_api=="byapi"){
		    
		    	RazorpayController::abanded_cart_orders($order_id);
		    
		    
		}	
		RazorpayController::order_placed_after_payment_success($order_id);
		RazorpayController::Decrease_stocks_applaceorder($order_number);
		RazorpayController::send_order_confirmation_mail($order_number);
		
					
	

	
}











	
	
}