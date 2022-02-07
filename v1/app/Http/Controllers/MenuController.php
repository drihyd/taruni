<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;

class MenuController extends Controller
{
    public function index()
    {







$parent_menu=DB::table('menus')->select('menu_name as parentmenu','id as parentmenuid','mapping_sub_cat as mapping_sub_cat','is_active')
->where('parent_id',0)
->where('child_id',0)
->where("menu_category","header-menu")
// ->where('is_active', "Yes")   
->get();


// $sno=0;
// foreach ($header_menu as $key => $menu) {
// $header_menu[$key]->subcatgory = DB::table('menus')->select('menu_name as chilidmenu','id as childmenuid','child_id','parent_id as parentmenuid')->where('parent_id',$menu->parentmenuid)          
// ->where('child_id', 0)          
// ->where('menu_category', "header-menu")
// ->where('is_active', "Yes")  

// ->get();











// $sno++;

// }

// //dd($header_menu);

// foreach ($header_menu as $key => $menu) {



// for($i=0; $i < count($header_menu[$key]->subcatgory); $i++)
// {





//    $header_menu[$menu->subcatgory[$i]->childmenuid]->a =  DB::table('menus')->select('menu_name as c_menu','id as c_menuid') 
//         ->where('parent_id',$menu->subcatgory[$i]->parentmenuid)        
//         ->where('child_id',$menu->subcatgory[$i]->childmenuid)         
//         ->get();



   

// }


// }




// echo '<pre>'; print_r($header_menu); exit();
// die();




        $footer_widget=DB::table('menus')->select('menu_column_grid')->distinct()->where("menu_category","footer-widget-1")->orderBy('menu_column_grid')->get(); 


      foreach ($footer_widget as $key => $menu) {
            $footer_widget[$key]->menu_column_grid = DB::table('menus')->select('menus.*')
            ->where('menus.menu_column_grid', "$menu->menu_column_grid")          
            ->where('menus.menu_category', "footer-widget-1")
            ->where('menus.is_active', "Yes")
            ->orderBy('menus.menu_sorting', 'DESC')           
            ->get(); 
        }
        













   

        
          
            
            $addlink = url('admin/menu/create');  
            $pageTitle="Menu";          
            return view('admin.menus.menu_lists', compact('pageTitle','footer_widget','parent_menu','addlink'))
                ->with('i', (request()->input('page', 1) - 1) * 5);    
               
    }





     public function get_childsubcatmenu($parent_id=false,$child_id=false)
    {

        $results=DB::table('menus')->select('menu_name as c_menu','id as c_menuid') 
        ->where('parent_id',$parent_id)        
        ->where('child_id',$child_id)         
        ->get();

        if($results){

            return $results;
        }
        return false;

    }
    public function create_menu()
    {
        
            $pageTitle="Add Menu";
            $main_menu_data=Menu::where('parent_id',0)->orderBy('menu_name','ASC')->get();
            $child_menu_data=Menu::where('parent_id','!=',0)->where('child_id',0)->orderBy('menu_name','ASC')->get();

            return view('admin.menus.add_edit_menu',compact('pageTitle','main_menu_data','child_menu_data'));    
        
    }

    public function store_menu(Request $request)
    {
         // dd($request);
            $request->validate([
            'menu_category' => 'required',
            'menu_name' => 'required',
            // 'menu_slug' => 'required|min:1|max:200',
            // 'menu_url' => 'required|url',
            'menu_sorting'=>'required',
            // 'menu_column_grid'=>'required',
            ]);

            Menu::insert([
            [
                "menu_category"=>$request->menu_category,
                "parent_id"=>$request->parent_id,
                "child_id"=>$request->child_id,
                "mapping_sub_cat"=>$request->mapping_sub_cat??'no',
                    "menu_name"=>$request->menu_name??'',
                    "menu_url"=>$request->menu_url??'',
                    "menu_sorting"=>$request->menu_sorting??'',
                    "is_active"=>$request->is_active??'Yes',
                    "open_new_tab"=>$request->open_new_tab??'No',
            ]  
        ]);


            
            return redirect('admin/menu')->with('success', "Successfully added a Menu details."); 
        
        
    }
    public function edit_menu($id)    {
        
            $menu_data=DB::table('menus')->get()->where("id",$id)->first();
            $main_menu_data=Menu::where('parent_id',0)->orderBy('menu_name','ASC')->get();
            $child_menu_data=Menu::where('parent_id','!=',0)->where('child_id',0)->orderBy('menu_name','ASC')->get();
            $pageTitle="Edit Menu";        
            return view('admin.menus.add_edit_menu',compact('menu_data','pageTitle','main_menu_data','child_menu_data'));
        
        
    }
    public function update_menu(Request $request)
    {
        
        $request->validate([
            'menu_category' => 'required',
            'menu_name' => 'required',
            // 'menu_slug' => 'required|min:1|max:200',
            // 'menu_url' => 'required|url',
            'menu_sorting'=>'required',
            // 'menu_column_grid'=>'required',
        ]);
   
Menu::where('id', $request->id)
            ->update(
            [
                
                "menu_category"=>$request->menu_category,
                "parent_id"=>$request->parent_id,
                "child_id"=>$request->child_id,
                "mapping_sub_cat"=>$request->mapping_sub_cat??'no',
                    "menu_name"=>$request->menu_name??'',
                    "is_heading"=>$request->is_heading??'No',
                    "menu_url"=>$request->menu_url??'',
                    "menu_sorting"=>$request->menu_sorting??'',
                    "is_active"=>$request->is_active??'Yes',
                    "open_new_tab"=>$request->open_new_tab??'No',
            ]
            );    


        return redirect('admin/menu')->with('success', "Successfully update a Menu details.");
      
        
    }
    public function delete_menu($id)    {
        
            $data=DB::table('menus')->where('id',$id)->delete();   
            return redirect()->back()->with('success','Successfully delete a Menu');
        
        
    }
}
