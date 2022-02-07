<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Sku;
use App\Models\Categories;
use App\Models\Shipping_Rates;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
Use Exception;
use Cookie;
use File;
use Carbon\Carbon;

class HomeController extends Controller
{
	
	
public function front_end_homepage()
    {        
	
	

	
		$recently_viewed=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where('skus.price_'.session()->get('appcurrency'), '>',0)		
		->where('skus.stock','>',0)		
		->where('skus.on_sale','!=','yes')	
		->whereNotIn('products.cat_id',[60,61,62,63,50,54])		
		//->whereDate('skus.created_at', '<=',  Carbon::now()->subDays(7))
		//->orderBy('skus.cat_id','desc')	
		->orderBy('products.updated_at','desc')	
		->limit(30)		
		->get()->unique('slug');

		
		foreach ($recently_viewed as $key => $value) {
		$recently_viewed[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->get();	
		}
	
	
		foreach ($recently_viewed as $key => $value) {
		$recently_viewed[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		//->whereDate('skus.created_at', '<=', Carbon::now()->subDays(7))			
		->orderBy('skus.updated_at','desc')
		->orderBy('skus.cat_id','desc')
		->get()->keyBy('variant_value');
		
		}
		
		
		foreach ($recently_viewed as $key => $value) {
		$recently_viewed[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->where('skus.product_id', $value->pid)
		//->whereDate('skus.created_at', '<=', Carbon::now()->subDays(7))		
		->orderBy('skus.updated_at','desc')
		->orderBy('skus.cat_id','desc')	
		->get()->first();	
		}
	
	
	

foreach ($recently_viewed as $key => $value) {
$recently_viewed[$key]->attributes = DB::table('product_attributes')
->where('product_attributes.product_id', $value->pid)
->get()->keyBy('variant_name');	
}
	
	
	
	 if(session()->get('appcurrency')=="USD"){
		  $shipping_rates=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','!=','India')->get()->first();
		 
	 }	 
	 else{
		 $shipping_rates=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','India')->get()->first();
	 }
	 
	 

	$shipping_rates_usd=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','!=','India')->get()->first();
	$shipping_rates_inr=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','India')->get()->first();
	

	
	
	return view('frontend.home',compact('recently_viewed','shipping_rates'));
	
	
       
    }
	
   public function list_banners()
    {  
      
    $list_banners = DB::table('project_photos')->orderBy('sorting', 'ASC')->get()->where("project_id",0)->where('type','banner'); 
    
    $pageTitle="Home Page Banners";
    $addlink=url('admin/homebanner/add'); 

    return view('admin.home.show', compact('list_banners','pageTitle','addlink'));
       
    }
    public function delete_banner($id)
    {

      
    if($single_data = DB::table('project_photos')->get()->where("id",$id)->first()){
        $image=$single_data->image;
        $image_path = "assets/uploads/".$image;
        if(File::exists($image_path)) {
         File::delete($image_path);           
        }
    if($data=DB::table('project_photos')->where('id',$id)->delete()){
      return redirect()->back()->with('success','Successfully delete a banner.');
    } 
    else
    {
      return redirect()->back()->with('success','Successfully delete a banner.');
    }   
      } 
      else{
        //abort(404);
      } 

           
    }
  
  public function create_banners()
    {   
      
    $pageTitle=" Add Homepage Banner";        
    $project_id=0;
    return view('admin.home.createOrUpdate', compact('project_id','pageTitle'));
          
     
    } 
  
  public function store_homepagebanner(Request $request)
    {

          $request->validate([
      //'image' => 'required|mimes:jpg,jpeg,png|dimensions:min_width=1152,min_height=605,max_width=1152,max_height=605',  
      'image' => 'required|mimes:jpg,jpeg,png',
      // 'name'=> 'required|max:35|min:10',  
      // 'description'=> 'required|max:150|min:10',        
      // 'banner_url'=> 'required|url',        
    ]);
    
    

    
    
    
    if ($request->hasFile('image')) {      
        $filename=time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$filename);
        //$request->banner=$filename;
    
        }
        else{
            $filename="";
        }
      
      DB::table('project_photos')->insert([
      [
        'project_id' =>$request->project_id,
        'type' =>$request->slug,
        "image"=>$filename, 
        // "name"=>$request->name,
        // "description"=>$request->description,
        // "sorting"=>$request->sorting,
        "banner_url"=>$request->banner_url,
        'is_show'=>$request->is_show,

      ]  
]);    
    return redirect('admin/banners')->with('success', "Successfully added a banner.");

          
    }
  public function update_homepagebanners(Request $request)
    {

            $request->validate([
      'image' => 'mimes:jpg,jpeg,png',   
      // 'name'=> 'required|max:35',
      // 'banner_url'=> 'required|url', 
    ]);

      

    
  if ($request->hasFile('image')) {      
        $filename=time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$filename);
        //$request->banner=$filename;   
      DB::table('project_photos')
      ->where('id', $request->id)
      ->update(["image"=>$filename]);    
        }
        else{
            $filename="";
        }   
    DB::table('project_photos')
      ->where('id', $request->id)
      ->update([
      // "name"=>$request->name,
      // "description"=>$request->description,
      'type' =>$request->slug,
      // 'sorting'=>$request->sorting,
      'banner_url'=>$request->banner_url,
      'is_show'=>$request->is_show,
      
      ]);
    
    return redirect('admin/banners')->with('success', "Successfully added a banner.");

          
    }
  
  public function edit_banner($pkid=false)
    { 
      
    $single_data = DB::table('project_photos')->get()->where("id",$pkid)->first(); 
    $project_id=$single_data->project_id;
    $pageTitle="Edit Homepage Banner";   
    $project_id=0;
    return view('admin.home.createOrUpdate', compact('project_id','pageTitle','single_data'));
          
     
    } 


    /*Testimonial*/
    public function show_testimonials()
    {  
      
          $testimonials = DB::table('testimonials')->get();
          $pageTitle="Testimonials";
           
          $addlink=url('admin/testimonials/add');          
          return view('admin.testimonials.show', compact('testimonials','pageTitle','addlink'));
        
    }
    public function create_testimonials()
    {
     
      $pageTitle="Add Testimonial";
      return view('admin.testimonials.createOrUpdate', compact('pageTitle'));
      
    }


    public function store_testimonials(Request $request)
    {

     
      $request->validate([
      'name' => 'required|min:3|max:100',  
      'description' => 'required|min:3|max:400',
      'image' => 'mimes:jpg,jpeg,png',      

      ]);

      

      if ($request->hasFile('image')) {      
      $filename=time().'.'.$request->image->extension();
      $request->image->move(('assets/uploads'),$filename);
      //$request->banner=$filename;

      }
      else{
      $filename="";
      }
      DB::table('testimonials')->insert([
      [
        "image"=>$filename, 
        "name"=>$request->name,
        "description"=>$request->description,

      ]   
      ]);  
      return redirect('admin/testimonials/')->with('success', "Successfully added a testimonial.");

     

    }
    
    public function edit_testimonials($pkid)
    {
     
      $pageTitle="Edit Testimonial";      
      $single_testimonial = DB::table('testimonials')->get()->where("id",$pkid)->first(); 
      return view('admin.testimonials.createOrUpdate', compact('pageTitle','single_testimonial'));
       
    }

    public function update_testimonials(Request $request)
    {

        $request->validate([
          'name' => 'required|min:3|max:100',  
          'description' => 'required|min:3|max:400', 
          'image' => 'mimes:jpg,jpeg,png',      
          
        ]);

       
        if ($request->hasFile('image')) {      
        $filename=time().'.'.$request->image->extension();
        $request->image->move(('assets/uploads'),$filename);
        //$request->banner=$filename;   
        DB::table('testimonials')
        ->where('id', $request->id)
        ->update(["image"=>$filename]);
        
        }
        DB::table('testimonials')
        ->where('id', $request->id)
        ->update([
        "name"=>$request->name,
        "description"=>$request->description,

      ] );
        return redirect('admin/testimonials/')->with('success', "Successfully update a testimonial.");
       
    }
    
    
    
      public function delete_testimonials($id)
    {
      
      $data=DB::table('testimonials')->where('id',$id)->delete();   
      return redirect()->back()->with('success','Successfully delete a testimonial');
      
    }
    
    
/*End*/
}
