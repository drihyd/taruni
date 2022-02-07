<?php

namespace App\Http\Controllers;

use App\Models\GTMTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;


class GTMTrackingController extends Controller
{
    public function index()
    {   
        try {

            $theme_options_data=DB::table('gtm_trakings')->get()->first();
            $pageTitle="Conversion Tracking";          
            return view('admin.gtmtracking.tracking_options_list', compact('pageTitle','theme_options_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        } catch (Exception $e) {
            $this->send_admin_notification($e);
        }
        
    }
    public function create_tracking_options()
    {
        try { 
            $pageTitle="Add New";
            return view('admin.gtmtracking.add_traking_options',compact('pageTitle'));   
        } catch (Exception $e) {
            $this->send_admin_notification($e);
        }  
    }
    public function store_tracking_options(Request $request)
    {
        
        $request->validate([
            
              
            
        ]);

        
        DB::table('gtm_trakings')->insert([
            [
                
                "google_analytics_script"=>$request->google_analytics_script??'',
                "google_analytics_script_body"=>$request->google_analytics_script_body??'',
                "facebook_pixels_script"=>$request->facebook_pixels_script??'',
                "facebook_pixels_script_body"=>$request->facebook_pixels_script_body??'',
                "google_adwords_script"=>$request->google_adwords_script??'',
                "google_remarketing_script"=>$request->google_remarketing_script??'',
                "live_chat_script"=>$request->live_chat_script??'',
            ]  
        ]); 
        return redirect('admin/gtm_tracking')->with('success', "Successfully added a details."); 
    }
    public function edit_tracking_options($id)    {
        try {
            $theme_options_data=DB::table('gtm_trakings')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.gtmtracking.add_traking_options',compact('theme_options_data','pageTitle'));
        } catch (Exception $e) {
            $this->send_admin_notification($e);
        }
        
    }
    public function update_tracking_options(Request $request)
    {
        $request->validate([
                      
        ]);  
        
        DB::table('gtm_trakings')
            ->where('id', $request->id)
            ->update(
            [
                
                "google_analytics_script"=>$request->google_analytics_script??'',
                "google_analytics_script_body"=>$request->google_analytics_script_body??'',
                "facebook_pixels_script"=>$request->facebook_pixels_script??'',
                "facebook_pixels_script_body"=>$request->facebook_pixels_script_body??'',
                "google_adwords_script"=>$request->google_adwords_script??'',
                "google_remarketing_script"=>$request->google_remarketing_script??'',
                "live_chat_script"=>$request->live_chat_script??'',
            ]
            );      
        return redirect('admin/gtm_tracking')->with('success', "Successfully update a details.");
    }
    public function delete_tracking_options($id)
    {
        try {
            $data=DB::table('gtm_trakings')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Successfully delete a data.');
            
        } catch (Exception $e) {
            $this->send_admin_notification($e);
        }
    }
}
