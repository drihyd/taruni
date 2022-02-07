<?php

namespace App\Http\Controllers;
use App\Models\ImportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Categories;
use App\Models\Temp_Products;
use App\Models\Products;
use App\Models\Sku;
use App\Models\Product_Attributes;
use App\Models\AttributesMaster;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use DB;
use Carbon;




class ImportExportController extends Controller
{
	
	

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExportView(Request $request)
    {
   
		
		if($request->cat) {
		$cat_id=Crypt::decryptString($request->cat);
		$temp_products=Temp_Products::select('*')->where('category_id',$cat_id)->get();
	
		$cat_info = Categories::find($cat_id);
		if($cat_info)
		{
			$pageTitle="Import ". Str::ucfirst($cat_info->name??'NA') ." Products";	
			$categoryid=$cat_id;
			$product_upload_path=$cat_info->product_upload_path;
			
			if($this->check_data_validation($categoryid))
			{
			 return view('admin.import_export.import',compact('pageTitle','categoryid','temp_products','product_upload_path'));
			}
			else{
				return view('admin.import_export.import',compact('pageTitle','categoryid','temp_products','product_upload_path'));
			}
		}
		else{
			return redirect('admin/categories')->with('error', 'Category not found.');
		}
		}
		else{
			return redirect('admin/categories')->with('error', 'Please check category selection.');
		}
	
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
function check_sku_code_pattern($skucode=false){
		if (strpos($skucode,'-') !== false) {			
			 $json_encode_data=array(
            "status"=>'no'
        );
       return "";
	} 
	else {		
		    $json_encode_data=array(
            "status"=>'yes'
        );
        return $status="'There was NO - in the [$skucode] SKU Code";
	}	
}
function is_category_valid($cat_id=false,$table_Pk_ID=false)
{
    $cat_info = Categories::find($cat_id);
    if($cat_info->count()==0){
        $json_encode_data=array(
            "status"=>'yes',
            "ID"=>0
        );
        return $status="This category [$cat_info->name] does not exist.";
    }
    else{
        $json_encode_data=array(
            "status"=>'no',
            "ID"=>$cat_info->id
        );
       return "";
    }   
}




public function alpha_dash_space($str)
{
    return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
} 

public function is_price_empty($price)
{
    if(is_null($price) || $price==0 || $price<0){
		
		$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="Price is not valid.";
	}
	else{
		 $json_encode_data=array(
            "status"=>'no',   
        );
       return "";
	}
} 

public function is_sale_no_yes($val=null)
{

	if((string)(int)$val == $val) {
			$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="yes or no values. var is an integer or a string representation of an integer";
	}
else{
		
		
    if(is_string($val) && ($val=="Yes" || $val=="No" || $val=="yes" || $val=="no" || $val=="YES" || $val=="NO")){
		
		$json_encode_data=array(
		"status"=>'no',  
		);
		return "";
	
	}
	else{
		$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="Allow either yes or no values.";
	}
	
}
} 


public function is_sale_price_greater_actual_price($sale_price=null,$actal_price=null)
{		
    if($sale_price<$actal_price){		
		$json_encode_data=array(
		"status"=>'no',  
		);
		return "";
	
	}
	else{
		$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="Sale INR Price not greaterthan with actual INR price";
	}
} 

public function is_sale_price_greater_actual_price_usd($sale_price=null,$actal_price=null)
{		
    if($sale_price<$actal_price){		
		$json_encode_data=array(
		"status"=>'no',  
		);
		return "";
	
	}
	else{
		$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="Sale USD Price not greaterthan with actual USD price";
	}
} 



public function check_photo($val='',$sequence=1,$cat_folder='',$thumb_large_folder='large')
{
	$filename = str_replace(' ', '_', $val);
	
	
	
	if (file_exists( public_path() . "/products/$cat_folder/$thumb_large_folder/".$filename."_$sequence.jpg") || file_exists( public_path() . "/products/$cat_folder/$thumb_large_folder/".$filename."_$sequence.png")) {

			$json_encode_data=array(
		"status"=>'no',  
		);
		return "";

		} else {		
				$json_encode_data=array(
            "status"=>'yes',    
        );
        return $status="Image not available in the server.";
		}	
}


function actual_color_verification($color=false)
{	
  	$A_color=DB::table('attributes_masters')
   ->select('id','name')                
   ->where(DB::raw('lower(name)'), '=',strtolower($color))
   ->get();   

    if($A_color->count()==0){
        
        /*
        $json_encode_data=array(
            "status"=>'yes',
        );
        return $status="This Color [$color] does not match with database colors.";
        */
        
        
            $json_encode_data=array(
            "status"=>'no',          
        );
       return "";
        
    }
    else{
        $json_encode_data=array(
            "status"=>'no',          
        );
       return "";
    }   
}


function actual_wrok_verification($work=false)
{	
  	$A_color=DB::table('attributes_masters')
   ->select('id','name')                
   ->where(DB::raw('lower(name)'), '=',strtolower($work))
   ->get();   

    if($A_color->count()==0){
        $json_encode_data=array(
            "status"=>'yes',
        );
        return $status="This Wrok [$work] does not match with database colors.";
    }
    else{
        $json_encode_data=array(
            "status"=>'no',          
        );
       return "";
    }   
}


public function check_data_validation($cat_id=null){
	
	
	$cat_info = Categories::find($cat_id);
	$product_upload_path=$cat_info->product_upload_path;
	
	
	$temp_cat_records=Temp_Products::select('*')->where('category_id',$cat_id)->get();

	 foreach($temp_cat_records as $key => $value) {
		 
		
	

		

		$orderlist="";
		$status="";
        $product_code=$this->alpha_dash_space($value->code);		
        if($product_code!=1) {
                $status.="<li>Product code is not valid.</li>";
            }     
     
        $cat_response=$this->is_category_valid($value->category_id,$value->id); 
        if(isset($cat_response) && !empty($cat_response)){
            $status.="<li>".$cat_response."</li>";
        }

        $price_inr_empty=$this->is_price_empty($value->price_inr); 
        if(isset($price_inr_empty) && !empty($price_inr_empty)){
            $status.="<li>".$price_inr_empty."[INR]</li>";
        }	

        $price_usd_empty=$this->is_price_empty($value->price_usd); 
        if(isset($price_usd_empty) && !empty($price_usd_empty)){
            $status.="<li>".$price_usd_empty."[USD]</li>";
        }			



        $is_sale_no_yes=$this->is_sale_no_yes($value->on_sale); 
        if(isset($is_sale_no_yes) && !empty($is_sale_no_yes)){
            $status.="<li>".$is_sale_no_yes."</li>";
        }	      

		$check_sku_code_pattern=$this->check_sku_code_pattern($value->sku_code); 
        if(isset($check_sku_code_pattern) && !empty($check_sku_code_pattern)){
            $status.="<li>".$check_sku_code_pattern."</li>";
        }	
		
		
		
		
		
		 $is_sale_price_greater_actual_price=$this->is_sale_price_greater_actual_price($value->on_sale_price,$value->price_inr); 
        if(isset($is_sale_price_greater_actual_price) && !empty($is_sale_price_greater_actual_price)){
            $status.="<li>".$is_sale_price_greater_actual_price."</li>";
        }
			

		$is_sale_price_greater_actual_price_usd=$this->is_sale_price_greater_actual_price_usd($value->on_sale_price_usd,$value->price_usd); 
        if(isset($is_sale_price_greater_actual_price_usd) && !empty($is_sale_price_greater_actual_price_usd)){
            $status.="<li>".$is_sale_price_greater_actual_price_usd."</li>";
        }
		
		$check_photo=$this->check_photo($value->code,1,$product_upload_path,'thumbnails'); 
        if(isset($check_photo) && !empty($check_photo)){
            //$status.="<li>".$check_photo."</li>";
        }
		
		$encode_attributes=json_decode($value->attribute_1,true);
		/*
		if (\Illuminate\Support\Arr::has($encode_attributes,'color')) {
		$color_verification=$this->actual_color_verification($encode_attributes['color']); 
		if(isset($color_verification) && !empty($color_verification)){
		$status.="<li>".$color_verification."</li>";
		}	

		} else {

		}
		*/
		
	/*	
		if (\Illuminate\Support\Arr::has($encode_attributes,'work')) {
		$work_verification=$this->actual_work_verification($encode_attributes['work']); 
		if(isset($work_verification) && !empty($work_verification)){
		$status.="<li>".$work_verification."</li>";
		}	

		} else {

		}
*/
		
		
		

            if(!empty($status)) {  			
            $orderlist.="<ul>";
            $orderlist.=$status;
            $orderlist.="</ul>";
			$error_update = DB::table('temp_products')
			->where('id', $value->id)	
			->update(['is_error' =>$orderlist]);		
        }
        else{			
			$error_update = DB::table('temp_products')
			->where('id', $value->id)	
			->update(['is_error' =>NULL]);
        } 
    }	
	//return $status;	

}
public function import(Request $request) 
    {
		
		
		if($request->hasFile('file')) {

		if($request->categoryid){			
		$this->remove_old_categories($request->categoryid);			
		$data = [
		'category_id' =>$request->categoryid, 
		// other data here
		];
        Excel::import(new ProductsImport($data),$request->file('file')); 
		$this->check_data_validation($request->categoryid);
		return redirect('admin/import-export-view?cat='.Crypt::encryptString($request->categoryid))->with('success', 'Successfully imported excel data. ');
		}
		else{
		return redirect('admin/categories')->with('error', 'Something went wrong. Try again import products.');
		}
		
		
}
else{
		return redirect('admin/import-export-view?cat='.Crypt::encryptString($request->categoryid))->with('error', 'File is missing. Try again import products.');

	
}
    }
	
	public function remove_old_categories($cat_id=null){		
		
		$temp_cat_records=Temp_Products::select('id')->where('category_id', $cat_id)->get()->count();
		if($temp_cat_records>0){		
			$remove=DB::table('temp_products')
			->where('category_id',$cat_id)
			->delete();	
		}			
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
     * @param  \App\Models\ImportExport  $importExport
     * @return \Illuminate\Http\Response
     */
    public function show(ImportExport $importExport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImportExport  $importExport
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportExport $importExport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImportExport  $importExport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportExport $importExport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImportExport  $importExport
     * @return \Illuminate\Http\Response
     */

	
	 public function destroy($id)
    {


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Temp_Products::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Imported Products Deleted successfully."]);
    }
	
	
	public function migrateAll(Request $request){
		
		
	
		if($request->ids){
		 $ids = $request->ids;
		 $this->move_temp_actual_products($ids);
		 
		 //$this->update_productid_with_product_code();
		  return response()->json(['success'=>"Imported Products Migrate successfully."]);
		}
		else{
			return response()->json(['error'=>"Migration process failed. Please try again."]);
		} 
				
	
	
	
	}
	
	
		
	public function insert_products_attributes_table($temp_products){
		
		$category_id=$temp_products->category_id;	
		$cat_info=Categories::find($category_id);
		if(isset($cat_info->applicable_attributes))
		{
			$applicable_attributes=json_decode($cat_info->applicable_attributes);
			$attributes=json_decode($temp_products->attribute_1,true);
		}
		
	


		
		foreach($applicable_attributes as $key=>$value){	
			$isexistsku=$this->isexist_attribute_ofprdouct($temp_products->code,$temp_products->category_id,$value);

			
			/* Add Or Update attribute Data */
		if($isexistsku==0){				
 			$attribute_add = DB::table('product_attributes')
			->insert([
			'category_id' => $temp_products->category_id,
			'product_code' => $temp_products->code,			
			'variant_name' => $value,				
			'varinat_value' => $attributes[$value],					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);		

			
			}
			else if($isexistsku==1){
				
			$attribute_update = DB::table('product_attributes')
			->where('product_code', $temp_products->code)
			->where('category_id', $temp_products->category_id)
			->where('variant_name', $value)
			->update(						
					[
					'category_id' => $temp_products->category_id,
					'product_code' => $temp_products->code,			
					'variant_name' => $value,				
					'varinat_value' => $attributes[$value],			
					'updated_at' => Carbon\Carbon::now(),
					]			
				);
				
		
				
			}
			
			else if($isexistsku==2){			
				
			$deletesku=Product_Attributes::where('category_id',$temp_products->category_id)->where("product_code",$temp_products->code)->where("variant_name",$value)->delete();
			
		 	$attribute_add = DB::table('product_attributes')
			->insert([
			'category_id' => $temp_products->category_id,
			'product_code' => $temp_products->code,			
			'variant_name' => $value,				
			'varinat_value' => $attributes[$value],					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);	

				
			}
			else{
				
			}
			
			
			
		}
			
	}
	
	
	public function update_productid_actual_table($temp_products){
		
		$this->update_productid_with_product_code($temp_products->code);
	}
	
	public function remove_temp_table_products($temp_products){
		
		$id = $temp_products->id;
        Temp_Products::whereIn('id',explode(",",$id))->delete();       
	}
	
	public function move_temp_actual_products($ids){
		
		$temp_products=Temp_Products::query()
		->whereIn('id',explode(",",$ids))
        ->get()
        ->each(function (Temp_Products $temp_products) {
			$this->insert_into_products_table($temp_products);			
			$this->insert_products_attributes_table($temp_products);
			$this->update_productid_actual_table($temp_products);
			$this->remove_temp_table_products($temp_products);
			
        }); 
		
		
		
	}
	
	public function skus_add_update_table($temp_products=null){
		
		$isexistsku=$this->isexist_skuofprdouct($temp_products->code,$temp_products->category_id,$temp_products->sku_code);
		
		/* Add Or Update SKU Data */
		if($isexistsku==0){				
 			$sku_add = DB::table('skus')
			->insert([
			'cat_id' => $temp_products->category_id,
			'variant' => $temp_products->variant,
			'variant_value' => $temp_products->variant_name,	
			'child_variant_value' => $temp_products->child_variant,			
			'product_code' => $temp_products->code,		
			'sku_code' => $temp_products->sku_code,		
			'stock' => $temp_products->stock_total,		
			'price_inr' => $temp_products->price_inr,		
			'price_usd' => $temp_products->price_usd,	
			'on_sale' => $temp_products->on_sale,
			'on_sale_price_inr' => $temp_products->on_sale_price,			
			'on_sale_price_usd' => $temp_products->on_sale_price_usd,					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);		

			
			}
			else if($isexistsku==1){
				
			$sku_update = DB::table('skus')
			->where('product_code', $temp_products->code)
			->where('cat_id', $temp_products->category_id)
			->where('sku_code', $temp_products->sku_code)
			->update(						
					[
					'variant' => $temp_products->variant,
					'variant_value' => $temp_products->variant_name,	
					'child_variant_value' => $temp_products->child_variant,				
					'product_code' => $temp_products->code,		
					'sku_code' => $temp_products->sku_code,		
					'stock' => $temp_products->stock_total,		
					'price_inr' => $temp_products->price_inr,		
					'price_usd' => $temp_products->price_usd,	
					'on_sale' => $temp_products->on_sale,
					'on_sale_price_inr' => $temp_products->on_sale_price,			
					'on_sale_price_usd' => $temp_products->on_sale_price_usd,					
					]			
				);
				
				/* Verifying stock is morethan existing stock */
				$this->is_stock_morethan_existstock($temp_products->code,$temp_products->category_id,$temp_products->sku_code,$temp_products->stock_total);
				
			}
			
			else if($isexistsku==2){			
				
			$deletesku=Sku::where('cat_id',$temp_products->category_id)->where("product_code",$temp_products->code)->where("sku_code",$temp_products->sku_code)->delete();
			
		 	$sku_add = DB::table('skus')
			->insert([
			'cat_id' => $temp_products->category_id,
			'variant' => $temp_products->variant,
			'variant_value' => $temp_products->variant_name,	
			'child_variant_value' => $temp_products->child_variant,			
			'product_code' => $temp_products->code,		
			'sku_code' => $temp_products->sku_code,		
			'stock' => $temp_products->stock_total,		
			'price_inr' => $temp_products->price_inr,		
			'price_usd' => $temp_products->price_usd,	
			'on_sale' => $temp_products->on_sale,
			'on_sale_price_inr' => $temp_products->on_sale_price,			
			'on_sale_price_usd' => $temp_products->on_sale_price_usd,					
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);	

				
			}
			else{
				
			}
		
		
	}
	

	
	public function insert_into_products_table($temp_products){
		
			$isexistproduct=$this->isexist_productofcategory($temp_products->code,$temp_products->category_id);
			
			if($isexistproduct==0){				
 			$product_add = DB::table('products')
			->insert([
			'name' => $temp_products->product_name,
			'slug' => $temp_products->product_slug,
			'code' => $temp_products->code,
			'newarrival' => 'yes',
			'desc' => $temp_products->description,
			'cat_id' => $temp_products->category_id,
			'subcat_id' => $temp_products->subcategory_id,
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);			
			$this->skus_add_update_table($temp_products);
			
			}
			else if($isexistproduct==1){
				
			$product_update = DB::table('products')
			->where('code', $temp_products->code)
			->where('cat_id', $temp_products->category_id)
			->update(						
					[
					'name' => $temp_products->product_name,
					'slug' => $temp_products->product_slug,
					'code' => $temp_products->code,
					'newarrival' => 'yes',
					'desc' => $temp_products->description,					
					'cat_id' => $temp_products->category_id,
					'subcat_id' => $temp_products->subcategory_id,
					]			
				);
				
				$this->skus_add_update_table($temp_products);
				
			}
			
			else if($isexistproduct==2){			
				
			$deleteproduct=Products::where('cat_id',$temp_products->category_id)->where("code",$temp_products->code)->delete();
			
			$product_add = DB::table('products')
			->insert([
			'name' => $temp_products->product_name,
			'slug' => $temp_products->product_slug,
			'code' => $temp_products->code,
			'newarrival' => 'yes',
			'desc' => $temp_products->description,
			'cat_id' => $temp_products->category_id,
			'subcat_id' => $temp_products->subcategory_id,
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
			]);
			
			$this->skus_add_update_table($temp_products);
				
			}
			else{
				
			}
					
	}	
	public function isexist_productofcategory($pcode,$categoryid){
		
		$cat_products = Products::select('id')->where('code',$pcode)->where("cat_id",$categoryid)->get();
		$count=$cat_products->count();
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
	
	public function isexist_skuofprdouct($product_code,$categoryid,$sku_code){
	
		$sku_product= Sku::select('id')->where('sku_code',$sku_code)->where('product_code',$product_code)->where("cat_id",$categoryid)->get();
		$count=$sku_product->count();
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
	
	
	public function product_export_download(Request $request){
		
				
		if($request->cat) {
		$cat_id=Crypt::decryptString($request->cat);
		$temp_products=Temp_Products::select('*')->where('category_id',$cat_id)->get();
		
		$cat_info = Categories::find($cat_id);
		if($cat_info)
		{
			$pageTitle="Download Sample ". Str::ucfirst($cat_info->name??'NA') ." Products";	
			$categoryid=$cat_id;
			
			//return (new ProductsImport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
				$data = [
				'category_attributes' =>$cat_info->applicable_attributes, 
				'category_id' =>$cat_id,
				// other data here
				];
			return Excel::download(new ProductsExport($data), "$cat_info->name.xlsx");
		   
		    //return Excel::download(new ProductsExport, 'invoices.xlsx');
		   //return Excel::download(new ProductsExport , $cat_info->name.'.xls');
			// return view('admin.import_export.import',compact('pageTitle','categoryid','temp_products'));
			
		}
		else{
			//return redirect('admin/categories')->with('error', 'Category not found.');
		}
		}
		else{
			//return redirect('admin/categories')->with('error', 'Please check category selection.');
		}
	}	
	
	
	public function update_productid_with_product_code($product_code=NULL){
		
		
		
		
		$products=Products::select('code','cat_id','id')->where('code',$product_code)->get();
		
		
		if($products){
		foreach($products as $key=>$value){
			
			
			/* Update product id in sku table according product code */
			
			if(!empty($value->code)) 
			{
			$product_update = DB::table('skus')
			->where('product_code',$value->code)
			->where('cat_id', $value->cat_id)
			->update(						
			[
			'product_id' => $value->id,
			'updated_at' => Carbon\Carbon::now(),
			]			
			);
				
		
				
			$product_update = DB::table('product_attributes')
			->where('product_code', $value->code)
			->where('category_id', $value->cat_id)
			->update(						
					[
					'product_id' => $value->id,
					'updated_at' => Carbon\Carbon::now(),
					]			
				);
				
			}
				
		
		}
		
		}
	
		
	}
	
	
	
public function is_stock_morethan_existstock($product_code=false,$cat_id=false,$sku_code=false,$newstock=false)
	{
		$sku_stock= Sku::select('id','stock')
		->where('product_code', $product_code)
		->where('cat_id', $cat_id)
		->where('sku_code', $sku_code)		
		->get()->first();		
		$existing_stock=$sku_stock->stock??0;		
		if($newstock>$existing_stock){
			/* Update Date Time in SKU table if stock update more than existing stock */
			$sku_update = DB::table('skus')
			->where('product_code', $product_code)
			->where('cat_id', $cat_id)
			->where('sku_code', $sku_code)
			->update(						
				[				
					'updated_at' => Carbon\Carbon::now()
				]			
			);	
			
			
			
			
			/* Update Date Time in Product table if stock update more than existing stock */
			
			
			$product_update = DB::table('products')
			->where('code',$product_code)
			->where('cat_id',$cat_id)
			->update(						
				[	
					'updated_at' => Carbon\Carbon::now()
				]			
			);
			
		}
		else{
			
		}			
	}
	
	
}
