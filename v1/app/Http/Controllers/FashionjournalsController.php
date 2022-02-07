<?php

namespace App\Http\Controllers;

use App\Models\Fashionjournals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use Illuminate\Support\Facades\Crypt;

class FashionjournalsController extends Controller
{
    public function index()
    {   
        
            $fashionjournals_data=Fashionjournals::get();
            $pageTitle="Fashion Journals";
            $addlink = url('admin/fashionjournals/create');          
            return view('admin.fashionjournals.fashionjournals_list', compact('pageTitle','fashionjournals_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_fashionjournals()
    {
         
            $pageTitle="Add New";
            return view('admin.fashionjournals.add_edit_fashion',compact('pageTitle'));   
         
    }
    public function store_fashionjournals(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            
        ]);
        if ($request->hasFile('image')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$header_filename); 
        }
        else{
            $header_filename="";
        }
        
        Fashionjournals::insert([
            [
                "title"=>$request->title,
                "date"=>$request->date??'',
                "description"=>$request->description??'',
                "image"=>$header_filename,
                "link"=>$request->link??'',
            ]  
        ]); 
        return redirect('admin/fashionjournals')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_fashionjournals($id)    {
        
            $fashionjournals_data=Fashionjournals::get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.fashionjournals.add_edit_fashion',compact('fashionjournals_data','pageTitle'));
        
        
    }
    public function update_fashionjournals(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'description'=>'required',
            'image' => 'image|mimes:jpg,jpeg,png',         
        ]); 

        if ($request->hasFile('image')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$header_filename);
        Fashionjournals::where('id', $request->id)
        ->update(["image"=>$header_filename]);
        }
        else{
            $header_filename="";
        } 
         
       Fashionjournals::where('id', $request->id)
            ->update(
            [
                
                "title"=>$request->title,
                "date"=>$request->date??'',
                "description"=>$request->description??'',
                "link"=>$request->link??'',
            ]
            );      
        return redirect('admin/fashionjournals')->with('success', "Success! Details are updated successfully");
    }
    public function delete_fashionjournals($id)
    {
        
            $data=Fashionjournals::where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
