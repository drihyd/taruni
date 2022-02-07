<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class CouponsController extends Controller
{
    public function index()
    {   
        
            $coupons_data=DB::table('coupons')->get();
            $pageTitle="Coupons";
            $addlink = url('admin/coupons/create');          
            return view('admin.coupons.coupons_list', compact('pageTitle','coupons_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_coupons()
    {
         
            $pageTitle="Add New";
            return view('admin.coupons.add_edit_coupons',compact('pageTitle'));   
         
    }
    public function store_coupons(Request $request)
    {
        
        $request->validate([
            'Coupon_title'=>'required',
            'CouponCode'=>'required',
            'CouponExpiryDate'=>'required',
            'Description'=>'required',
            'DiscountType'=>'sometimes|nullable',
            'Discount_value'=>'sometimes|nullable',
            'Is_Active'=>'required|sometimes|nullable',
            'Is_public'=>'required|sometimes|nullable',
            
        ]);

        
        DB::table('coupons')->insert([
            [
                "Coupon_title"=>$request->Coupon_title,
                "CouponCode"=>$request->CouponCode,
                "CouponExpiryDate"=>$request->CouponExpiryDate??'',
                "Description"=>$request->Description??'',
                "DiscountType"=>$request->DiscountType??'',
                "Discount_value"=>$request->Discount_value??'',
                "Is_Active"=>$request->Is_Active??'',
                "Is_public"=>$request->Is_public??'',
            ]  
        ]); 
        return redirect('admin/coupons')->with('success', "Success! Details are added successfully."); 
    }
    public function edit_coupons($id)    {
        
            $coupons_data=DB::table('coupons')->get()->where("CouponID",$id)->first();
            $pageTitle="Edit";      
            return view('admin.coupons.add_edit_coupons',compact('coupons_data','pageTitle'));
        
        
    }
    public function update_coupons(Request $request)
    {
        $request->validate([
            'Coupon_title'=>'required',
            'CouponCode'=>'required',
            'CouponExpiryDate'=>'required',
            'Description'=>'required',
            'DiscountType'=>'sometimes|nullable',
            'Discount_value'=>'sometimes|nullable',
            'Is_Active'=>'required|sometimes|nullable',
            'Is_public'=>'required|sometimes|nullable',         
        ]);  
         
        DB::table('coupons')
            ->where('CouponID', $request->id)
            ->update(
            [
                
                "Coupon_title"=>$request->Coupon_title,
                "CouponCode"=>$request->CouponCode,
                "CouponExpiryDate"=>$request->CouponExpiryDate??'',
                "Description"=>$request->Description??'',
                "DiscountType"=>$request->DiscountType??'',
                "Is_Active"=>$request->Is_Active??'',
                "Is_public"=>$request->Is_public??'',
				"Discount_value"=>$request->Discount_value??'',
            ]
            );      
        return redirect('admin/coupons')->with('success', "Success! Details are updated successfully");
    }
    public function delete_coupons($id)
    {
        
            $data=DB::table('coupons')->where('CouponID',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }

    public function underconstruction()
    {
         
            $pageTitle="";
            return view('admin.underconstruction',compact('pageTitle'));   
         
    }
}
