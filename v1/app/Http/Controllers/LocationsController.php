<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class LocationsController extends Controller
{
    public function index()
    {   
        
            $locations_data=DB::table('locations')->get();
            $pageTitle="Our Stores";
            $addlink = url('admin/location/create');          
            return view('admin.locations.locations_list', compact('pageTitle','locations_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_location()
    {
         
            $pageTitle="Add New";
            return view('admin.locations.add_edit_locations',compact('pageTitle'));   
         
    }
    public function store_location(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'plot_no'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'sometimes|nullable',
            'pincode'=>'sometimes|nullable',
            'primary_phone'=>'sometimes|nullable',
            'secondary_phone'=>'sometimes|nullable',
            'map_iframe'=>'required|sometimes|nullable',
            
        ]);

        
        DB::table('locations')->insert([
            [
                "name"=>$request->name,
                "plot_no"=>$request->plot_no,
                "street"=>$request->street??'',
                "street"=>$request->street??'',
                "city"=>$request->city??'',
                "country"=>$request->country??'',
                "pincode"=>$request->pincode??'',
                "primary_phone"=>$request->primary_phone??'',
                "secondary_phone"=>$request->secondary_phone??'',
                "map_iframe"=>$request->map_iframe??'',
            ]  
        ]); 
        return redirect('admin/locations')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_location($id)    {
        
            $locations_data=DB::table('locations')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.locations.add_edit_locations',compact('locations_data','pageTitle'));
        
        
    }
    public function update_location(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'plot_no'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'sometimes|nullable',
            'pincode'=>'sometimes|nullable',
            'primary_phone'=>'sometimes|nullable',
            'secondary_phone'=>'sometimes|nullable',
            'map_iframe'=>'required|sometimes|nullable',         
        ]);  
         
        DB::table('locations')
            ->where('id', $request->id)
            ->update(
            [
                
                "name"=>$request->name,
                "plot_no"=>$request->plot_no,
                "street"=>$request->street??'',
                "city"=>$request->city??'',
                "state"=>$request->state??'',
                "country"=>$request->country??'',
                "pincode"=>$request->pincode??'',
                "primary_phone"=>$request->primary_phone??'',
                "secondary_phone"=>$request->secondary_phone??'',
                "map_iframe"=>$request->map_iframe??'',
            ]
            );      
        return redirect('admin/locations')->with('success', "Success! Details are updated successfully");
    }
    public function delete_location($id)
    {
        
            $data=DB::table('locations')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    public function frontend_view()
    {   
        
            $locations_data=DB::table('locations')->get();
            // echo '<pre>'; print_r($locations_data); exit();
            $pageTitle="Our Stores";       
            return view('frontend.locations', compact('pageTitle','locations_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);   
        
    }
}
