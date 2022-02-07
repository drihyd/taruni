<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class AttributesController extends Controller
{
    public function index()
    {   
        
            $attributes_data=DB::table('attributes')->get();
            $pageTitle="Attributes";
            $addlink = url('admin/attributes/create');          
            return view('admin.attributes.attributes_list', compact('pageTitle','attributes_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_attributes()
    {
         
            $pageTitle="Add New";
            return view('admin.attributes.add_edit_attributes',compact('pageTitle'));   
         
    }
    public function store_attributes(Request $request)
    {
        
        $request->validate([
            'attr_name'=>'required',
            
        ]);

        
        DB::table('attributes')->insert([
            [
                "attr_name"=>$request->attr_name,
                "slug"=>$request->slug,

            ]  
        ]); 
        return redirect('admin/attributes')->with('success', "Success! Details are added successfully."); 
    }
    public function edit_attributes($id)    {
        
            $attributes_data=DB::table('attributes')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.attributes.add_edit_attributes',compact('attributes_data','pageTitle'));
        
        
    }
    public function update_attributes(Request $request)
    {
        $request->validate([
            'attr_name'=>'required',         
        ]);  
         
        DB::table('attributes')
            ->where('id', $request->id)
            ->update(
            [
                
                "attr_name"=>$request->attr_name,
                "slug"=>$request->slug,
            ]
            );      
        return redirect('admin/attributes')->with('success', "Success! Details are updated successfully");
    }
    public function delete_attributes($id)
    {
        
            $data=DB::table('attributes')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
