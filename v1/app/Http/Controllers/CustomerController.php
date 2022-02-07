<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Products;
use App\Models\UserVerify;
use App\Models\Used_coupons;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use DB;
use Carbon;
use App\Mail\ResetPassword;
use App\Mail\Registration;
use App\Mail\EmailVerification;
use Mail;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function customRegistration(Request $request)
    {
	$userdetails = Customer::select('id')->where('email',$request->email)->get();
	if($userdetails->count()==0){	
	
	$firstname=$request->firstname??'';
	$lastname=$request->lastname??'';
	$data = 
		[
		'firstname' =>$firstname,
		'lastname' =>$lastname,
		'phone' =>$request->mobile??"",
		'city' =>$request->city??"",
		'pincode' =>$request->pincode??"000000",
		'country' =>$request->country??"",
		'state' =>$request->state??"",
		'address' =>$request->address??"",
		'email' =>$request->email??"",
		'password' =>Hash::make($request->password),
		'gender' =>$request->gender??'',
		'role' =>0,
		'is_email_verified' =>0
		];				
		Customer::updateOrCreate($data);
		
	
			if (Auth::attempt(['role' =>'0','email' => $request->email, 'password' => $request->password])) 
			{			

		
				if (Auth::check()) {

					
			$token = Str::random(64);
			
			
			UserVerify::create([
              'user_id' => Auth::user()->id, 
              'token' => $token
            ]);
			
	
        $mail_params = [
            'name' =>$firstname." ".$lastname,
			'token' =>$token            
        ];
		
		
		$mailparams = ['name' =>$firstname." ".$lastname];
		
		Mail::to($request->email)->send(new EmailVerification($mail_params));
		
		Mail::to($request->email)->send(new Registration($mailparams));			

				if(session()->get('cart')){
					Cart::updateOrCreate(
						['id' =>session()->get('cart')],			
						[
						 'user_id' => Auth::user()->id,
						 'session_id' => Auth::user()->id,
						]
					);
					
					/* Update userid into used coupons table */

				$Used_coupon = Used_coupons::select('cart_id')->where('cart_id',session()->get('cart'))->get();				
				if($Used_coupon->count()>0) {
				Used_coupons::updateOrCreate(
					['cart_id' =>session()->get('cart')],			
					[
					 'user_id' => Auth::user()->id,					
					]
				);
				
				}

							
					
				}
				
				
				 \App::call('App\Http\Controllers\CartController@merge_cart_items');
				   
	
				   
				   
			return redirect('/cart')->with('message', "The account is created successfully, Please Check mail to activate your account for the next login.");
		
			}
			
			}
			else{
			
				 return redirect()->back()->with('error', 'Account is not created.');  
			}
			
		}
		else{
			
			  return redirect()->back()->with('error', 'User already exist an account.');  
		}
			
		
	
           
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
	
	
    public function customLogin(Request $request)
    {
		

	
		if (Auth::attempt(['role' =>'0','email' => $request->email, 'password' => $request->password,'is_email_verified'=>'1'])) {				
			
			
			
			if (Auth::check()) {	
			if(session()->get('cart')){				
				Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				'user_id' => Auth::user()->id,
				'session_id' => Auth::user()->id,
				]
				);	
				
				
			/* Update userid into used coupons table */
			
			$Used_coupon = Used_coupons::select('cart_id')->where('cart_id',session()->get('cart'))->get();
				
				if($Used_coupon->count()>0) {
				Used_coupons::updateOrCreate(
					['cart_id' =>session()->get('cart')],			
					[
					 'user_id' => Auth::user()->id,					
					]
				);
				
				}
			  
			  
			}	
					
			\App::call('App\Http\Controllers\CartController@merge_cart_items');	
			return redirect('/cart')->with('message', "Successfully logged in.");
			}
			else{
			// if failed login
			return redirect()->back()->with('error', 'Failed to login/Account is not activated.');
			}
		}
		else{
			return redirect()->back()->with('error', 'Something went wrong/Account is not activated.');
		}
	
	}
	
	
