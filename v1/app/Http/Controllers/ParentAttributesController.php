<?php

namespace App\Http\Controllers;

use App\Models\ParentAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;

class ParentAttributesController extends Controller
{
    public function index()
    {   
        
            $parent_attributes_data=DB::table('parent_attributes')->get();
            $pageTitle="Parent Attributes";
            $addlink = url('admin/parent_attributes/create');          
            return view('admin.parent_attributes.parent_attributes_list', compact('pageTitle','parent_attributes_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_parent_attributes()
    {
         
            $pageTitle="Add New";
            return view('admin.parent_attributes.add_edit_parent_attributes',compact('pageTitle'));   
         
    }
    public function store_parent_attributes(Request $request)
    {
        
        $request->validate([
            'name'=>'required',         
            'slug'=>'required',         
            'position'=>'required',
            
        ]);

        
        DB::table('parent_attributes')->insert([
            [
                "name"=>$request->name,
                "slug"=>$request->slug,
                "position"=>$request->position??0,

            ]  
        ]); 
        return redirect('admin/parent_attributes')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_parent_attributes($id)    {
        
            $parent_attributes_data=DB::table('parent_attributes')->get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.parent_attributes.add_edit_parent_attributes',compact('parent_attributes_data','pageTitle'));
        
        
    }
    public function update_parent_attributes(Request $request)
    {
        $request->validate([
            'name'=>'required',         
            'slug'=>'required',         
            'position'=>'required',         
        ]);  
         
        DB::table('parent_attributes')
            ->where('id', $request->id)
            ->update(
            [
                
                "name"=>$request->name,
                "slug"=>$request->slug,
                "position"=>$request->position??0,
            ]
            );      
        return redirect('admin/parent_attributes')->with('success', "Success! Details are deleted successfully");
    }
    public function delete_parent_attributes($id)
    {
        
        $data=DB::table('parent_attributes')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
