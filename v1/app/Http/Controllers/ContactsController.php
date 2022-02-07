<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use App\Mail\ContactUs;
use Mail;

class ContactsController extends Controller
{
    public function index()
    {   
        
            $contacts_data=DB::table('contacts')->get();
            $pageTitle="Contacts";         
            return view('admin.contacts.contacts_list', compact('pageTitle','contacts_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function frontend_contact_page()
    {
        // echo '<pre>'; print_r("variable"); exit();
		
		$contacts_data='Contact Us';
        return view('frontend.contactus',compact('contacts_data'));
    }

    public function store_contact(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'message'=>'required',
            
        ]);

        
        DB::table('contacts')->insert([
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "mobile"=>$request->mobile??'',
                "message"=>$request->message??'',
            ]  
        ]); 
		
		
		if($request->email){
			
			$mail_params = [
			'name' =>$request->name??'',
			'email' =>$request->email??'',
			'mobile' =>$request->mobile??'',
			'message' =>$request->message??'',
			];
		Mail::to('nchary@taruni.in')->send(new ContactUs($mail_params));
		}
		
		
        return redirect()->back()->with('success', "Success! Details are added successfully"); 
    }

}
