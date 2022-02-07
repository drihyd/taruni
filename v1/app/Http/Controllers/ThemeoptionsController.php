<?php

namespace App\Http\Controllers;

use App\Models\Themeoptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class ThemeoptionsController extends Controller
{
    public function index()
    {   
        
            $theme_options_data=DB::table('themeoptions')->get()->first();
            $pageTitle="Theme Options";          
            return view('admin.themeoptions.theme_options_list', compact('pageTitle','theme_options_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_theme_options()
    {
         
            $pageTitle="Add New";
            return view('admin.themeoptions.add_theme_options',compact('pageTitle'));   
         
    }
    public function store_theme_options(Request $request)
    {
        
        $request->validate([
            'header_logo' => 'required|mimes:png,jpg,jpeg,svg,html', 
            'favicon' => 'sometimes|nullable',
            'facebook_url'=>'required|url|sometimes|nullable',
            'instagram_url'=>'required|url|sometimes|nullable',
            'twitter_url'=>'required|url|sometimes|nullable',
            'pinterest_url'=>'required|url|sometimes|nullable',
            'youtube_url'=>'required|url|sometimes|nullable',
            
        ]);

        if ($request->hasFile('header_logo')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->header_logo->extension();
        $request->header_logo->move(('assets/uploads'),$header_filename); 
        }
        else{
            $header_filename="";
        }
        
        if ($request->hasFile('favicon')) {      
        $favicon_filename=uniqid().'_'.time().'.'.$request->favicon->extension();
        $request->favicon->move(('assets/uploads'),$favicon_filename);
        }
        else{
            $favicon_filename="";
        } 
        DB::table('themeoptions')->insert([
            [
                "header_logo"=>$header_filename,
                "favicon"=>$favicon_filename,
                "facebook_url"=>$request->facebook_url??'',
                "instagram_url"=>$request->instagram_url??'',
                "twitter_url"=>$request->twitter_url??'',
                "pinterest_url"=>$request->pinterest_url??'',
                "youtube_url"=>$request->youtube_url??'',
                "copyright"=>$request->copyright??'',
                "gst_no_invoice"=>$request->gst_no_invoice??'',
                "mobile_no_invoice"=>$request->mobile_no_invoice??'',
                "company_invoice"=>$request->company_invoice??'',
                "drno_invoice"=>$request->drno_invoice??'',
                "street_invoice"=>$request->street_invoice??'',
                "landmark_invoice"=>$request->landmark_invoice??'',
                "city_invoice"=>$request->city_invoice??'',
                "state_invoice"=>$request->state_invoice??'',
                "pincode_invoice"=>$request->pincode_invoice??'',
            ]  
        ]); 
        return redirect('admin/theme_options')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_theme_options($id)    {
        
            $theme_options_data=DB::table('themeoptions')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.themeoptions.add_theme_options',compact('theme_options_data','pageTitle'));
        
        
    }
    public function update_theme_options(Request $request)
    {
        $request->validate([
            'header_logo' => 'mimes:png,jpg,jpeg,svg,html', 
            'favicon' => 'sometimes|nullable',
            'facebook_url'=>'required|url|sometimes|nullable',
            'instagram_url'=>'required|url|sometimes|nullable',
            'twitter_url'=>'required|url|sometimes|nullable',
            'pinterest_url'=>'required|url|sometimes|nullable',
            'youtube_url'=>'required|url|sometimes|nullable',         
        ]);  
        if ($request->hasFile('header_logo')) {      
        $header_logo=uniqid().'_'.time().'.'.$request->header_logo->extension();
        $request->header_logo->move(('assets/uploads'),$header_logo);
        DB::table('themeoptions')
        ->where('id', $request->id)
        ->update(["header_logo"=>$header_logo]);
        }
        else{
            $header_logo="";
        }
        if ($request->hasFile('favicon')) {      
        $favicon=uniqid().'_'.time().'.'.$request->favicon->extension();
        $request->favicon->move(('assets/uploads'),$favicon);
        DB::table('themeoptions')
        ->where('id', $request->id)
        ->update(["favicon"=>$favicon]);
        }
        else{
            $favicon="";
        } 
        DB::table('themeoptions')
            ->where('id', $request->id)
            ->update(
            [
                
                "facebook_url"=>$request->facebook_url??'',
                "instagram_url"=>$request->instagram_url??'',
                "twitter_url"=>$request->twitter_url??'',
                "pinterest_url"=>$request->pinterest_url??'',
                "youtube_url"=>$request->youtube_url??'',
                "copyright"=>$request->copyright??'',
                "gst_no_invoice"=>$request->gst_no_invoice??'',
                "mobile_no_invoice"=>$request->mobile_no_invoice??'',
                "company_invoice"=>$request->company_invoice??'',
                "drno_invoice"=>$request->drno_invoice??'',
                "street_invoice"=>$request->street_invoice??'',
                "landmark_invoice"=>$request->landmark_invoice??'',
                "city_invoice"=>$request->city_invoice??'',
                "state_invoice"=>$request->state_invoice??'',
                "pincode_invoice"=>$request->pincode_invoice??'',
            ]
            );      
        return redirect('admin/theme_options')->with('success', "Success! Details are updated successfully");
    }
    public function delete_theme_options($id)
    {
        
            $data=DB::table('themeoptions')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
