<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Validator;
use Auth;
use Session;


class LoginController extends Controller
{
	
	
	  

	

	
	
    public function userDashboard()
    {
        $users = User::all();
        $success =  $users;

        return response()->json($success, 200);
    }

    public function adminDashboard()
    {
        $users = Admin::all();
        $success =  $users;

        return response()->json($success, 200);
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'user']);
            
            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);
            $success =  $user;
            $success['token'] =  $user->createToken('MyApp',['user'])->accessToken; 

            return response()->json($success, 200);
        }else{ 
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function adminLogin(Request $request)
    {
		
		 $user  = auth()->user();       
        if ($user && $user->is_admin==1) {           
            return redirect('admin/dashboard')->with('success', 'Successfully logged in.');

        }
        else if ($user && $user->is_admin==2) {         
            return redirect('finance/dashboard')->with('success', 'Successfully logged in.');
        }
        else if ($user && $user->is_admin==3) {         
            return redirect('content/dashboard')->with('success', 'Successfully logged in.');
        }
          else if ($user && $user->is_admin==4) {         
            return redirect('general/dashboard')->with('success', 'Successfully logged in.');
        }
        else{
           
           $pageTitle="CMS Login"; 
            return view('admin.login', compact('pageTitle'));
        }    
    }
	
	
	public function Loginsubmit(Request $request)
    {
	
	
	   	$credentials = $request->only('email', 'password');		
		
        if (Auth::attempt($credentials)) {  
        	$user  = auth()->user();
       switch(Auth::user()->role){
            case '1':
            return redirect('admin/dashboard')->with('success', 'Successfully logged in.');
                break;
            case '2':
                return redirect('finance/dashboard')->with('success', 'Successfully logged in.');
                break;
            case '3':
                 return redirect('content/dashboard')->with('success', 'Successfully logged in.');
                break;
            case '4':
                 return redirect('general/dashboard')->with('success', 'Successfully logged in.');
                break;
            default:
			Auth::logout();
			Session::flush();
			return redirect('admin/login')->with('error', 'You have not admin access.'); 
        }			


		
        }
        else{
	        return redirect('admin/login')->with('error', 'Failed to logged in.');
	    }
	}
	
	
	public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin')->with('error', 'You have been successfully logged out!'); 
    }
    public function logout_changepassword()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin')->with('success', 'Your password has been changed successfully!');  ;
    }

    public function change_password($value='')
    {
        $pageTitle="Change Password"; 
        return view('cms.pages.users.change_password', compact('pageTitle'));
        
    }
    
    
    public function student_reset_password($value=false)
    {
        $userid= Crypt::decryptString($value);
        $userdata=User::find($userid);
        $email=$userdata->email;
        $name=$userdata->name." ".$userdata->last_name;
        $pageTitle="Change Password to the $name [$email]"; 
        return view('cms.pages.users.student_change_password', compact('pageTitle','userid','name','email'));
        
    }
}