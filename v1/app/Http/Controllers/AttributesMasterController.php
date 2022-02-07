<?php

namespace App\Http\Controllers;

use App\Models\AttributesMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
Use Exception;
use Validator;

class AttributesMasterController extends Controller
{
	
     public function listing(Request $request)
    {   
        
            
            
            $pageTitle="Attributes Masters";
            $addlink = url('admin/attributes_masters/create'); 
            if ($request->ajax()) {


        
           $attributes_masters_data=AttributesMaster::select('attributes_masters.*')->get();
            return Datatables::of($attributes_masters_data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     

                        $btn = '<a href="'.url("admin/attributes_masters/edit/".Crypt::encryptString($row->id)).'"><i class="fas fa-pen"></i></a>  <a href="javascript:void(0);" data-id='.$row->id.' class="nddelete delete" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>';
                            return $btn;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);       
            }
                    
            return view('admin.attributes_masters.attributes_masters_list', compact('pageTitle','addlink'));
            
        
        
    }
    public function create_attributes_masters()
    {
         
            $pageTitle="Add New";
            return view('admin.attributes_masters.add_edit_attributes_masters',compact('pageTitle'));   
         
    }
    public function store_attributes_masters(Request $request)
    {
        $isexits_attr_name = AttributesMaster::where('attribute_category',$request->attribute_category)->where('slug',$request->slug)->get()->count();

// dd( $isexits_attr_name);

        if ($isexits_attr_name) {
            return redirect()->back()->with('error','This Name already exits..!');

        }

        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'attribute_category'=>'required',
            
        ]);

        
        AttributesMaster::insert([
            [
                "name"=>$request->name,
                "attribute_category"=>$request->attribute_category,
                "slug"=>$request->slug,
            ]  
        ]); 
        return redirect('admin/attributes_masters')->with('success', "Success! Details are added successfully."); 
    }
    public function edit_attributes_masters($id)    {

        $ID = Crypt::decryptString($id);
        
            $attributes_masters_data=AttributesMaster::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.attributes_masters.add_edit_attributes_masters',compact('attributes_masters_data','pageTitle'));
        
        
    }
    public function update_attributes_masters(Request $request)
    {
        $request->validate([
            'name'=>'required',         
            'attribute_category'=>'required',         
            'slug'=>'required',         
        ]);  
         
        AttributesMaster::where('id', $request->id)
            ->update(
            [
                
                "name"=>$request->name,
                "attribute_category"=>$request->attribute_category,
                "slug"=>$request->slug,
            ]
            );      
        return redirect('admin/attributes_masters')->with('success', "Success! Details are updated successfully");
    }
    public function delete_attributes_masters(Request $request)
    {
        
        
            $data=AttributesMaster::where('id',$request->id)->delete();   
         return Response()->json(['success'=>"Success! Images are deleted successfully."]);
        
    }
}
