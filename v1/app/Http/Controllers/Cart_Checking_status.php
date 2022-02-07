<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;

Use Exception;
use App\Models\Payment;

use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Orders;
use App\Models\Orders_Details;
use DB;

class Cart_Checking_status extends Controller
{
	//
	public function movecart_order($order_number=false){
		try{
			$Orders = Orders::select('cart_id','total_items','order_id')->orderBy('id', 'DESC')->where('id',$order_number)->get()->first();
			

			
			
			if($Orders)
			{
			    
    			$moved_Details = Orders_Details::select('id')->orderBy('id', 'DESC')->where('order_number',$order_number)->get()->count();
    	        	$total_items=$Orders->total_items??0;
    	        	if($total_items){
        	        	    if($total_items!=$moved_Details){
                                if($Orders->cart_id){
                                    $cat_items = Cart_details::select('*')->orderBy('id', 'DESC')->where('cart_id',$Orders->cart_id)->get();
                                         foreach( $cat_items  as $key=>$value){
                                             $order_items_count = Orders_Details::select('*')->orderBy('id', 'DESC')->where('cart_id',$Orders->cart_id)->where('sku_id',$value->sku_id)->get()->count();
                                              if($order_items_count==0){
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                   $cart_table_query=Cart_details::query()
                                                    ->where('cart_id','=', $value->cart_id)		
                                                    ->where('sku_id','=', $value->sku_id)		
                                                    ->each(function ($cart_table_query) {
                                                        
                                                    $newRecord = $cart_table_query->replicate();
                                                    $newRecord->setTable('order_items');
                                                    $newRecord->save();
                                                    
                                                    });
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                     
                                                    
                                                    
                                                    $update_query=DB::table('order_items')->where('cart_id', $value->cart_id)->where('sku_id', $value->sku_id)->update(array('order_number' => $ordernumber,'order_id' =>$Orders->order_id,'item_status' =>'placed'));
                                                    
                                                    
                                                    
                                                    
                                                 }
                                         }
                                     
                                     }
        	        	    }
    	        	}
    	        	
    	        	
    	        	
                        RazorpayController::order_placed_after_payment_success($Orders->order_id);
                        RazorpayController::Decrease_stocks_applaceorder($order_number);
                        RazorpayController::send_order_confirmation_mail($order_number);
    			
    		}
		} catch (\Exception $exception) {
			// There was another exception.
		}
	}
	
	
	
	
	
	
	
	
	
	
}