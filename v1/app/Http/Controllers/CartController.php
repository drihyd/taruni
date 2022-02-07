<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Customer;
use App\Models\Used_coupons;
use App\Models\Sku;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
public function addToCart(Request $request)
{
$is_verification=$this->stock_checking($request->skuid,$request->qty);

if($is_verification){
	
if(empty($request->sku))
{
//return redirect()->back()->with('error', 'Please pick any size of selected product.');
return response()->json(['Statuscode'=>201,'error'=>'Please pick any size of selected product.','cartitemid'=>'']);
exit();
}
    $product = Products::findOrFail($request->input('productId'));
	
	
    //$options = $request->except('_token', 'productId', 'price', 'qty');
    //Cart::add(, $product->name, $request->input('price'), $request->input('qty'), $options);
	

	if (empty($request->qty)) {
		$quantity = 1;
	}
	else{
		$quantity=$request->qty;
	}

	if(Auth::Guest()){		
		$basicCart = Cart::select('id')->where('id', session()->get('cart'))->where("order_status",'!=','placed')->latest()->first();
		
		if(!$basicCart) 
		{	
			$cartid= Cart::updateOrCreate(
			[
			'session_id' =>Str::uuid()->toString(),
			'total_amount' => 0,
			'user_id' => 0,
			'total_items' => 0,
			'total_shipping_weight' => 0,
			'cod_fee' => 0,
			'grand_total' => 0,
			'guest_checkout' => 'yes',
			'currency' =>session()->get('appcurrency'),
	
			]
			);	
			$cartid=$cartid->id;			
	
			session()->put('cart',$cartid);
		}
		
		$basicCartdetails = Cart_details::select('id')->where('cart_id', session()->get('cart'))->where('sku_id', $request->skuid)->get();
		if($basicCartdetails->count()==1){
			 //return redirect()->route('orders.show_cart')->with('error', 'Item already added to cart.');
			 
			 return response()->json(['Statuscode'=>201,'error'=>'Item already added to cart.','cartitemid'=>'']);

		}else{
			
			$cartdetails=Cart_details::updateOrCreate(
			[
			'cart_id' => session()->get('cart'),
			'qty' => $quantity,
			'unit_price' => $request->price,
			'price' => $request->price*(int)$quantity,
			'sku_id' => $request->skuid,
			'custom' => $request->product_weight*(int)$quantity,
			'alter_sleeves' => $request->attachSleeves,
			'alter_dress' => $request->alterations,
			'item_size' => $request->sku,
			'currency' =>session()->get('appcurrency'),
			]);	
			 //return redirect()->route('orders.show_cart')->with('message', 'Item added to cart successfully.');
			 
			 return response()->json(['Statuscode'=>200,'success'=>'Item added to cart successfully.','cartitemid'=>$cartdetails->id]);
		}		
	}
	else{
		$user = \Auth::user();	
		
		
		$basicCart = Cart::select('id')->where('user_id',$user->id)->where("order_status",'!=','placed')->get();
			if($basicCart->count()==0) {
			$cartid= Cart::Create(							
				[
				'session_id' =>$user->id,
				'user_id' =>$user->id,	
				'guest_checkout' => 'no',
				'total_items' => 0,
				'total_shipping_weight' => 0,
				'cod_fee' => 0,
				'grand_total' => 0,
				'total_amount' => 0,
				'currency' =>session()->get('appcurrency'),

				]
				);				
				$cartid=$cartid->id;	
				session()->put('cart',$cartid);	
			
				
				
				
			}
			else{

				
			$cartid= Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				'session_id' =>$user->id,
				'user_id' =>$user->id,	
				'guest_checkout' => 'no',
				'total_items' => 0,
				'total_shipping_weight' => 0,
				'cod_fee' => 0,
				'grand_total' => 0,
				'total_amount' => 0,
				'currency' =>session()->get('appcurrency'),
	
				]
				);	
				$cartid=$cartid->id;	
				session()->put('cart',$cartid);	
		
				
			}
			
		$basicCartdetails = Cart_details::select('id')->where('cart_id', session()->get('cart'))->where('sku_id', $request->skuid)->get();
		if($basicCartdetails->count()==1){
		//return redirect()->route('orders.show_cart')->with('error', 'Item already added to cart.');
		 return response()->json(['Statuscode'=>201,'error'=>'Item already added to cart.','cartitemid'=>'']);

		}else{

			
			$cartdetails=Cart_details::updateOrCreate(
			[
			'cart_id' => session()->get('cart'),
			'qty' => $quantity,
			'unit_price' => $request->price,
			'price' => $request->price*(int)$quantity,
			'sku_id' => $request->skuid,
			'custom' => $request->product_weight*(int)$quantity,
			'alter_sleeves' => $request->attachSleeves,
			'alter_dress' => $request->alterations,
			'item_size' => $request->sku,
			'currency' =>session()->get('appcurrency'),

			]);	
			 //return redirect()->route('orders.show_cart')->with('message', 'Item added to cart successfully.');
			 
			 return response()->json(['Statuscode'=>200,'success'=>'Item added to cart successfully.','cartitemid'=>$cartdetails->id]);
		}		
	}		
	}
	else{

	//return redirect()->back()->with('error', 'Quantity not exceed stock value');
	return response()->json(['Statuscode'=>201,'success'=>'Item added to cart successfully.','cartitemid'=>'']);
	}	
	
}

