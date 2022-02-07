<?php

namespace App\Http\Controllers;

// use App\Page;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;


class PageController extends Controller
{
    
    public function index()
    {
        $pages_data = Page::orderBy('id','desc')->paginate(10)->setPath('Page');
        $pageTitle = "Pages";
        $addlink = route('pages.create'); 
        
        return view('admin.pages.pages_list',compact('pages_data','pageTitle','addlink'));
    }
    public function create()
    {
        $pageTitle="Add Page";
        return view('admin.pages.add_edit_pages',compact(['pageTitle']));
    }

    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required',
         'slug' => 'required',
         'description' => 'required'
        ]);

        Page::create($request->all());
        return redirect()->route('pages.index')->with('success','Success! Details are added successfully');
    }
    public function show(Page $page)
    {

        return view('admin.pages.show',compact('page'));
    }
    public function edit(Page $page)
    {
        return view('admin.pages.add_edit_pages',compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
         'name' => 'required',
         'slug' => 'required',
         'description' => 'required'
        ]);

    
        $page->update($request->all());
    
        return redirect()->route('pages.index')
                        ->with('success','Success! Details are updated successfully');
    }
     public function destroy(Page $page)
    {
        $page->delete();
    
        return redirect()->route('pages.index')->with('success','Success! Details are deleted successfully');
    }
    public function frontend($slug){

        
            $page_data=DB::table('pages')->get()->where("slug",$slug)->first();  
            $pageTitle="Page | ".isset($page_data->name);   
            $slug=$slug;
            return view('frontend.static_pages', compact('page_data', 'pageTitle','slug'));
        
        

        
    }
}
