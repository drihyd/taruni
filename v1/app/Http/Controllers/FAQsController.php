<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\HelpTickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use App\Mail\Feedback;
use Mail;

class FAQsController extends Controller
{
    public function index()
    {   
        
            $faqs_data=DB::table('f_a_qs')->get();
            $pageTitle="FAQs";
            $addlink = url('admin/faqs/create');          
            return view('admin.faqs.faqs_list', compact('pageTitle','faqs_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_faq()
    {
         
            $pageTitle="Add New";
            return view('admin.faqs.add_edit_faqs',compact('pageTitle'));   
         
    }
    public function store_faq(Request $request)
    {
        
        $request->validate([
            'page_title'=>'required',
            'slug'=>'required',
            'page_content'=>'required',
            
        ]);

        
        DB::table('f_a_qs')->insert([
            [
                "page_title"=>$request->page_title,
                "slug"=>$request->slug,
                "page_content"=>$request->page_content??'',
            ]  
        ]); 
        return redirect('admin/faqs')->with('success', "Success! Details are updated successfully"); 
    }
    public function edit_faq($id)    {
        
            $faqs_data=DB::table('f_a_qs')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.faqs.add_edit_faqs',compact('faqs_data','pageTitle'));
        
        
    }
    public function update_faq(Request $request)
    {
        $request->validate([
            'page_title'=>'required',
            'slug'=>'required',
            'page_content'=>'required',         
        ]);  
         
        DB::table('f_a_qs')
            ->where('id', $request->id)
            ->update(
            [
                
                "page_title"=>$request->page_title,
                "slug"=>$request->slug,
                "page_content"=>$request->page_content??'',
            ]
            );      
        return redirect('admin/faqs')->with('success', "Success! Details are updated successfully");
    }
    public function delete_faq($id)
    {
        
            $data=DB::table('f_a_qs')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Successfully delete a data.');
        
    }
    public function frontend_faq($slug)
    {
        $faqs_data=DB::table('f_a_qs')->get()->where("slug",$slug)->first();

        $pageTitle= $faqs_data->page_title;
        return view('frontend.faqs.frontend_view_faqs',compact('faqs_data','pageTitle'));   
         
    }
    public function store_form(Request $request)
    {

            $user_ID=auth()->user()->id;
        
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'issue'=>'required',
            'message'=>'required',
            
        ]);

        
        DB::table('help_tickets')->insert([
            [
                "fullname"=>$request->fullname,
                "email"=>$request->email,
                "mobile"=>$request->mobile??'',
                "issue"=>$request->issue??'',
                "message"=>$request->message??'',
                "user_id"=>$user_ID??'',

            ]  
        ]); 
		
		
		
		if($request->email){			
			$mail_params = [
			'fullname' =>$request->fullname??'',
			'email' =>$request->email??'',
			'mobile' =>$request->mobile??'',
			"issue"=>$request->issue??'',
			'message' =>$request->message??'',			
			];
		Mail::to('nchary@taruni.in')->send(new Feedback($mail_params));
		}
		
		
         return redirect()->back()->with('success', "Your ticket has been raised. Our Representative will get in touch you shortly"); 
    }
    public function support_leads()
    {   
        
            $support_data=DB::table('help_tickets')->get();
            $pageTitle="Support Leads";          
            return view('admin.faqs.help_tickets', compact('pageTitle','support_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function support_leads_reply($id)    {
        
            $support_data=DB::table('help_tickets')->get()->where("id",$id)->first();
            $pageTitle="Reply to";      
            return view('admin.faqs.edit_help_ticket',compact('support_data','pageTitle')); 
        
    }
    public function update_support_lead(Request $request)
    {
        $request->validate([
            'status'=>'required',
            'status_remarks'=>'required',      
        ]);  
         
        DB::table('help_tickets')
            ->where('id', $request->id)
            ->update(
            [
                
                "status"=>$request->status??'',
                "status_remarks"=>$request->status_remarks??'',
            ]
            );      
        return redirect('admin/support_leads')->with('success', "Success! Details are updated successfully");
    }
}

