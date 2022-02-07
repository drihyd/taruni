<?php

namespace App\Http\Controllers;
use SEOMeta;

use App\Models\Categories;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Collections;
use App\Models\Product_Attributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Sku;
use Carbon\Carbon;
Use Exception;
use Validator;
use Illuminate\Support\Facades\Session;


use File;
use App\Mail\ExceptionOccured;
use Mail;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	




	
 function all_department_products($department=null)
    {		
	
	

		try{
		
		$Department=Department::where("dept_slug",$department)->orderBy('dept_name', 'ASC')->get()->first();		
		SEOMeta::setTitle($Department->title??'');
		SEOMeta::setDescription($Department->title??'');
		SEOMeta::addKeyword($Department->title??'');
	
	
		$pageTitle=Str::ucfirst($Department->dept_name??'');
		$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')		
		->where('categories.department_id',$Department->id)	
		->where('skus.price_'.session()->get('appcurrency'), '>',0)	
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->orderBy('products.updated_at','desc')		
		->get()->unique('slug');	
		
		foreach ($Products as $key => $value) {
		$Products[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->get();	
	}
	
	
						foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->orderBy('skus.updated_at','desc')
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->orderBy('skus.updated_at','desc')
		->get()->first();	
		}

		
		} catch (RequestException $exception) {
				
		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		

			}
			//ErrorException::push_exception_error($exception);
			
			
			}		
			
			// You can check for whatever error status code you need 
			return false;
			} catch (\Exception $exception) {
			
			//ErrorException::push_exception_error($exception);
			// There was another exception.
			return false;
			}
		return view('frontend.all_department_products', compact('pageTitle','Products','Department'));

    }
	
	
	function collections_products($collection=null)
    {		



		try{
		
		$Collections=Collections::where("title_slug",$collection)->orderBy('title', 'ASC')->get()->first();



		if(!empty($Collections->categories_data)){
		$collections_map = json_decode($Collections->categories_data);
		if($collections_map){
$collections_map=$collections_map;
		}
		else{
			$collections_map=[0];
		}
	}
	else{
		$collections_map=[0];
		
	}

		// echo '<pre>'; print_r($collections_map); exit();		
	
		SEOMeta::setTitle($Collections->title??'');
		SEOMeta::setDescription($Collections->title??'');
		SEOMeta::addKeyword($Collections->title??'');
			
			
		$pageTitle=Str::ucfirst($Collections->title??'');
		
		$i=0;
	
		foreach($collections_map as $key=>$value){	
		
		if($i==0)
		{
			$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
			->leftjoin('products', 'products.id','=','skus.product_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')
			
			->where(function($Products) use ($value){	
		
			if(!empty($value->cate)){
				$Products->where('products.cat_id',$value->cate);					
				if(!empty($value->prices)){						
				$prices=explode("-",$value->prices);
				$Products->whereBetween('skus.price_'.session()->get('appcurrency'),[$prices[0]??0,$prices[1]??10000]);  
				}
			}
			
			
			})
			
			->where('skus.price_'.session()->get('appcurrency'), '>',0)	
			->where('skus.stock','>',0)		
			->where('skus.on_sale','!=','yes')			
		   ->orderBy('products.updated_at','desc')
		
			->get()->unique('slug');	
		

		}
		else{	

			$Products1=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
			->leftjoin('products', 'products.id','=','skus.product_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')			
			->where(function($Products1) use ($value){	
			
			if(!empty($value->cate)){
				
				
				$Products1->where('products.cat_id',$value->cate);					
				if(!empty($value->prices)){						
				$prices=explode("-",$value->prices);
				$Products1->whereBetween('skus.price_'.session()->get('appcurrency'),[$prices[0]??0,$prices[1]??10000]);  
				}
			}
			
			
			})
			
			->where('skus.price_'.session()->get('appcurrency'), '>',0)				
			->where('skus.stock','>',0)
			->where('skus.on_sale','!=','yes')
			->orderBy('products.updated_at','desc')
			->get()->unique('slug');	
		
		$Products = $Products->union($Products1);
		
		}	
		
		 $i++;
		}
		

		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->get();	
	}
	
	
	foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->where('skus.product_id', $value->pid)
		->get()->first();	
		}

		
		} catch (RequestException $exception) {
				
		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		

			}
			//ErrorException::push_exception_error($exception);
			
			
			}		
			
			// You can check for whatever error status code you need 
			return false;
			} catch (\Exception $exception) {
			
			//ErrorException::push_exception_error($exception);
			// There was another exception.
			return false;
			}
		return view('frontend.collection_products', compact('pageTitle','Products'));

    }
	
	
	function sale_products($collection=null)
    {		

		try{
		
		$Collections=Collections::where("title_slug",$collection)->orderBy('title', 'ASC')->get()->first();		
	
		SEOMeta::setTitle($Collections->title??'');
		SEOMeta::setDescription($Collections->title??'');
		SEOMeta::addKeyword($Collections->title??'');
			
			
		$pageTitle="Sale";
		$Products=Sku::select('skus.on_sale as is_on_sale','skus.on_sale_price_'.session()->get('appcurrency').' as psaleprice','categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')	
		->where('skus.price_'.session()->get('appcurrency'), '>',0)
		->where('skus.on_sale','yes')	
		->where('skus.stock','>',0)		
	   ->orderBy('products.updated_at','desc')		
		->get()->unique('slug');		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->get();	
	}
	
	
						foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.stock','>',0)
		->where('skus.product_id', $value->pid)
		->get()->first();	
		}

		
		} catch (RequestException $exception) {
				
			
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		

			}
			//ErrorException::push_exception_error($exception);
			
			
			}		
			
			// You can check for whatever error status code you need 
			return false;
			} catch (\Exception $exception) {
			//ErrorException::push_exception_error($exception);
			// There was another exception.
			return false;
			}
		return view('frontend.sales_products', compact('pageTitle','Products'));

    }
	
	
	
	public function new_arrivals($collection=null)
    {		
try{
			

			
			
		$pageTitle="New Arrivals";
		$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')	
		->where('skus.price_'.session()->get('appcurrency'), '>',0)		
		->where('skus.stock','>',0)		
		->where('skus.on_sale','!=','yes')	
		->whereNotIn('products.cat_id',[60,61,62,63,50,54])	
		//->whereDate('skus.created_at', '<=',  Carbon::now()->subDays(7))
		//->whereDate('products.updated_at', '>=',  Carbon::now()->subDays(2))
		->orderBy('products.updated_at','desc')	
		->limit(400)
		->get()->unique('slug');	

		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->images = DB::table('skus')
		->where('skus.product_id', $value->pid)		
		->get();	
	}
	
	
		foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		//->whereDate('skus.created_at', '<=', Carbon::now()->subDays(7))	
		->orderBy('skus.updated_at','desc')
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.stock','>',0)
		->where('skus.on_sale','!=','yes')
		->where('skus.product_id', $value->pid)
		//->whereDate('skus.created_at', '<=', Carbon::now()->subDays(7))	
		->orderBy('skus.updated_at','desc')
		->get()->first();	
		}

		
		} catch (RequestException $exception) {
			
			
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		

			}
			//ErrorException::push_exception_error($exception);
			
			
			}		
			
			// You can check for whatever error status code you need 
			return false;
			} catch (\Exception $exception) {
				
			//ErrorException::push_exception_error($exception);
			// There was another exception.
			return false;
			}
		return view('frontend.new_stock', compact('pageTitle','Products'));

    }
	
	
	
	
	
	function load_cat_products($slug=null,Request $request)
    {		
	
	

		
		try{		
		
		
		if($request->minprice>=0 && $request->maxprice>=0){
		$price=$request->minprice.'-'.$request->maxprice??'';
		}
		else{
			$price="";
		}

		
		
		$Categories=Categories::where("slug",$slug)->orderBy('name', 'ASC')->get();		
		$Breadcrum_Categories=Categories::where("slug",$slug)->orderBy('name', 'ASC')->get()->first();	
	
	
		SEOMeta::setTitle($Categories[0]->seo_title??'');
		SEOMeta::setDescription($Categories[0]->seo_desc??'');
		SEOMeta::addKeyword($Categories[0]->seo_keywords??'');
     
		
		
		foreach ($Categories as $key => $value) {			
		$Categories[$key]->available_sizes = DB::table('skus')
		->select('variant','variant_value')
		->where('skus.cat_id', $value->id)
		->where('skus.stock','>','0')
		->get()->keyBy('variant_value');	
		}
		
		$pageTitle=Str::ucfirst($Categories[0]->name??'');
		$Products='';
		$catslug=$slug;		
		$Categories[0]->id;		
		
		
		$Product_Attributes = DB::table('product_attributes')
		->select('varinat_value', DB::raw('count(*) as total'))
		->groupBy('varinat_value')
		->where("category_id",$Categories[0]->id)
		->where('variant_name','fabric')
		->whereNotNull('varinat_value')
		->get();
		
		
		$Product_colors = DB::table('product_attributes')
		->select('varinat_value', DB::raw('count(*) as total'))
		->groupBy('varinat_value')
		->where("category_id",$Categories[0]->id)
		->where('variant_name','color')
		->whereNotNull('varinat_value')
		->get();
		
		$Product_Workmanship = DB::table('product_attributes')
		->select('varinat_value', DB::raw('count(*) as total'))
		->groupBy('varinat_value')
		->where("category_id",$Categories[0]->id)
		->where('variant_name','work')
		->whereNotNull('varinat_value')
		->get();
		

		
			} catch (RequestException $exception) {
				

			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
		

			}
			//ErrorException::push_exception_error($exception);
			
		
			}		
			
			// You can check for whatever error status code you need 
		return false;
			} catch (\Exception $exception) {
				
				//ErrorException::push_exception_error($exception);
			// There was another exception.
return false;
			}
		return view('frontend.products', compact('pageTitle','catslug','Products','slug','Categories','Product_Attributes','Product_colors','Product_Workmanship','Breadcrum_Categories','price'));

    }

    function load_data(Request $request)
    {	
		
	 try{			
		
     if($request->ajax())
     {	 
 
 


		
		

		
	$Categories=Categories::where("slug",$request->catslug)->orderBy('name', 'ASC')->get()->first();	

	
	$pageTitle=Str::ucfirst($Categories->name??'');
      if($request->id > 0)
      {
		$pricess=$request->prices??'';

			$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		
			->leftjoin('products', 'products.id','=','skus.product_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')
			->where("products.cat_id",$Categories->id)
			
			
			->where(function($Products) use ($pricess){				
			
			if($pricess!="-"){		
			$prices=explode("-",$pricess);
		
			$Products->whereBetween('skus.price_'.session()->get('appcurrency'),[$prices[0]??0,$prices[1]??10000]);  
			}		
		})
			
			
			->where('skus.on_sale','no')				
			->where('skus.price_'.session()->get('appcurrency'), '>',0)	
			->where('skus.stock','>','0')	
			->where('skus.on_sale','!=','yes')				
			->orderBy('products.updated_at','desc')	
			->get()->unique('slug');
			
			
					foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>','0')	
		->where('skus.on_sale','!=','yes')
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>','0')	
		->where('skus.on_sale','!=','yes')
		->get()->first();	
		}
		$no_of_products=$Products->count();
      }
      else
      {
		  
		  $pricess=$request->prices??'';

		$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where("products.cat_id",$Categories->id)
		
		
				->where(function($Products) use ($pricess){				
			
			if($pricess!="-"){		
			$prices=explode("-",$pricess);
		
			$Products->whereBetween('skus.price_'.session()->get('appcurrency'),[$prices[0]??0,$prices[1]??10000]);  
			}		
		})
		
		->where('skus.price_'.session()->get('appcurrency'), '>',0)
		->where('skus.stock','>','0')	
		->where('skus.on_sale','!=','yes')
		->orderBy('products.updated_at','desc')	
		->get()->unique('slug');		
		$no_of_products=$Products->count();
		
		foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>','0')	
		->where('skus.on_sale','!=','yes')
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>','0')	
		->where('skus.on_sale','!=','yes')
		->get()->first();	
		}
      }
}

 }	

