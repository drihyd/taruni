<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Products;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class MyAccountController extends Controller
{
    public function my_account()
    {
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;

    		$orders_data=DB::table('orders')->select('orders.*')
    		->leftjoin('users','users.id','=','orders.user_id')
			->where("orders.user_id",$user_ID)
			->orderBy('orders.created_at', 'desc')
			->get();

			foreach ($orders_data as $key => $orders) {
				$orders_data[$key]->sub_items = DB::table('order_items')->select('order_items.*','skus.id as skuid','skus.sku_code','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice','categories.product_upload_path as product_upload_path')
				->leftjoin('skus','skus.id','=','order_items.sku_id')
				->leftjoin('products','skus.product_id','=','products.id')
                ->leftjoin('categories','categories.id','=','products.cat_id')
				->where('order_items.order_number',$orders->order_number)
				
				->get();
			}

			


    		return view('frontend.myaccount.myorders',compact('orders_data'));
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function my_order_view($order_number)
    {

        $order_number = Crypt::decrypt($order_number);
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;

			$orders_data=DB::table('orders')->select('orders.*')
			->leftjoin('users','users.id','=','orders.user_id')
			->where("orders.user_id",$user_ID)
			->where("orders.order_number", $order_number)
			->get()->first();
			
		

			$order_items = DB::table('order_items')->select('order_items.*','skus.id as skuid','skus.sku_code','products.id as pid','products.code as pcode','products.name as pname','products.slug as pslug','skus.price_inr as pprice','categories.product_upload_path as product_upload_path')
			->leftjoin('skus','skus.id','=','order_items.sku_id')
			->leftjoin('products','skus.product_id','=','products.id')
            ->leftjoin('categories','categories.id','=','products.cat_id')
			->where('order_items.order_number',$order_number)
			->get();
			

		


    		return view('frontend.myaccount.myorder_details',compact('orders_data','order_items'));
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function my_profile()
    {
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;

    		$users_data=DB::table('users')->select('users.*')
			->where("users.id",$user_ID)
			->get()->first();

			

    		return view('frontend.myaccount.myprofile',compact('users_data'));
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function my_fit_profile()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            $users_data=DB::table('users')->select('users.*')
            ->where("users.id",$user_ID)
            ->get()->first();

            $my_fit_profile_data=DB::table('my_fit_profile')
            ->where('type','sleeve')
            ->where("user_id",$user_ID)
            ->get();

            $body_data=DB::table('my_fit_profile')
            ->where('type','body')
            ->where("user_id",$user_ID)
            ->get();


            
                // echo '<pre>'; print_r($users_data); exit();

            return view('frontend.myaccount.my_fit_profile_1',compact('users_data','my_fit_profile_data'));
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }
    public function my_fit_profile_add()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            $users_data=DB::table('users')->select('users.*')
            ->where("users.id",$user_ID)
            ->get()->first();
            $pageTitle= "Add a Fit Profile";
            return view('frontend.myaccount.my_fit_profile',compact('users_data','user_ID','pageTitle'));
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }

    
    public function my_fit_profile_store(Request $request)
    {

        $isexits_fit_profile= DB::table('my_fit_profile')->where('profile_name',$request->profile_name)->where('type','sleeve')->get()->count();


        if (Auth::check()) {
            $user_ID=auth()->user()->id;
        $request->validate([
            // 'attach_sleeves'=>'required',
            'chest'=>'required',
            'waist'=>'required',
            'hips'=>'required',
            'top_length'=>'required',
            'profile_name'=>'required',
            
        ]);
        

          if ($isexits_fit_profile > 0) {

            return redirect()->back()->with('error','This Name already exits');

          }else{

            DB::table('my_fit_profile')->insert([
            [
                "profile_name"=>$request->profile_name,
                "slug"=>Str::slug($request->profile_name),
                // "attach_sleeves"=>$request->attach_sleeves,
                
                "sleeve_circumference"=>$request->sleeve_circumference??'',
                "sleeve_length"=>$request->sleeve_length??'',
                "armhole"=>$request->armhole??'',
                "user_id"=>$user_ID,
                "type"=>'sleeve',


            ]  
        ]);
         DB::table('my_fit_profile')->insert([
            [
                "profile_name"=>$request->profile_name,
                "slug"=>Str::slug($request->profile_name),
                "chest"=>$request->chest??'',
                "waist"=>$request->waist??'',
                "hips"=>$request->hips??'',
                "top_length"=>$request->top_length??'',
                "user_id"=>$user_ID,
                "type"=>'body',

            ]  
        ]); 
        return redirect('myfitprofile')->with('success', "Successfully added a details.");

          }


                

            
        
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
    }
    public function my_fit_profile_edit($slug)    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;
            $my_fit_profile_data=DB::table('my_fit_profile')->get()->where("slug",$slug)->where('type','sleeve')->first();
            $body_fit_profile_data=DB::table('my_fit_profile')->get()->where("slug",$slug)->where('type','body')->first();

            $pageTitle="Edit".' '.$my_fit_profile_data->profile_name.' '."Fit Profile";      
            return view('frontend.myaccount.my_fit_profile',compact('my_fit_profile_data','pageTitle','user_ID','body_fit_profile_data'));
        
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
        
    }
    public function my_fit_profile_update(Request $request)
    {



        if (Auth::check()) {
            $user_ID=auth()->user()->id;
        $request->validate([
            // 'attach_sleeves'=>'required',
            'chest'=>'required',
            'waist'=>'required',
            'hips'=>'required',
            'top_length'=>'required',
            'profile_name'=>'required',         
        ]); 

         
        DB::table('my_fit_profile')
            ->where('type','sleeve')
            ->where('slug', $request->fit_slug)
            ->update(
            [
                
                "profile_name"=>$request->profile_name,
                "slug"=>Str::slug($request->profile_name),
                "sleeve_circumference"=>$request->sleeve_circumference??'',
                "sleeve_length"=>$request->sleeve_length??'',
                "armhole"=>$request->armhole??'',
                "user_id"=>$user_ID,
                "type"=>'sleeve',
            ]
            ); 


            DB::table('my_fit_profile')
            ->where('type','body')
            ->where('slug', $request->fit_slug)
            ->update(
            [
                
                "profile_name"=>$request->profile_name,
                "slug"=>Str::slug($request->profile_name),
                "chest"=>$request->chest??'',
                "waist"=>$request->waist??'',
                "hips"=>$request->hips??'',
                "top_length"=>$request->top_length??'',
                "user_id"=>$user_ID,
                "type"=>'body',
            ]
            );  

        return redirect('myfitprofile')->with('success', "Successfully update a details.");
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
    }
    public function my_fit_profile_delete($id)
    {
        
            $data=DB::table('my_fit_profile')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Successfully delete a data.');
        
    }
    public function my_profile_update(Request $request)
    {
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;

    		$users_data=DB::table('users')->select('users.*')
			->where("users.id",$user_ID)
			->get()->first();

			// dd($request);
				$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'sometimes|nullable',    
            'address'=>'sometimes|nullable', 
            'profile' => 'image|mimes:jpg,jpeg,png',   
        ]);  

              if ($request->hasFile('profile')) {   
        $filename=uniqid().'_'.time().'.'.$request->profile->extension();
        $request->profile->move(('assets/uploads'),$filename);
      DB::table('users')
      ->where('id', $user_ID)
      ->update(["profile"=>$filename]);    
        }
        else{
            $filename="";
        }  

        
         
        DB::table('users')
            ->where('id', $user_ID)
            ->update(
            [
                
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "phone"=>$request->phone??'',
                "state"=>$request->state??'',
                "country"=>$request->country??'',
                "city"=>$request->city??'',
                "address"=>$request->address??'',
            ]
            );      
        return redirect('myprofile')->with('success', "Successfully update a details.");
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function my_addresses()
    {
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;    		
            $address_data=DB::table('addresses')->where('user_id',$user_ID)->get();
    		return view('frontend.myaccount.myaddresses',compact('address_data'));
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function my_addresses_create()
    {
    	if (Auth::check()) {
    		$user_ID=auth()->user()->id;

    		

    		return view('frontend.myaccount.my_add_address');
    	}else{
    		return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    	}
    }
    public function store_address(Request $request)
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'email|required',
            'address'=>'required',
            'city'=>'required',
            'pincode'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
            'phone'=>'required',
            'addtype'=>'required',
            'address_title'=>'required',
            'is_default'=>'required',
            
        ]);

        
        DB::table('addresses')->insert([
            [
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "email"=>$request->email,
                "address"=>$request->address,
                "state"=>$request->state??'',
                "city"=>$request->city??'',
                "country"=>$request->country??'',
                "pincode"=>$request->pincode??'',
                "phone"=>$request->phone??'',
                "addtype"=>$request->addtype??'',
                "is_default"=>$request->is_default??'',
                "address_title"=>$request->address_title??'',
                "user_id"=>$user_ID,

            ]  
        ]); 
        return redirect('myaddresses')->with('success', "Successfully added a details.");
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
    }
     public function edit_address($id)    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;
            $address_data=DB::table('addresses')->get()->where("id",$id)->first();
            $pageTitle="Edit Address";      
            return view('frontend.myaccount.my_add_address',compact('address_data','pageTitle','user_ID'));
        
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
        
    }
    public function update_address(Request $request)
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'email|required',
            'address'=>'required',
            'city'=>'required',
            'pincode'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
            'phone'=>'required',
            'addtype'=>'required',
            'address_title'=>'required',
            'is_default'=>'required',         
        ]);  
         
        DB::table('addresses')
            ->where('id', $request->id)
            ->update(
            [
                
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "email"=>$request->email,
                "address"=>$request->address,
                "state"=>$request->state??'',
                "city"=>$request->city??'',
                "country"=>$request->country??'',
                "pincode"=>$request->pincode??'',
                "phone"=>$request->phone??'',
                "addtype"=>$request->addtype??'',
                "is_default"=>$request->is_default??'',
                "address_title"=>$request->address_title??'',
                "user_id"=>$user_ID,
            ]
            );      
        return redirect('myaddresses')->with('success', "Successfully update a details.");
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue."); 
        } 
    }
    public function delete_address($id)
    {
        
            $data=DB::table('addresses')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Successfully delete a data.');
        
    }
    public function change_password()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            

            return view('frontend.myaccount.changepassowrd');
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }

    public function store_change_password(Request $request)
    {
        if (Auth::check()) {
        $request->validate([
            // 'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('/customer-signin')->with('success', "Password Changed Successfully please login with New credentials.");

    }else{
        return redirect('/customer-signin')->with('error', "Please Login to Continue.");
    }
    }

    public function my_coupons()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            $pageTitle = "My Coupons";
            // $coupons_data=DB::table('used_coupons')->get();
            $coupons_data=DB::table('used_coupons')->select('used_coupons.*','coupons.*')
            ->leftjoin('coupons','coupons.CouponID','=','used_coupons.coupon_id')
            ->where("used_coupons.user_id",$user_ID)
            ->get();


            // echo '<pre>'; print_r($coupons_data); exit();
            return view('frontend.myaccount.mycoupons',compact('coupons_data','pageTitle'));
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }
    public function my_wishlist()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            
                $wishlists=Wishlist::select('wishlists.id as wid','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice','products.slug as pslug','categories.product_upload_path as product_upload_path')
                ->leftjoin('products','products.id','=','wishlists.product_id')
                ->leftjoin('skus','skus.product_id','=','products.id') 
                ->leftjoin('categories','categories.id','=','products.cat_id')             
                ->where('skus.sku_code','LIKE',"%-1")
                ->where("wishlists.user_id",$user_ID)
                ->get();


                foreach ($wishlists as $key => $value) {
                $wishlists[$key]->images = DB::table('skus')->select('skus.price_'.session()->get('appcurrency').' as pprice')
                ->where('skus.product_id', $value->pid)
                ->where('skus.price_'.session()->get('appcurrency'), '>',0)
                ->limit(1)
                ->get();
                }   
                

            return view('frontend.myaccount.mywishlist',compact('wishlists'));
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }
    public function my_tickets()
    {
        if (Auth::check()) {
            $user_ID=auth()->user()->id;

            $pageTitle = "My Tickets";
            // $coupons_data=DB::table('used_coupons')->get();
            $tickets_data=DB::table('help_tickets')
            ->where("user_id",$user_ID)
            ->get();


            // echo '<pre>'; print_r($coupons_data); exit();
            return view('frontend.myaccount.yourtickets',compact('tickets_data','pageTitle'));
        }else{
            return redirect('/customer-signin')->with('error', "Please Login to Continue.");
        }
    }    
	
	public function address_auto_filling(Request $request)
    {
		
		
		$addressid=Crypt::decryptString($request->address)??0;	
		

			if (Auth::check() && $addressid>0) {
		// The user is logged in...
		
		        $user_ID=auth()->user()->id;

 
            // $coupons_data=DB::table('used_coupons')->get();
            $address_data=DB::table('addresses')
            ->where("user_id",$user_ID)
            ->where("id",$addressid)
            ->get()->first();

			if($address_data){
				$address_data=$address_data;
			}
			else{
				$address_data='';
			}
		
		return view('frontend.checkout',compact('address_data'));
		}
		else{
		return redirect()->route('registeration.form');
		}
	
    }
}
