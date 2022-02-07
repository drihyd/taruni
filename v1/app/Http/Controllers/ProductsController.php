<?php
namespace App\Http\Controllers;
use SEOMeta;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Sku;
use App\Models\Categories;
use App\Models\Product_Attributes;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
Use Exception;
use Cookie;
use Carbon;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
	
	
public function show_product(Request $request,$slug=false)
{


try{

	$Products=$Breadcrumprd=Products::where("slug",$request->slug)->orderBy('name', 'ASC')->get()->first();
	

	$Products_id=$Products->id;

	SEOMeta::setTitle($Products->seo_title??'');
	SEOMeta::setDescription($Products->seo_desc??'');
	SEOMeta::addKeyword($Products->seo_keywords??'');
	
	$this->put_recent_viewed_products($Products->id);
	$pageTitle=Str::ucfirst($Products->name);
	$product_size=$request->size??'M';
	$product_slug=$request->slug??'NA';
	
	if($Products)
	{			
		$Products=Products::select('skus.sku_code as sku_code','skus.on_sale as on_sale','skus.on_sale_price_'.session()->get('appcurrency').' as psaleprice','categories.product_upload_path','products.desc as pdesc','products.slug as pslug','products.cat_id as cat_id','skus.stock as pstock','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice','skus.child_variant_value as child_variant_value')
		->leftjoin('skus','skus.product_id','=','products.id')	
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		
		->where(function($Products) use ($product_size){
		if($product_size){
		$Products->where('skus.variant_value',$product_size);  
		}			
		})	
		
		->where(function($Products) use ($product_slug){
		if($product_slug){
		$Products->where('products.slug',$product_slug);  
		}			
		})	
		
	   ->orderBy('skus.product_code', 'asc')		
		->get()
		
		->unique('pcode');	
		

		
		$p_category_id=$Products[0]['cat_id']??0;
		
		

		foreach ($Products as $key => $value) {
        $skucode=preg_replace('~ *-.*~', '', $value->sku_code);
        $Products[$key]->images = DB::table('product_images')		
        ->where('thumbnail','LIKE','%'.$skucode.'%')
        ->where('cat_id',$p_category_id)
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
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->first();	
		}
	
	
	

foreach ($Products as $key => $value) {
$Products[$key]->attributes = DB::table('product_attributes')
->where('product_attributes.product_id', $value->pid)
->get()->keyBy('variant_name');	
}
	


	
$recently_viewed=$this->recently_viewed_products($_SESSION['viewed_articles']);	
$category_id=$Products[0]['cat_id'];
$sku_code=$Products[0]['sku_code']??'';	
$product_desc=$Products[0]['pdesc']??'';	



/* Recommdede Products */


$Recomended_Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		
			->leftjoin('products', 'products.id','=','skus.product_id')
			->leftjoin('categories', 'categories.id','=','products.cat_id')
			->where("products.cat_id",$category_id)
			->where('products.id', '!=',$Products_id)	
			->where('skus.price_'.session()->get('appcurrency'), '>',0)	
			->where('skus.stock','>',0)				
			->orderBy('products.id', 'DESC')
			->orderBy('skus.price_'.session()->get('appcurrency'),'asc')
			->limit(150)
			->get()->unique('slug');
			
			
		foreach ($Recomended_Products as $key => $value) {
		$Recomended_Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Recomended_Products as $key => $value) {
		$Recomended_Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->first();	
		}


/* End */




			
	
$Categories=Categories::where("id",$category_id??0)->get()->first();
}


} catch (RequestException $exception) {

//dd($exception);
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
	//dd($exception);
//ErrorException::push_exception_error($exception);
// There was another exception.
return false;
}
		


$cancellation_exchange_data=DB::table('pages')->get()->where("slug",'cancellation-exchange')->first();  
return view('frontend.single_product', compact('product_desc','sku_code','pageTitle','Products','Categories','recently_viewed','product_size','product_slug','Recomended_Products','Breadcrumprd','cancellation_exchange_data'));

}  	


 
	
	
	public function put_recent_viewed_products($Productid=null){
		
		session_start();

		if ( ! isset($_SESSION['viewed_articles']))
		{
		$_SESSION['viewed_articles'] = array();
		}

		if ( ! in_array($Productid, $_SESSION['viewed_articles']))
		{
		$_SESSION['viewed_articles'][] = $Productid;
		}

		
	}
	public function recently_viewed_products($Products_ids=null)
    {

		$Products=Sku::select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.product_id as productid','skus.child_variant_value as child_variant_value')	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->whereIn('products.id', $Products_ids)	
		->where('skus.price_'.session()->get('appcurrency'), '>',0)		
		->where('skus.stock','>',0)	
		->orderBy('products.id', 'DESC')
		->orderBy('skus.price_'.session()->get('appcurrency'),'asc')
		->limit(20)
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
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->first();	
		}
		
		//$html = view('frontend.product_card', compact('Products'))->render();
		
		return $Products;
    }  	
	
	public function show_cart()
    {
        //
		return view('frontend.cart');
    }   	
	
	

	
	public function show_payments()
    {
        //
		return view('frontend.payment_selection');
    }   
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
	
	 public function filter_products(Request $request)
    {
       	   
		   

		$Categories=Categories::where("slug",$request->cat_slug)->orderBy('name', 'ASC')->get()->first();
		
		if ($request->ajax() ) {
		$prices=$request->my_range;
		$product_size=$request->sizes;
		
		if($request->colors){
		$product_colors = explode(",",implode($request->colors));
		}
		else{
		$product_colors = "";
		}
		
		if($request->fabrics){
		$product_fabrics = explode(",",implode($request->fabrics));
		}
		else{
		$product_fabrics = "";
		}
		
		if($request->workmanship){
		$product_workmanship = explode(",",implode($request->workmanship));
		}
		else{
		$product_workmanship = "";
		}


		$Products = DB::table('skus')->select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice','skus.child_variant_value as child_variant_value')->where('skus.price_'.session()->get('appcurrency'), '>',0)
	
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->leftjoin('product_attributes', 'product_attributes.product_id','=','products.id')
		->where("products.cat_id",$Categories->id)
		
		->where(function($Products) use ($prices){	
			if($prices){		
			$prices=explode(";",$prices);
			$Products->whereBetween('skus.price_'.session()->get('appcurrency'),[$prices[0]??0,$prices[1]??10000]);  
			}		
		})
		->where(function($Products) use ($product_size){
			if($product_size){
			$Products->whereIn('skus.variant_value',$product_size);  
			}			
		})
		
		->where(function($Products) use ($product_workmanship){
			if($product_workmanship){
			foreach ($product_workmanship as $key=>$workmanship) {
			
				if($key==0) {			
					$Products->where('product_attributes.varinat_value','LIKE',"%$workmanship%");
					$Products->where('product_attributes.variant_name','=','work');					
				}
				else{
					$Products->orwhere('product_attributes.name','LIKE',"%$workmanship%");
					$Products->where('product_attributes.variant_name','=','work');
				}	
			
			}						
				
			}			
		})		
		
		->where(function($Products) use ($product_colors){
			if($product_colors){
			foreach ($product_colors as $key=>$color) {
			
				if($key==0) {			
					$Products->where('product_attributes.varinat_value','LIKE',"%$color%");
					$Products->where('product_attributes.variant_name','=','color');					
				}
				else{
					$Products->orwhere('product_attributes.name','LIKE',"%$color%");
					$Products->where('product_attributes.variant_name','=','color');
				}	
			
			}						
				
			}			
		})
		
		->where(function($Products) use ($product_fabrics){
			if($product_fabrics){
			foreach ($product_fabrics as $key=>$fabric) {
			
				if($key==0) {
					$Products->where('product_attributes.varinat_value','LIKE',"%$fabric%");
					$Products->where('product_attributes.variant_name','=','fabric');
				}
				else{
					$Products->orwhere('product_attributes.varinat_value','LIKE',"%$fabric%");
					$Products->where('product_attributes.variant_name','=','fabric');
				}	
			
			}						
				
			}			
		})
		
		->where('skus.stock','>',0)	
		->orderBy('skus.price_'.session()->get('appcurrency'),'ASC')					
		->get()
		->unique('slug');
		
		
		
	foreach ($Products as $key => $value) {
		$Products[$key]->sizes = DB::table('skus')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->keyBy('variant_value');	
		}
		
		
		foreach ($Products as $key => $value) {
		$Products[$key]->firstsize = DB::table('skus')
		->select('variant_value')
		->where('skus.product_id', $value->pid)
		->where('skus.stock','>',0)	
		->get()->first();	
		}
		
		$fetched_products=$Products->count();
		
		if($fetched_products>0)
		$html = view('frontend.product_card', compact('Products'))->render();
		else
		$html ="<h4 class='text-center mt-5 mb-5'>No fashions are found.</h4>";
		return $html;
	   
    }	
}


 public function products_header_search(Request $request)
    {
       	   

		


		if($request->q){
		$querysearch = $request->q;
		}
		else{
		$querysearch = "";
		}
		

		$Products = DB::table('skus')->select('categories.product_upload_path','products.id as pid','products.*','skus.price_'.session()->get('appcurrency').' as pprice')->where('skus.price_'.session()->get('appcurrency'), '>',0)
		->leftjoin('products', 'products.id','=','skus.product_id')
		->leftjoin('categories', 'categories.id','=','products.cat_id')
		->leftjoin('product_attributes', 'product_attributes.product_id','=','products.id')
		->where(function($Products) use ($querysearch){			
				if($querysearch) {
					$Products->where('products.name','LIKE',"%$querysearch%");
					$Products->orwhere('products.code','LIKE',"%$querysearch%");
					$Products->orwhere('products.desc','LIKE',"%$querysearch%");
					$Products->orwhere('skus.sku_code','LIKE',"%$querysearch%");
					$Products->orwhere('product_attributes.varinat_value','LIKE',"%$querysearch%");
				}
				else{					
				}	

		})

	->where('skus.stock','>',0)	
		->orderBy('skus.price_'.session()->get('appcurrency'),'ASC')					
		->get()
		->unique('slug');	
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
		
		$pageTitle="Search query is ".$querysearch;
		$catslug='';
		$slug='';
		$is_header_product_search='yes';
		return view('frontend.search_products', compact('pageTitle','catslug','Products','slug','is_header_product_search'));   
}