public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('message', 'You have been successfully logged out!'); 
	}
	public function signin()
    {
        return view('frontend.signup');
	}
	
	public function customers_view(Request $request)
	{
		$pageTitle = "Customers";
		


        if ($request->ajax()) {

				$customers=DB::table('users')->where('role','0');

				if(!empty($request->user_email_phone)){
                $customers->where('phone','LIKE','%'.$request->user_email_phone.'%');
                $customers->orwhere('email','LIKE','%'.$request->user_email_phone.'%');
                $customers->orwhere('firstname','LIKE','%'.$request->user_email_phone.'%');
                $customers->orwhere('lastname','LIKE','%'.$request->user_email_phone.'%');
            }


				$customers->orderBy('created_at', 'desc')->get();


            return Datatables::of($customers)
                    ->addIndexColumn()
                    ->addColumn('fullname', function($row){
     						

                          
                            $name = '<b>'.ucwords($row->firstname).' '.ucwords($row->lastname).'</b><br>'.$row->email.'<br>'.$row->phone.'<br><b>Gender: </b>'.ucwords($row->gender);
                            
                             return $name;
                    })
                    ->addColumn('reg_date', function($row){
     						
     						
                          
                            $reg_date = date('F j, Y', strtotime($row->created_at??''));
                            
                             return $reg_date;
                    })
                    ->addColumn('email_verified_date', function($row){
     						
     						
                          
                            $reg_date = date('F j, Y', strtotime($row->email_verified_at??''));
                            
                             return $reg_date;
                    })
                    ->addColumn('profile', function($row){

                    	if($row->profile){
                            $profile = '<img src="{{URL::to("assets/uploads/"'.$row->profile.'" class="img-fluid" alt="profile" width="50%">';
                        }else{
                        	$profile = 'No Profile';
                        } 
                             return $profile;
                        
                    })
                    ->addColumn('last_ordered_date', function($row){
     						
     						$orders_data = DB::table('orders')->select('orders.*')->where('user_id',$row->id)->latest()->first();

     						if($orders_data){
     							$last_ordered_date = date('F j, Y', strtotime($orders_data->created_at??''));
     						}
     						else{
     							$last_ordered_date = 'No Orders';
     						}
     							
     						 
                            
                             return $last_ordered_date;
                    })
                    ->addColumn('active', function($row){
     
                          if ($row->is_email_verified == 1) {
                              $reverse_sts=0;
                            $is_verified = '<i class="fa fa-lock-open" style="color:green;" title="Already Verified"></i>';                            
                    }else{
                        $reverse_sts=1;
                        $is_verified = '<i class="fa fa-lock" style="color:red;" title="Not Verified"></i>';
                    }
                            $status = '<a href="javascript:void(0);" data-id="'.$row->id.'" data-sid="'.$reverse_sts.'" class="s_update mr-2" data-toggle="tooltip" data-placement="top">'.$is_verified.'</a>';
                            
                             return $status;
                    })
                    
                    // ->addColumn('action', function($row){
     
                    //        $btn = '<a href=""><i class="fas fa-eye"></i></a>';
                    //         return $btn;
                    // })
                    
                    ->rawColumns(['fullname','active','reg_date','last_ordered_date','profile','email_verified_date'])
                    ->make(true);
        }
        
        return view('admin.customers.customers_view', compact('pageTitle'));
	}
	public function showForgetPasswordForm()
      {
         return view('frontend.auth.forgetPassword');
      }
	public function submitForgetPasswordForm(Request $request)
      {
          $customers=DB::table('users')->where('role','0')->where('email',$request->email)->get()->first();
          
          if(isset($customers->email) == $request->email){
          
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
          
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
            ]);
            
            
            
      $email = $request->email;
        $offer = [
            'token' => $token
        ];
        
        
        
            
            Mail::to($email)->send(new ResetPassword($offer));
          return back()->with('success', 'We have e-mailed your password reset link!');
          // return redirect('admin/locations')->with('success', "We have e-mailed your password reset link!"); 
        //   return view('frontend.auth.email_forgetPassword', compact('token'))->with('success', "We have e-mailed your password reset link!");
          }
          else{
             return back()->with('error', 'Something Went Wrong!'); 
          }
      }
      public function showResetPasswordForm($token) { 
          
          $reset_data=DB::table('password_resets')->where('token',$token)->get()->first();
          
          

         return view('frontend.auth.forgetPasswordLink', ['token' => $token,'email'=>$reset_data->email??'']);
      }
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = Customer::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        //   return redirect('/customer-signin')->with('message', 'Your password has been changed!');
        return $this->customLogin($request)->with('message', 'Your password has been changed!');
      }
	  
	  
	  
	 public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->latest()->first();  
        $message = 'Sorry your email cannot be identified.';  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
				$mail_params = ['name' =>$user->firstname." ".$user->lastname];
					
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('customer.myaccount')->with('message', $message);
    }
	  
	public function resend_activation_link(){
		
		 return view('frontend.auth.reset-password');
	}
	
	public function resend_activation_post(Request $request){
		
		$customers=User::select('id','email','is_email_verified')->where('role','0')->where('email',$request->email)->get()->first();
	    
	
		
		if($customers){



if($customers->is_email_verified==0){
			$token = Str::random(64);			
			UserVerify::create([
			'user_id' => $customers->id, 
			'token' => $token
			]);		

			$mail_params = [
			'name' =>$customers->firstname." ".$customers->lastname,
			'token' =>$token            
			];		
			$mailparams = ['name' =>$customers->firstname." ".$customers->lastname];		
			Mail::to($customers->email)->send(new EmailVerification($mail_params));            
			return back()->with('success', 'We have e-mailed your activation link.');
}
else{
	return back()->with('error', 'Account is already activated');
}
         
          }
          else{
             return back()->with('error', 'Entered email does not match our records.'); 
          }
	}
	 public function changeStatus(Request $request)
    {
        if($request->ajax()){
       $query = DB::table('users')->where('id', $request->id)
            ->update(
            [
                "is_email_verified"=> $request->reversests,
                "email_verified_at"=> now(),
            ]
            );
        }     
  
        // return response()->json(['statusCode'=>200,'success'=>'Status change successfully.']);
        return Response()->json($query);
    } 
	  
}
