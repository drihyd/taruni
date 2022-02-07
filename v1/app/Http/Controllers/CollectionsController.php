<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
Use Exception;
use Validator;

class CollectionsController extends Controller
{
    public function index()
    {   
        
            $collections_data=Collections::get();
            $pageTitle="Collections";
            $addlink = url('admin/collections/create');          
            return view('admin.collections.collections_list', compact('pageTitle','collections_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_collections()
    {
         
            $pageTitle="Add New";
            $departments_data=Department::orderBy('dept_name','DESC')->get();
            return view('admin.collections.add_edit_collections',compact('pageTitle','departments_data'));   
         
    }
    public function store_collections(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'title_slug'=>'required',
            'sorting'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            
        ]);
        if ($request->hasFile('image')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$header_filename); 
        }
        else{
            $header_filename="";
        }
        
        Collections::insert([
            [
                "title"=>$request->title,
                "title_slug"=>$request->title_slug,
                "categories_data"=>json_encode($request->categories_data??''),
                "sorting"=>$request->sorting??'',
                "image"=>$header_filename,
                "link"=>$request->link??'',
            ]  
        ]); 
        return redirect('admin/collections')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_collections($id)    {

            $ID = Crypt::decryptString($id);        
            $collections_data=Collections::get()->where("id",$ID)->first();
            $departments_data=Department::orderBy('dept_name','DESC')->get();
            $pageTitle="Edit";      
            return view('admin.collections.add_edit_collections',compact('collections_data','pageTitle','departments_data'));
        
        
    }
    public function update_collections(Request $request)
    {
		
		
		$Logic_Mapping=[];		
		if(isset($request->categories_data)){
		foreach($request->categories_data as $key=>$value)
		{		
			$Logic_Mapping[]=array("cate"=>$value,"prices"=>$request->price_data[$value]);	
			
		}
		}
		else{
			$Logic_Mapping="";
		}
		
	
        $request->validate([
            'title'=>'required',
            'title_slug'=>'required',
            'sorting'=>'required',
            'image' => 'image|mimes:jpg,jpeg,png',         
        ]); 

        if ($request->hasFile('image')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$header_filename);
        Collections::where('id', $request->id)
        ->update(["image"=>$header_filename]);
        }
        else{
            $header_filename="";
        } 
         
       Collections::where('id', $request->id)
            ->update(
            [
                
                "title"=>$request->title,
                "title_slug"=>$request->title_slug,
                "categories_data"=>json_encode($Logic_Mapping??''),
                "sorting"=>$request->sorting??'',
                "link"=>$request->link??'',
            ]
            );      
        return redirect('admin/collections')->with('success', "Success! Details are updated successfully");
    }
    public function delete_collections($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Collections::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