// public function products_list()
// {

// 	$pageTitle = "Products";
// 	$Products = DB::table('skus')->select('products.*','skus.*','categories.*')
// 		->leftjoin('products', 'products.id','=','skus.product_id')
// 		->leftjoin('categories', 'categories.id','=','products.cat_id')
// 		->get();

// 		// echo '<pre>'; print_r($Products); exit();

// 		return view('admin.products.products_list', compact('Products','pageTitle'));

// }
public function get_products(Request $request,$id=false)
    { 
    	$pageTitle = "Products";
    	$addlink = url('admin/products/create'); 
		if (!$request->ajax()) {
			$categories=DB::table('categories')->where('parent_id','0')->where('parent_id','0')->orderBy('name','ASC')->get();
			if ($request->value) {
				$categoryid=Crypt::decryptString( $request->value);
			}else{
				$categoryid='';
			}
			// $categoryid=Crypt::decryptString( $request->value);
		}

	   	$pageTitle = "Products";    





		$catid=$request->cat_id??'';


        if ($request->ajax()) {

				$Products = DB::table('products')
				->select('skus.sku_code as scode','categories.product_upload_path','products.id as pid','products.name as pname','products.code as pcode','skus.variant_value as sku_size','skus.stock as sku_stock','skus.price_inr as sku_price_inr','skus.price_usd as sku_price_usd','categories.name as cat_name','categories.id as cat_id')
				->leftjoin('skus','skus.product_id','=','products.id')
				->leftjoin('categories', 'categories.id','=','products.cat_id')
				->where(function($Products) use ($catid){			
				if($catid) {
				$Products->where('products.cat_id',$catid);
				}
				else{					
				}
				})
				->orderBy('categories.name','ASC')							
				->orderBy('skus.sku_code','ASC')					
				->get();


            return Datatables::of($Products)
                    ->addIndexColumn()
                    ->addColumn('product_image', function($row){
						$str_sku = $row->scode??'';
						$skucode=preg_replace('~ *-.*~', '', $str_sku);
     
                           $file_path = env('BASE_URL').$row->pcode.'_dp.jpg';
                            $pic = "<img src=".URL('/public/'.Products::is_photo_exist($skucode,1,$row->product_upload_path,'thumbnails'))." width='50' class='d-flex align-items-center' />";
                            
                             return $pic;
                    })
                    ->addColumn('product_name', function($row){
     
                           $btn = '<a href="'.url("admin/products/edit/".Crypt::encryptString($row->pid)).'">'.ucwords($row->pname).'</a>';
                            return $btn;
                    })
                    ->addColumn('sku_size', function($row){
     
                          
                            $sku_size = strtoupper($row->sku_size);
                            
                             return $sku_size;
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.url("admin/products/edit/".Crypt::encryptString($row->pid)).'"><i class="fas fa-edit"></i></a>';
                            return $btn;
                    })
                    
                    ->rawColumns(['action','product_image','sku_size','product_name'])
                    ->make(true);
        }
        
        return view('admin.products.products_list', compact('pageTitle','addlink','categories','categoryid'));
    }

    public function create_products()
    {
    	$pageTitle = "Add Products";
    	$categories=DB::table('categories')->get();
    	return view('admin.products.add_edit_products', compact('pageTitle','categories'));
    }
    public function store_products(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'cat_id'=>'required',
            'slug'=>'required',
            'desc'=>'sometimes|nullable',
            'position_score'=>'sometimes|nullable',
            'unstitched'=>'sometimes|nullable',
            'newarrival'=>'sometimes|nullable',
            
        ]);

        
        DB::table('products')->insert([
            [
                "name"=>$request->name,
                "slug"=>$request->slug,
                "cat_id"=>$request->cat_id??'',
                "code"=>$request->code??'',
                "desc"=>$request->desc??'',
                "position_score"=>$request->position_score??0,
                "unstitched"=>$request->unstitched??0,
                "newarrival"=>$request->newarrival??0,
            ]  
        ]); 
        return redirect('admin/products')->with('success', "Success! Details are added successfully"); 
    }

    public function edit_products(Request $request,$id)
    {

    	$prod_id=Crypt::decryptString($id);
    	
    	$categories=DB::table('categories')->get();
    	$collections=DB::table('collections')->get();

    	  $Products=DB::table('products')->select('products.id as pid','products.*','skus.sku_code as sku_code','categories.name as cname','categories.id as cid','categories.applicable_attributes as c_applicable_attributes')
		 ->leftjoin('categories', 'categories.id','=','products.cat_id')
		 ->leftjoin('skus','skus.product_id','=','products.id')	
    	 ->where("products.id",$prod_id)->get();



foreach ($Products as $key => $value) {
$Products[$key]->attributes = product_attributes::select('variant_name','varinat_value')
->where('product_attributes.product_id',$prod_id)
->get()->keyBy('variant_name');	
}




		// echo '<pre>'; print_r($Products); exit();

    	 $skus=DB::table('skus')->select('skus.*')->where("skus.product_id",$prod_id)->get();

    	 $pageTitle = "Edit - ".ucwords($Products[0]->name??'');



    	 $cat_id = $value->cat_id;
			$Categories=Categories::where("id",$cat_id)->orderBy('name', 'ASC')->first();

    	
    	// Images drag and drop view

      
      $cat_id = $value->cat_id;
			$Categories=Categories::where("id",$cat_id)->orderBy('name', 'ASC')->first();

$str_sku = $Products[0]->sku_code??'';
$skucode=preg_replace('~ *-.*~', '', $str_sku);

        if ($request->ajax()) {



                 $images = DB::table('product_images')
                ->select('product_images.*','categories.product_upload_path as pathname','categories.name as cname')
                ->leftjoin('categories','categories.id','=','product_images.cat_id')
                ->leftjoin('products','products.cat_id','=','product_images.cat_id')

		 		// ->leftjoin('skus','skus.product_id','=','products.id')	
     //            ->where('product_images.cat_id',$cat_id)
     //            ->where('products.cat_id',$cat_id)
                ->where('thumbnail','LIKE','%'.$skucode.'%')
                ->orderBy('id', 'DESC')
                ->get();


            return Datatables::of($images)
                    ->addIndexColumn()
                    ->addColumn('thumbnails', function($row){
     
                           $file_path = url('public/products/'.$row->thumbnail);
                            $pic = "<img src='$file_path' width='50' class='d-flex align-items-center' />";
                            
                             return $pic;
                    })
                    ->addColumn('large', function($row){
     
                           $file_path = url('public/products/'.$row->image);
                            $pic = "<img src='$file_path' width='50' class='d-flex align-items-center' />";
                            
                             return $pic;
                    })
                    
                    ->addColumn('action', function($row){
     
                           $btn = "<a href='javascript:void(0);' data-id='$row->id'' class='nddelete delete' data-toggle='tooltip' data-original-title='Delete'><i class='fas fa-trash-alt'></i></a>";
                        return $btn;
                    })
                    
                    ->rawColumns(['action','thumbnails','large'])
                    ->make(true);

                    exit();
        }

    	
    	return view('admin.products.edit_products', compact('pageTitle','categories','Products','skus','collections','cat_id'));
    }

    public function update_products(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'cat_id'=>'required',
            'slug'=>'required',
            'desc'=>'sometimes|nullable',
            'position_score'=>'sometimes|nullable',
            'collection'=>'sometimes|nullable',
            // 'unstitched'=>'sometimes|nullable',
            'newarrival'=>'sometimes|nullable',         
        ]);  
         
        DB::table('products')
            ->where('id', $request->id)
            ->update(
            [
                
            "name"=>$request->name,
                "slug"=>$request->slug,
                "cat_id"=>$request->cat_id??'',
                "collection"=>$request->collection??'',
                "code"=>$request->code??'',
                "desc"=>$request->desc??'',
                "position_score"=>$request->position_score??0,
                // "unstitched"=>$request->unstitched??0,
                "newarrival"=>$request->newarrival??0,
            ]
            );      
        return redirect('admin/products')->with('success', "Success! Details are updated successfully");
    }
    public function update_products_seo(Request $request)
    {
        $request->validate([
            'seo_title'=>'sometimes|nullable',
            'seo_desc'=>'sometimes|nullable',
            'seo_keywords'=>'sometimes|nullable',        
        ]);  
         
        DB::table('products')
            ->where('id', $request->id)
            ->update(
            [
                
            "seo_title"=>$request->seo_title,
                "seo_desc"=>$request->seo_desc,
                "seo_keywords"=>$request->seo_keywords??'',
            ]
            );      
        return redirect()->back()->with('success', "Success! Details are updated successfully");
    }
    public function store_images(Request $request)
{
    // if($request->hasFile('image'))
    // {
        // $file = $request->file('image');
        // $originalname = $file->getClientOriginalName();
        // $path = $file->storeAs('assets/uploads/products', $originalname);

        if ($request->hasFile('image')) {  
        $file = $request->file('image');    
        $cat_filename=$file->getClientOriginalName();
        $request->image->move(('assets/uploads/products'),$cat_filename); 
        }
        else{
            $cat_filename="";
        }
    // }

        return redirect()->back()->with('success', "Success! Details are updated successfully");
}

