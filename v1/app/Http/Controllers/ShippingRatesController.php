<?php

namespace App\Http\Controllers;

use App\Models\Shipping_Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class ShippingRatesController extends Controller
{
    public function index()
    {   
        
            $shipping_rates_data=DB::table('shipping_rates')->get();
            $pageTitle="Shipping Rates";
            $addlink = url('admin/shipping_rates/create');          
            return view('admin.shipping_rates.shipping_rates_list', compact('pageTitle','shipping_rates_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_shipping_rates()
    {
         
            $pageTitle="Add New";
            return view('admin.shipping_rates.add_edit_shipping_rates',compact('pageTitle'));   
         
    }
    public function store_shipping_rates(Request $request)
    {
        
        $request->validate([
            'level'=>'required',
            'country'=>'required',
            'starting_price'=>'required',
            'ending_price'=>'required',
            'charges_inr'=>'sometimes|nullable',
            'charges_usd'=>'sometimes|nullable',
            
        ]);

        
        DB::table('shipping_rates')->insert([
            [
                "level"=>$request->level,
                "country"=>$request->country,
                "starting_price"=>$request->starting_price??'',
                "ending_price"=>$request->ending_price??'',
                "charges_inr"=>$request->charges_inr??'',
                "charges_usd"=>$request->charges_usd??'',
            ]  
        ]); 
        return redirect('admin/shipping_rates')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_shipping_rates($id)    {
        
            $shipping_rates_data=DB::table('shipping_rates')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.shipping_rates.add_edit_shipping_rates',compact('shipping_rates_data','pageTitle'));
        
        
    }
    public function update_shipping_rates(Request $request)
    {
        $request->validate([
            'level'=>'required',
            'country'=>'required',
            'starting_price'=>'required',
            'ending_price'=>'required',
            'charges_inr'=>'sometimes|nullable',
            'charges_usd'=>'sometimes|nullable',         
        ]);  
         
        DB::table('shipping_rates')
            ->where('id', $request->id)
            ->update(
            [
                
                "level"=>$request->level,
                "country"=>$request->country,
                "starting_price"=>$request->starting_price??'',
                "ending_price"=>$request->ending_price??'',
                "charges_inr"=>$request->charges_inr??'',
                "charges_usd"=>$request->charges_usd??'',
            ]
            );      
        return redirect('admin/shipping_rates')->with('success', "Success! Details are updated successfully");
    }
    public function delete_shipping_rates($id)
    {
        
            $data=DB::table('shipping_rates')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