public function check_sku_duplicates($cartid=null)
{
	if($cartid){
	$affectedRow = DB::delete('DELETE t1 FROM cart_items t1, cart_items t2 WHERE t1.id > t2.id AND t1.sku_id = t2.sku_id and t1.cart_id="'.$cartid.'" and t2.cart_id="'.$cartid.'" and t1.item_status="hold" and t2.item_status="hold"');
	}
}
	 
	public function getCart()
    {
	
		\App::call('App\Http\Controllers\CartController@merge_cart_items');

		
		$user = \Auth::user();	
		if (Auth::check()) {	
	
			$basicCart = Cart::select('*')->where('user_id', $user->id)->where("carts.order_status",'=','hold')->latest()->first();
		
			$basicCart_details=Cart_details::select('skus.sku_code as sku_code','skus.on_sale as on_sale','skus.on_sale_price_'.session()->get('appcurrency').' as psaleprice','categories.product_upload_path','categories.shipping_weight','skus.stock as pstock','cart_items.item_size as item_size','cart_items.sleeve_json as sleeve_json','cart_items.alterations as alterations','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice')
			->leftjoin('skus','skus.id','=','cart_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
			->leftjoin('carts','carts.id','=','cart_items.cart_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')
			->where("carts.user_id",$user->id)
			->where("carts.order_status",'=','hold')
			->get();
		
			if(empty(session()->get('cart'))){
				if($basicCart){
				session()->put('cart',$basicCart->id);
				}				
			}
			else{
				if($basicCart){
				session()->put('cart',$basicCart->id);
				}
			}
			
		}
		else{
			

			$basicCart = Cart::select('*')->where('id', session()->get('cart'))->latest()->first();
			

			$basicCart_details=Cart_details::select('skus.sku_code as sku_code','skus.on_sale as on_sale','skus.on_sale_price_'.session()->get('appcurrency').' as psaleprice','categories.product_upload_path','categories.shipping_weight','skus.stock as pstock','cart_items.item_size as item_size','cart_items.sleeve_json as sleeve_json','cart_items.alterations as alterations','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice')
			->leftjoin('skus','skus.id','=','cart_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
			->leftjoin('carts','carts.id','=','cart_items.cart_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')
			->where("cart_id",session()->get('cart'))
			->where("carts.order_status",'=','hold')
			->get();
		}		

		if($basicCart_details->count()>0){
			if (Auth::check()) {				
				$cart_id=$basicCart->id;		
			}
			else{
				$cart_id=session()->get('cart');
			}
			
			$this->cart_calculations($cart_id);	
		}	


		
		return view('frontend.cart',compact('basicCart_details'));

    }
	
	
	function cart_calculations($cartid=false){		
		$Cart_details_sum=Cart_details::select('*')->where('cart_id',$cartid)->sum('price');	
		//$Total_Cart_details=Cart_details::select('*')->where('cart_id',$cartid)->count();		
		$Total_Cart_details=Cart_details::select('*')->where('cart_id',$cartid)->sum('qty');
		$Total_Weight=Cart_details::select('*')->where('cart_id',$cartid)->sum('custom');
		$basicCart = Cart::select('discount_coupon')->where('id',$cartid)->first();
		$cartupdate=Cart::updateOrCreate(['id' =>$cartid],['total_shipping_weight'=>$Total_Weight??0,'total_items'=>$Total_Cart_details,'total_amount' =>$Cart_details_sum,'grand_total' =>$Cart_details_sum-$basicCart->discount_coupon??0]);
		
		
		$this->apply_shipping_Price($cartid);
	
	
	}
	
	
	
	public function apply_shipping_Price($cartid=false)
    {
	
        $grandTotal = Cart::select('grand_total','ship_to_country','currency','total_shipping_fee','total_amount','discount_coupon')->where('id',$cartid)->first();
		$total_amount=$grandTotal->total_amount??0;
		$discount_coupon=$grandTotal->discount_coupon??0;
		$grand_total=$grandTotal->grand_total??0;		
		$total_shipping_fee=$grandTotal->total_shipping_fee??0;
		$Total=($total_amount-$discount_coupon)*1;
		$currency=$grandTotal->currency??'';
		$ship_to_country=$grandTotal->ship_to_country??'';		
		
		if($ship_to_country!="" && $currency!="" && $Total>0){


			
			
		if ($ship_to_country=='india' && $currency=="INR" && $Total<1000)
		{
			$price_level=100;
		
		}
		else if ($ship_to_country!='india' && $currency=="USD" && ($Total>=0 && $Total<125))
		{
			$price_level=30;
		}
		else if ($ship_to_country!='india' && $currency=="USD" && ($Total>=125 && $Total<225))
		{
			$price_level=15;
		}
		else if ($ship_to_country!='india' && $currency=="USD" && $Total>=225)
		{
			$price_level=0;
		}		
		
		else if ($ship_to_country=='india' && $currency!="INR")
		{
			$convert_inr = ($Total*73.81*1);
			if($convert_inr<1000) {
			$price_level = 13.55;
			} else {
			$price_level =0;
			}
			
			
		}
		else if ($ship_to_country!='india' && $currency=="INR")
		{
			$convert_usd=($Total/73.81)*1;

			if($convert_usd>0 && $convert_usd<125) {
			$usd_shipping_price = 30;
			} else if($convert_usd>=125 && $convert_usd<225) {
			$usd_shipping_price = 15;
			} else {
			$usd_shipping_price = 0;
			}

			/* Dollar price convert into price */

			$price_level = $usd_shipping_price*73.81*1;
			
		}
		else{
			$price_level=0;
		}
        $cartupdate=Cart::updateOrCreate(['id' =>$cartid],['total_shipping_fee'=>$price_level,'grand_total' =>$Total+$price_level]);
		}
		else{
			return true;
		}
		
	
    }
	
	public function update_cart(Request $request)
    {	
		
		if($request)
		{
			$is_verification=$this->stock_checking($request->sku_id,$request->quantity);
			if($is_verification){
			if($request->itemid && $request->quantity){
				$cartupdate=Cart_details::updateOrCreate(['id' =>$request->itemid],['qty' =>$request->quantity,'price' =>$request->unitprice*(int)$request->quantity,'custom' =>$request->shipping_weight*(int)$request->quantity]);
				$this->cart_calculations(session()->get('cart'));
				if($cartupdate){
					return response()->json(['success' => 'You have changed QUANTITY to '.$request->quantity,'statusCode'=>200]);
				}
				else{
					return response()->json(['error' => 'Item updated to cart failed','statusCode'=>201]);
				}
			}	
			}
			else{
				return response()->json(['error' => 'Quantity not exceed stock value','statusCode'=>201]);
			}
		}
		else{
			return response()->json(['error' => 'Request data not found','statusCode'=>201]);
		}	
    }
	
	
	public function stock_checking($sku_id,$enterd_qty)
    {
		$Sku_info=Sku::find($sku_id);	
		if($Sku_info){
			 if($enterd_qty>$Sku_info->stock)
			 {
				 return false;
			 }
			 else{
				 return true;
			 }
		}
		
		
		
	}
  
    /**
     * Write code on Method
     *
     * @return response()
     */
public function removeItem($keyid=false)
{
	$id=Crypt::decryptString($keyid);
	
	$cartitem = Cart_details::find($id);
	
	if($cartitem){
	$cartitem->delete();
	$this->cart_calculations(session()->get('cart'));
	
	$count=Cart_details::select('id')->where('cart_id',session()->get('cart'))->where("item_status",'!=','placed')->count();
	if($count==0){
		$cart = Cart::find(session()->get('cart'));
		$cart->delete();
	}
    return redirect()->back()->with('message', 'Successfully removed from your cart.');
	}
	
	else{
		 return redirect()->back()->with('error', 'Cart Id not found.');
	}
}






public function guest_checkout()
    { 
		// The user is logged in...
		return view('frontend.guest_checkout');
		
    }   


	

	public function guest_checkout_review(Request $request)
    {
		
		if(empty($request->country)){
			return redirect()->back()->with('error', 'Please select a country name.');
		}
		else{
			
				$logparams=
				[
				'subject'=>'checkout by guest account',
				'order_id'=>0,
				'order_number'=>0,
				'razorpay_order_id'=>0,
				];

				\LogActivity::addToLog($logparams);			
	
			
				/* Get Guest User default information and update to cart table with user ID */
				$guest_user_details = Customer::select('id')->where('role',5)->get()->first();	
				$cartupdate=Cart::updateOrCreate(
				['id' =>session()->get('cart')],
				[
				'ship_to_name' =>$request->firstname." ".$request->lastname,
				'ship_to_email' =>$request->email??"",
				'ship_to_phone' =>$request->mobile??"",
				'ship_to_address' =>$request->address??"",		
				'ship_to_city' =>$request->city??"",
				'ship_to_state' =>$request->state??"",
				'ship_to_country' =>$request->country??"",	
				'ship_to_postalcode' =>$request->pincode??"000000",
				'bill_to_name' =>$request->firstname." ".$request->lastname,
				'bill_to_email' =>$request->email??"",
				'bill_to_phone' =>$request->mobile??"",
				'bill_to_address' =>$request->address??"",		
				'bill_to_city' =>$request->city??"",
				'bill_to_state' =>$request->state??"",
				'bill_to_country' =>$request->country??"",	
				'bill_to_postalcode' =>$request->pincode??"000000",
				'checkout_mode' =>'checkoutasguest',
				'user_id' =>$guest_user_details->id??0,
				'session_id' => $guest_user_details->id??0,
				]
				);



				/* Update Guest default info to used coupon table */

				$Used_coupon = Used_coupons::select('cart_id')->where('cart_id',session()->get('cart'))->get();				
				if($Used_coupon->count()>0) {
				Used_coupons::updateOrCreate(
				['cart_id' =>session()->get('cart')],			
				[
				'user_id' => $guest_user_details->id??0,					
				]
				);			
				}


				/*  Check cart items exist in cart table with cart session id*/
				
				$basicCart_details=Cart_details::select('categories.product_upload_path','skus.sku_code as sku_code','skus.stock as pstock','cart_items.item_size as item_size','cart_items.sleeve_json as sleeve_json','cart_items.alterations as alterations','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice')
				->leftjoin('skus','skus.id','=','cart_items.sku_id')
				->leftjoin('products','skus.product_id','=','products.id')
				->leftjoin('carts','carts.id','=','cart_items.cart_id')
				->leftjoin('categories', 'categories.id','=','products.cat_id')
				->where("carts.id",session()->get('cart'))
				->where("carts.order_status",'=','hold')
				->get();	


				if($basicCart_details->count()>0){
				$this->cart_calculations(session()->get('cart'));	
				}	
				return view('frontend.review_checkout',compact('basicCart_details'));
	
		}
	
	
    }



	public function show_checkout()
    {
        //
		if (Auth::check()) {
		// The user is logged in...
		return view('frontend.checkout');
		}
		else{
		return redirect()->route('customer.signin');
		}

    }





	

		public function show_checkout_review(Request $request)
    {
        //
		
		

		$logparams=
		[
		'subject'=>'checkout by registered account',
		'order_id'=>0,
		'order_number'=>0,
		'razorpay_order_id'=>0,
		];
		
		\LogActivity::addToLog($logparams);



		
		
		 $cartupdate=Cart::updateOrCreate(
		 ['id' =>session()->get('cart')],
		 [
			'ship_to_name' =>$request->firstname." ".$request->lastname,
			'ship_to_email' =>$request->email??"",
			'ship_to_phone' =>$request->mobile??"",
			'ship_to_address' =>$request->address??"",		
			'ship_to_city' =>$request->city??"",
			'ship_to_state' =>$request->state??"",
			'ship_to_country' =>$request->country??"",	
			'ship_to_postalcode' =>$request->pincode??"000000",
			
			'bill_to_name' =>$request->firstname." ".$request->lastname,
			'bill_to_email' =>$request->email??"",
			'bill_to_phone' =>$request->mobile??"",
			'bill_to_address' =>$request->address??"",		
			'bill_to_city' =>$request->city??"",
			'bill_to_state' =>$request->state??"",
			'bill_to_country' =>$request->country??"",	
			'bill_to_postalcode' =>$request->pincode??"000000",
			'checkout_mode' =>'',
		 ]
		 );
		 
		 $cartupdate=Customer::updateOrCreate(
		 ['id' =>Auth::user()->id],
		 [
			'pincode' =>$request->pincode??"000000",
			'address' =>$request->address??"",		
			'city' =>$request->city??"",
			'state' =>$request->state??"",
			'country' =>$request->country??"",			
		 ]
		 );			

		$basicCart_details=Cart_details::select('categories.product_upload_path','skus.sku_code as sku_code','skus.stock as pstock','cart_items.item_size as item_size','cart_items.sleeve_json as sleeve_json','cart_items.alterations as alterations','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice')
		->leftjoin('skus','skus.id','=','cart_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->leftjoin('carts','carts.id','=','cart_items.cart_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where("carts.user_id",Auth::user()->id)
		->where("carts.order_status",'=','hold')
		->get();		



		
$address_count=DB::table('addresses')
->where("user_id",Auth::user()->id??0)
->where("addtype",'shipping')
->get()->first();

if($address_count){
	
}
else{
	DB::table('addresses')->insert([
	[
	"user_id"=>Auth::user()->id,
	"firstname"=>$request->firstname??'',
	"lastname"=>$request->lastname??'',
	"email"=>$request->email??'',
	"phone"=>$request->mobile??'',
	"country"=>$request->country??'',
	"state"=>$request->state??'',
	"city"=>$request->city??'',
	"pincode"=>$request->pincode??"000000",
	"address"=>$request->address??'',
	"addtype"=>'shipping',
	"is_default"=>'yes',
	"address_title"=>'Default',
	]  
	]); 
}

		
		if($basicCart_details->count()>0){
		$this->cart_calculations(session()->get('cart'));	
		}	
	return view('frontend.review_checkout',compact('basicCart_details'));
	
	
	
	
    }  	
	
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
	
	public function remove_nullable_cartid()
	{
		
		# Removing cart master id if cart master id not exist in cart details table
		
		$user = \Auth::user();	
		if($user){		
			$basicCarts = Cart::select('id')->where('user_id',$user->id)->where("order_status",'=','hold')->get();
			$basicCarts->count();	
			if($basicCarts->count()>0){			
			foreach($basicCarts as $key=>$value){			
			$basicCartdetails = Cart_details::select('id')->where('cart_id',$value->id)->count();
			if($basicCartdetails==0)
			{	
				$cart = Cart::find($value->id);
				$cart->delete();				
			}	

			}

			}
		}
	}
	
	
public function merge_cart_items()
	{
		
		
		$this->remove_nullable_cartid();	
		
		$user = \Auth::user();
		if($user){		
		$basicCarts = Cart::select('id')->where('user_id',$user->id)->where("order_status",'=','hold')->get();
		$basicCarts->count();		

		if($basicCarts->count()>0){	
			
			$basicCarts_last = Cart::select('id')->where('user_id',$user->id)->where("order_status",'=','hold')->latest()->first();


	
			foreach($basicCarts as $key=>$value)			
			{		
			
				$basicCartdetails = Cart_details::select('id')->where('cart_id',$value->id)->count();
					
					if($basicCartdetails){
						
					$cartupdate=Cart_details::updateOrCreate(
					['cart_id' =>$value->id],
					['cart_id' =>$basicCarts_last->id]

					);	
					
					}
					
			}
		




		if($basicCarts_last->id)
		{		
			$this->remove_duplicate_cart_items($basicCarts_last->id);
		}
		
		if($basicCarts_last->id)
		{
			
			
			
			$deleterecords=Cart::where('user_id',$user->id)->where("order_status",'=','hold')->where("id",'!=',$basicCarts_last->id)->delete();
		}
		
		
		
		
		if($basicCarts_last->id)
		{
			$this->cart_calculations($basicCarts_last->id);
			session()->put('cart',$basicCarts_last->id);
		
		}
		
		}
		
		
}
	
	}
	
	
	
	public function remove_duplicate_cart_items($cartid)
	{
		if($cartid>0){
		$this->check_sku_duplicates($cartid);	
		}
	}
	
	
	public function update_cartnew_prices()
	{
	
		$user = \Auth::user();		
		if(session()->get('cart')){		
		$basicCarts = Cart::select('id')->where('id',session()->get('cart'))->where("order_status",'=','hold')->get();
	
		$basicCarts->count();	
		if($basicCarts->count()>0){				
		foreach($basicCarts as $key=>$value){	
				
			$basicCartdetails=Cart_details::select('cart_items.sku_id as csku_id','skus.stock as pstock','cart_items.item_size as item_size','cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice')
			->leftjoin('skus','skus.id','=','cart_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
			->leftjoin('carts','carts.id','=','cart_items.cart_id')
			->where("carts.id",session()->get('cart'))
			->where("cart_items.cart_id",$value->id)
			->get();
				
					
					if($basicCartdetails){				
						
						
						foreach($basicCartdetails as $key1=>$value1){						
							
						if($value1->unit_price!=$value1->pprice)
						{
							
			
		
								$cartdetails=Cart_details::updateOrCreate(
								
								
								['id' =>$value1->itemid],

								[
								'unit_price' => $value1->pprice,
								'price' => $value1->pprice*(int)$value1->itemqty,
								'cart_id' =>session()->get('cart'),
								'sku_id' =>$value1->csku_id,
								'currency' =>session()->get('appcurrency'),
								]
								
								);	
								
								
								
								$cartupdate=Cart::updateOrCreate(								
								['id' =>session()->get('cart')],
								[					
								'currency' =>session()->get('appcurrency'),
								]								
								);
								
								
								
														
							$this->cart_calculations(session()->get('cart'));						
							
						}				
	
					
					}
					
					}
					
			}
		


		
		}
}
	return redirect('/cart')->with('message', 'Successfully new prices are updated to existng your cart.');
	}
	
	public function update_alterations($id)
	{
		$cart_items = Cart_details::find($id);

	    return response()->json([
	      'data' => $cart_items
	    ]);
	}	
	
	public function capture_sleeve_alterations(Request $request)
	{
		
		
		
	
		Cart_details::updateOrCreate(
       [
        'id' => $request->cartitemid
       ],
       [
     
		'sleeve_json' => json_encode(["sleeveLength"=>$request->sleeveLength??'standard',"sleeveArmhole"=>$request->sleeveArmhole??'standard',"sleeveCircumference"=>$request->sleeveCircumference??'standard']),
       ]
      );
	  
	  if(Auth::Guest()){
		  
		  
	  }	  
	  else{	  
			$isexits_sleeve_profile= DB::table('my_fit_profile')->where('user_id',auth()->user()->id)->where('type','sleeve')->get()->count();
			if($isexits_sleeve_profile==0)
			{
				
			DB::table('my_fit_profile')->insert([
				[
					"profile_name"=>'Default',
					"slug"=>Str::slug('Default'),                
					"sleeve_circumference"=>$request->sleeveCircumference??'',
					"sleeve_length"=>$request->sleeveLength??'',
					"armhole"=>$request->sleeveArmhole??'',
					"user_id"=>auth()->user()->id,
					"type"=>'sleeve'

				]
			]);
				

			}			
	  }
	  


	   return response()->json(['Statuscode'=>200,'success'=>'Successfully added Sleeves Alterations.']);
	}
	
	public function capture_sl_alterations(Request $request)
	{
		Cart_details::updateOrCreate(
       [
        'id' => $request->cartitemid
       ],
       [
        'alterations' => json_encode(["chest"=>$request->chest??'standard',"waist"=>$request->waist??'standard',"hip"=>$request->hip??'standard',"dressLength"=>$request->dressLength??'standard']),
		
       ]
      );
	  
	  
	  
	   if(Auth::Guest()){
		  
		  
	  }	  
	  else{	  
			$isexits_sleeve_profile= DB::table('my_fit_profile')->where('user_id',auth()->user()->id)->where('type','body')->get()->count();
			if($isexits_sleeve_profile==0)
			{				
			DB::table('my_fit_profile')->insert([
				[					
				"profile_name"=>'Default',
                "slug"=>Str::slug('Default'),
                "chest"=>$request->chest??'',
                "waist"=>$request->waist??'',
                "hips"=>$request->hip??'',
                "top_length"=>$request->dressLength??'',
                "user_id"=>auth()->user()->id,
                "type"=>'body'
				]
			]);
			
			}			
	  }
	  
	  

	  return response()->json(['Statuscode'=>200,'success'=>'Successfully added Alterations Details.']);
	}
	
		public function capture_alterations(Request $request, $id)
	{
		Cart_details::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'alterations' => json_encode(["chest"=>$request->chest??'standard',"waist"=>$request->waist??'standard',"hip"=>$request->hip??'standard',"dressLength"=>$request->dressLength??'standard']),
		'sleeve_json' => json_encode(["sleeveLength"=>$request->sleeveLength??'standard',"sleeveArmhole"=>$request->sleeveArmhole??'standard',"sleeveCircumference"=>$request->sleeveCircumference??'standard']),
       ]
      );

      return response()->json([ 'success' => true ]);
	}
	
	
	
public function checkCoupon(Request $request)
{
	

	$code = $request->coupon_code;
	$check = DB::table('coupons')
	->where('CouponCode',$code)
	->get();
	
	
	if(!empty($code)){
	
	if(count($check)=="1") {
		
		if(Auth::Guest() || Auth::user()){	

			$basicCart = Cart::select('session_id','grand_total')->where('id',session()->get('cart'))->first();
			$user_id = $basicCart->session_id;	
			
			$check_used = DB::table('used_coupons')
			->where('user_id', $user_id)			
			->where('coupon_id', $check[0]->CouponID)
			->orwhere('cart_id', session()->get('cart'))
			->count();

			if($check_used==0){
			
			if($check[0]->DiscountType=="FXD")
			{				
				$discount_cal=$check[0]->Discount_value*1;				
			}			
			
			if($check[0]->DiscountType=="PCTG")
			{		
		
				$discount_cal=($basicCart->grand_total*$check[0]->Discount_value/100);				
			}
			// $insert_cart_total = DB::table('cart_total')
			// ->insert([
			// 'cart_total' => Cart::total(),
			// 'discount' => $check[0]->discount,
			// 'user_id' => $user_id,
			// 'gtotal' =>  Cart::total() - (Cart::total() * $check[0]->discount)/100,
			// ]);
			
			
			
		
			if($basicCart->grand_total-$discount_cal<=0){
				return redirect()->back()->with('error', 'This '.$code.' Coupon code is not applicable on the current order.');    
			}
			else{
				
				$used_add = DB::table('used_coupons')
				->insert([
				'coupon_id' => $check[0]->CouponID,
				'coupon_code' => $code,
				'user_id' => $user_id,
				'cart_id' => session()->get('cart'),
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				]);			
				$insert_discount_total = DB::table('carts')
				  ->where('id', session()->get('cart'))
				  ->update(['discount_coupon' =>$discount_cal]);
				  
				$this->cart_calculations(session()->get('cart'));			
				return redirect('/cart')->with('message', $code.' Coupon successfully Applied.');      
			}
			 
			 
			
			}
			else{			
			return redirect()->back()->with('error', 'Coupon Have Already Applied.');       
			}
		
       }
	   
		
		
		
		
    }
    else if(count($check)==0){		
		return redirect()->back()->with('error', 'Wrong Coupon Code Entered');
       }
    else{
		return redirect()->back()->with('error', 'Please Enter The Coupon Code');
    }
	}
	else{
		return redirect()->back()->with('error', 'Please Enter The Coupon Code');
	}
}


public function checkCoupon_remove(Request $request)
{
	
	$basicCart = Cart::select('session_id','grand_total')->where('id',session()->get('cart'))->first();
	$user_id = $basicCart->session_id;
	$check = DB::table('used_coupons')
	->where('cart_id',session()->get('cart'))
	->where('user_id', $user_id)
	->get();
	
	if(count($check)==1) {
		
		if(Auth::Guest() || Auth::user()){	
		
		/*  Delete coupon from usded coupons table */
			$revert_coupon=DB::table('used_coupons')
			->where('cart_id', session()->get('cart'))
			->where('user_id', $user_id)
			->delete();
		
		/*  Update discout code is zero */
			$insert_discount_total = DB::table('carts')
			->where('id', session()->get('cart'))
			->update(['discount_coupon' =>0]);			  
			$this->cart_calculations(session()->get('cart'));		
			return redirect('/cart')->with('message', 'Applied Coupon removed.');      
			}
			else{			
			return redirect()->back()->with('error', 'Something went wrong.');       
			}		
       } 
		else{
		return redirect()->back()->with('error', 'Please apply Coupon Code before remove.');
		}
    
}	
}