public function store_skus(Request $request)
    {

    	$skus=DB::table('skus')->select('skus.*')->where("skus.product_id",$request->product_id)->get();

    	echo '<pre>'; print_r($skus); exit();
        
        $request->validate([
            'sku_code'=>'required',
            'size'=>'required',
            'price_inr'=>'required',
            'price_usd'=>'required',
            'discount_price_inr'=>'sometimes|nullable',
            'discount_price_usd'=>'sometimes|nullable',
            'stock'=>'sometimes|nullable',
            
        ]);


        
        DB::table('skus')->insert([
            [
                "sku_code"=>$request->sku_code,
                "variant_value"=>$request->size,
                "price_inr"=>$request->price_inr??'',
                "price_usd"=>$request->price_usd??'',
                "on_sale_price_inr"=>$request->discount_price_inr??0,
                "on_sale_price_usd"=>$request->discount_price_usd??0,
                "stock"=>$request->stock??0,
                "product_id"=>$request->product_id,
                "cat_id"=>$request->cat_id,
            ]  
        ]); 
        return redirect()->back()->with('success', "Success! Details are updated successfully"); 
    
    }

    public function single_product($id)
    {

        $prod_id=Crypt::decryptString($id);
        
        $categories=DB::table('categories')->get();

         $Products=DB::table('products')->select('categories.product_upload_path','products.*','categories.name as cname','categories.id as cid')
         ->leftjoin('skus','skus.product_id','=','products.id')
         ->leftjoin('categories', 'categories.id','=','skus.cat_id')
         ->where("products.id",$prod_id)->get()->first();

         $skus=DB::table('skus')->select('skus.*')->where("skus.product_id",$prod_id)->get();


         $skus_count=DB::table('skus')->select('skus.*')->where("skus.product_id",$prod_id)->get()->count();
         $product_attributes=DB::table('product_attributes')->select('product_attributes.*')->where("product_attributes.product_id",$prod_id)->get();
         // echo '<pre>'; print_r($product_attributes); exit();
         $pageTitle = ucwords($Products->name)??'';
        return view('admin.products.single_product', compact('pageTitle','categories','Products','skus','skus_count','product_attributes'));
    }
    public function update_skus_stock(Request $request)
    {
        $request->validate([
            'stock'=>'sometimes|nullable',        
        ]);  
         
        DB::table('skus')
            ->where('id', $request->id)
            ->update(
            [
                
            "stock"=>$request->stock,
            ]
            );      
        return redirect()->back()->with('success', "Success! Details are updated successfully");
    }

    public function edit_skus($id)
    {

         $skus=DB::table('skus')->select('skus.*')->where("skus.id",$id)->get()->first();

         $pageTitle ="Edit SKU";

        
        return view('admin.products.add_edit_skus', compact('pageTitle','skus'));
    }

    public function update_skus(Request $request)
    {
        $request->validate([
            'sku_code'=>'required',
            'size'=>'required',
            'price_inr'=>'required',
            'price_usd'=>'required',
            'discount_price_inr'=>'sometimes|nullable',
            'discount_price_usd'=>'sometimes|nullable',
            'stock'=>'sometimes|nullable',        
        ]);  
         
        DB::table('skus')
            ->where('id', $request->id)
            ->update(
            [
                
            "sku_code"=>$request->sku_code,
                "variant_value"=>$request->size,
                "price_inr"=>$request->price_inr??'',
                "price_usd"=>$request->price_usd??'',
                "on_sale_price_inr"=>$request->discount_price_inr??0,
                "on_sale_price_usd"=>$request->discount_price_usd??0,
                "stock"=>$request->stock??0,
                // "product_id"=>$request->product_id,
                // "cat_id"=>$request->cat_id,
            ]
            );      
        return redirect()->back()->with('success', "Success! Details are updated successfully");
    }
    public function delete_skus($id)
    {
        
             
            $data=DB::table('skus')->where("skus.id",$id)->delete();  
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }

    public function isexist_attribute_ofprdouct($product_code,$categoryid,$variant_name){
	
		$attributes_product= Product_Attributes::select('id')->where('product_code',$product_code)->where('variant_name',$variant_name)->where("category_id",$categoryid)->get();
		$count=$attributes_product->count();
		if($count==1){
			return 1;
		}
		else if($count==0){
			return 0;
		}
		else{
			return 2;
		}		
	}

    public function store_attr_values(Request $request)
    {



	$category_id=$request->category_id;
	$product_id=$request->product_id;
	$product_code=$request->product_code;



        $Categories=Categories::select('applicable_attributes')->where("id",$category_id)->orderBy('name', 'ASC')->get()->first();



        $applicable_attributes=json_decode($Categories->applicable_attributes);








foreach($applicable_attributes as $key=>$value){	

			$isexistsku=$this->isexist_attribute_ofprdouct($product_code,$category_id,$value);

			
			/* Add Or Update attribute Data */
		if($isexistsku==0){				
 			$attribute_add = DB::table('product_attributes')
			->insert([
			'category_id' => $category_id,
			'product_id' => $product_id,
			'product_code' => $product_code,			
			'variant_name' => $value,				
			'varinat_value' => $request->$value,					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);		

			
			}
			else if($isexistsku==1){
				
			$attribute_update = DB::table('product_attributes')
			->where('product_code', $product_code)
			->where('category_id', $category_id)
			->where('product_id', $product_id)
			->where('variant_name', $value)
			->update(						
					[
					'category_id' => $category_id,
					'product_id' => $product_id,
					'product_code' => $product_code,			
					'variant_name' => $value,				
					'varinat_value' => $request->$value,			
					'updated_at' => Carbon\Carbon::now(),
					]			
				);
				
		
				
			}
			
			else if($isexistsku==2){			
				
			$deletesku=Product_Attributes::where('category_id',$category_id)->where("product_code",$product_code)->where("product_id",$product_id)->where("variant_name",$value)->delete();
			
		 	$attribute_add = DB::table('product_attributes')
			->insert([
			'category_id' => $category_id,
			'product_id' => $product_id,
			'product_code' => $product_code,			
			'variant_name' => $value,				
			'varinat_value' => $request->$value,					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);	

				
			}
			else{
				
			}
			
			
			
		}

        return redirect()->back()->with('success', "Success! Details are added successfully"); 
    }

    public function delete_product($id)
    {
    	$prod_id=Crypt::decryptString($id);
    	
    	
    		// $skus=DB::table('skus')->whereIn('product_id',$prod_id)->get();
    	DB::table("product_attributes")->whereIn('product_id',explode(",",$prod_id))->delete();
    		DB::table("skus")->whereIn('product_id',explode(",",$prod_id))->delete();
    		DB::table("products")->where('id',$prod_id)->delete();
    		// $skus->delete();


    	
    	
    	return redirect('admin/products')->with('success', "Success! Details are deleted successfully");
    }
	
	
	public function new_sale_products(){
		
		$pageTitle="New Sale Products";
		return view('frontend.sales_products', compact('pageTitle'));
		
	}

}