catch (\Exception $exception) {
	
	$Products='';
// There was another exception.			 
//ErrorException::push_exception_error($exception);	

}

      if($Products)
      {
		$html = view('frontend.product_card', compact('Products','no_of_products'))->render();
		return $html;  

      }
     
	 
    }
	 
	 
		public function cat_products(Request $request)
		{

		$pageTitle="";
		$Products='';
		$catslug='';
		return view('frontend.products', compact('pageTitle','catslug','Products'));


		}   


    public function cat_products_load(Request $request)
    {
        //
		
		
		
		 if ($request->id > 0) {
            //info($request->id);
            info('clicked');
            $Products = Products::with('category')
                    ->where('id','<',$request->id)
                    ->orderBy('id','DESC')
                    ->limit(2)
                    ->get();
        } else {
            $Products = Products::with('category')->limit(2)->orderBy('id', 'DESC')->get();
        }
		
		
		
		$html = view('frontend.product_card', compact('Products'))->render();
			return $html;

        $output = '';
        $last_id = '';


        return $output;

		
		exit();
		
		if ($request->ajax()) {


			$session_currency=session()->get('appcurrency');
		$Categories=Categories::where("slug",'anarkali')->orderBy('name', 'ASC')->get()->first();
		
	
		
		$pageTitle=Str::ucfirst($Categories->name??'');
		if($Categories){



			
		$Products=Sku::select('categories.product_upload_path','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->where("products.cat_id",$Categories->id)
		
		->where(function($Products) use ($session_currency){	
			if(session()->get('appcurrency')=="INR"){
				$Products->where('skus.price_'.session()->get('appcurrency'), '>',0);	
			}		
			if(session()->get('appcurrency')=="USD"){
				$Products->where('skus.price_'.session()->get('appcurrency'), '>',0);	
			}
			})
			
			
			->where(function($Products) use ($session_currency){	
			if($session_currency=="INR"){
			$Products->orderBy('skus.price_'.session()->get('appcurrency'),'asc');
			}		
			if($session_currency=="USD"){
			$Products->orderBy('skus.price_'.session()->get('appcurrency'),'asc');
			}
			})
		
		
			->get()->unique('slug');
		
		
	
		$catslug='anarkali';
		
		}else{
			$Products='';
			$catslug='';
		}
		

		
			$html = view('frontend.product_card', compact('Products'))->render();
			return $html;
		
		}
		else{
	$pageTitle="";
	$Products='';
	$catslug='';
		return view('frontend.products', compact('pageTitle','catslug','Products'));
			
		}
    }   


	public function index()
    {
        


        $categories_data=DB::table('categories')->select('categories.*','departments.id as dept_id','departments.dept_name as dept_name' )
        ->leftjoin('departments','departments.id','=','categories.department_id')
        ->orderBy('departments.dept_name','ASC')
        ->orderBy('categories.name','ASC')
        ->get();

        // echo '<pre>'; print_r($categories_data); exit();
        $pageTitle="Categories";       
        return view('admin.categories.categories_list', compact('pageTitle','categories_data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   
    public function create_category()
    {
        $pageTitle="Add Parent/Child Category";
        $parent_categories_data=DB::table('categories')->get();
        	// echo '<pre>'; print_r($parent_categories_data); exit();
        $departments_data=Department::orderBy('dept_name','ASC')->get();
        return view('admin.categories.add_edit_category',compact(['pageTitle','parent_categories_data','departments_data']));
    }

    
    public function store_category(Request $request)
    {
        $request->validate([
        'cat_image' => 'image|mimes:jpg,jpeg,png', 
        'size_chart' => 'image|mimes:jpg,jpeg,png', 
        'measurement_chart' => 'image|mimes:jpg,jpeg,png', 
         'name' => 'required',
         'slug' => 'required',
         'applicable_attributes' => 'required',
         'shipping_weight' => 'required',
         'sku_prefix' => 'required',
         'desc' => 'required',
         'alteration' => 'required',
         'sleeve' => 'required',
         'product_upload_path'=>'required',

        ]);
        if ($request->hasFile('cat_image')) {      
        $cat_filename=uniqid().'_'.time().'.'.$request->cat_image->extension();
        $request->cat_image->move(('assets/uploads/categories'),$cat_filename); 
        }
        else{
            $cat_filename="";
        }
        if ($request->hasFile('size_chart')) {      
        $size_chart_filename=uniqid().'_'.time().'.'.$request->size_chart->extension();
        $request->size_chart->move(('assets/uploads/categories'),$size_chart_filename); 
        }
        else{
            $size_chart_filename="";
        }
        if ($request->hasFile('measurement_chart')) {      
        $measurement_chart_filename=uniqid().'_'.time().'.'.$request->measurement_chart->extension();
        $request->measurement_chart->move(('assets/uploads/categories'),$measurement_chart_filename); 
        }
        else{
            $measurement_chart_filename="";
        }

        $upload_path= $request->product_upload_path;
        $path = public_path('products/'.$upload_path);
        if(!File::isDirectory($path)){
            File::makeDirectory($path);
            $thumbnailfolder = public_path('products/'.$upload_path.'/thumbnails');
            $largefolder = public_path('products/'.$upload_path.'/large');
            File::makeDirectory($thumbnailfolder);
            File::makeDirectory($largefolder);
        }else{

        }

        DB::table('categories')->insert([
            [
                "name"=>$request->name,
                "slug"=>$request->slug,
                // "parent_id"=>$request->parent_id,
                "department_id"=>$request->department_id,
                "applicable_attributes"=>json_encode($request->applicable_attributes)??'',
                "shipping_weight"=>$request->shipping_weight,
                "sku_prefix"=>$request->sku_prefix,
                "position_score"=>$request->position_score,
                "desc"=>$request->desc,
                "seo_title"=>$request->seo_title,
                "seo_desc"=>$request->seo_desc,
                "seo_keywords"=>$request->seo_keywords,
                "cat_image"=>$cat_filename,
                "size_chart"=>$size_chart_filename,
                "measurement_chart"=>$measurement_chart_filename,
                "product_upload_path"=>$request->product_upload_path,
                "alteration"=>$request->alteration??0,
                "sleeve"=>$request->sleeve??0,
            ]  
        ]); 
        return redirect('admin/categories')->with('success', "Success! Details are added successfully"); 
    }

    
    public function edit_category($id)
    {

    	$cat_id=Crypt::decryptString($id);

    	$categories_data=DB::table('categories')->where("id",$cat_id)->get()->first();
    	$departments_data=Department::orderBy('dept_name','ASC')->get();
        $pageTitle="Edit Parent Category";
        return view('admin.categories.add_edit_category',compact(['pageTitle','categories_data','departments_data']));
    }

    
    public function update_category(Request $request)
    {
        $request->validate([
         'cat_image' => 'image|mimes:jpg,jpeg,png', 
         'size_chart' => 'image|mimes:jpg,jpeg,png', 
         'measurement_chart' => 'image|mimes:jpg,jpeg,png', 
         'name' => 'required',
         'slug' => 'required',
         'applicable_attributes' => 'required',
         'shipping_weight' => 'required',
         'sku_prefix' => 'required',
         'desc' => 'required',
         'alteration' => 'required',
         'sleeve' => 'required',
         'product_upload_path'=>'required',

        ]);

       if ($request->hasFile('cat_image')) {      
        $cat_filename=uniqid().'_'.time().'.'.$request->cat_image->extension();
        $request->cat_image->move(('assets/uploads/categories'),$cat_filename);
        DB::table('categories')
        ->where('id', $request->id)
        ->update(["cat_image"=>$cat_filename]); 
        }
        else{
            $cat_filename="";
        }
    	if ($request->hasFile('size_chart')) {      
        $size_chart_filename=uniqid().'_'.time().'.'.$request->size_chart->extension();
        $request->size_chart->move(('assets/uploads/categories'),$size_chart_filename); 
        DB::table('categories')
        ->where('id', $request->id)
        ->update(["size_chart"=>$size_chart_filename]); 
        }
        else{
            $size_chart_filename="";
        }
        if ($request->hasFile('measurement_chart')) {      
        $measurement_chart_filename=uniqid().'_'.time().'.'.$request->measurement_chart->extension();
        $request->measurement_chart->move(('assets/uploads/categories'),$measurement_chart_filename);
        DB::table('categories')
        ->where('id', $request->id)
        ->update(["measurement_chart"=>$measurement_chart_filename]); 
        }
        else{
            $measurement_chart_filename="";
        }	


        $upload_path= $request->product_upload_path;
        $path = public_path('products/'.$upload_path);
        if(!File::isDirectory($path)){

            File::makeDirectory($path);
            $thumbnailfolder = public_path('products/'.$upload_path.'/thumbnails');
            $largefolder = public_path('products/'.$upload_path.'/large');
            File::makeDirectory($thumbnailfolder);
            File::makeDirectory($largefolder);

        }else{




        }

    
        DB::table('categories')
            ->where('id', $request->id)
            ->update(
            [
                
                "name"=>$request->name,
                "slug"=>$request->slug,
                // "parent_id"=>$request->parent_id,
                "department_id"=>$request->department_id,
                "applicable_attributes"=>json_encode($request->applicable_attributes)??'',
                "shipping_weight"=>$request->shipping_weight,
                "sku_prefix"=>$request->sku_prefix,
                "position_score"=>$request->position_score,
                "desc"=>$request->desc,
                "seo_title"=>$request->seo_title,
                "seo_desc"=>$request->seo_desc,
                "seo_keywords"=>$request->seo_keywords,
                "product_upload_path"=>$request->product_upload_path,
                "alteration"=>$request->alteration??0,
                "sleeve"=>$request->sleeve??0,
            ]
            ); 
    
        return redirect('admin/categories')->with('success', "Success! Details are deleted successfully");
    }

    
    public function delete_category($id)
    {
        $data=DB::table('categories')->where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
    }


    public function department_listing()
    {
        


        $departments_data=Department::orderBy('dept_name','ASC')->get();
        $pageTitle="Departments";     
        $addlink = url('admin/departments/create');  
        return view('admin.departments.department_list', compact('pageTitle','departments_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   
    public function create_department()
    {
        $pageTitle="Add Department";
        return view('admin.departments.add_edit_department',compact(['pageTitle']));
    }

    
    public function store_department(Request $request)
    {
        $request->validate([
        'dept_name' => 'required', 
        'dept_slug' => 'required', 

        ]);

        Department::insert([
            [
                "dept_name"=>$request->dept_name,
                "dept_slug"=>$request->dept_slug,
            ]  
        ]); 
        return redirect('admin/departments')->with('success', "Success! Details are added successfully"); 
    }

    
    public function edit_department($id)
    {

    	$dep_id=Crypt::decryptString($id);
    	$departments_data=Department::get()->where("id",$dep_id)->first();
        $pageTitle="Edit Department";
        return view('admin.departments.add_edit_department',compact(['pageTitle','departments_data']));
    }

    
    public function update_department(Request $request)
    {
        $request->validate([
         'dept_name' => 'required', 
        'dept_slug' => 'required',

        ]);

    
        Department::where('id', $request->id)
            ->update(
            [
                
                "dept_name"=>$request->dept_name,
                "dept_slug"=>$request->dept_slug,
            ]
            ); 
    
        return redirect('admin/departments')->with('success', "Success! Details are deleted successfully");
    }

    
    public function delete_department($id)
    {
    	$dep_id=Crypt::decryptString($id);
        $data=Department::where('id',$dep_id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
    }
}
