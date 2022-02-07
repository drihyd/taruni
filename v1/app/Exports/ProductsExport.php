<?php
namespace App\Exports;
use App\Models\Temp_Products;
use App\Models\Sku;
use App\Models\Parent_Attributes;
use App\Models\Product_Attributes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\Categories;

class ProductsExport implements FromCollection,WithMapping, WithHeadings
{
	
			private $data;
		public function __construct(array $data = [])
		{
			$this->data = $data; 
		}
    /**
    * @return \Illuminate\Support\Collection
    */
	
	 public function headings(): array
    {
       $addition_params=$this->data;
		
		
		$Parent_Attributes=Parent_Attributes::orderBy('position','ASC')->pluck('slug')->toArray();
		$category_attributes=json_decode($addition_params['category_attributes'])??[];
		$final_heading=array_merge($Parent_Attributes,$category_attributes);


		
        return $final_heading;
    }
	
	public function collection()
    {
		$addition_params=$this->data;
		$category_id=$addition_params['category_id'];
		
			$sku_product= Sku::select('products.id as pid','products.name as pname','products.code as pcode','categories.name as cname','products.desc as pdesc','skus.variant as variant','skus.variant_value as variant_value','skus.child_variant_value as child_variant','skus.price_inr as price_inr','skus.price_usd as price_usd','skus.on_sale as on_sale','skus.on_sale_price_inr as on_sale_price_inr','skus.on_sale_price_usd as on_sale_price_usd','skus.stock as stock','skus.sku_code as sku_code','skus.variant_available as variant_available','skus.weight as weight','skus.picture as picture','skus.color_combo_variant_name as color_combo_variant_name')
			->join('products', 'products.id', '=', 'skus.product_id')
			->join('categories', 'categories.id', '=', 'products.cat_id')	
			->where('products.cat_id',$category_id)			
			->get();			
			
        return $sku_product;
    }
   public function map($skus=null): array
    {
		
		  $addition_params=$this->data;

	
	$product_Attributes=Product_Attributes::where('product_id',$skus->pid)->pluck('varinat_value','variant_name')->toArray();
	
		$category_id=$addition_params['category_id'];	
		$cat_info=Categories::find($category_id);


	if($cat_info->applicable_attributes)
	{
	$applicable_attributes=json_decode($cat_info->applicable_attributes);
	
	}
	else{
		$applicable_attributes=[];
	}
	
	$total_attributes=sizeof($applicable_attributes);
		
	
$aa_array=[];	
for($no=0;$no<$total_attributes;$no++)
{
	$aa_array["$applicable_attributes[$no]"]=$product_Attributes["$applicable_attributes[$no]"]??'';

}


			$sku_product= Sku::select('products.name as pname','products.code as pcode','categories.name as cname','products.desc as pdesc','skus.variant as variant','skus.variant_value as variant_value','skus.child_variant_value as child_variant','skus.price_inr as price_inr','skus.price_usd as price_usd','skus.on_sale as on_sale','skus.on_sale_price_inr as on_sale_price_inr','skus.on_sale_price_usd as on_sale_price_usd','skus.stock as stock','skus.sku_code as sku_code','skus.variant_available as variant_available','skus.weight as weight','skus.picture as picture','skus.color_combo_variant_name as color_combo_variant_name')
			->join('products', 'products.id', '=', 'skus.product_id')
			->join('categories', 'categories.id', '=', 'products.cat_id')	
			->where('products.cat_id',$category_id)				
			->get();

       $fixed_attributes= [
		$skus->pname,
		$skus->pcode,
		$skus->cname,
		$skus->pdesc,
		$skus->variant,
		$skus->variant_value,
		$skus->child_variant,	
		$skus->color_combo_variant_name,
		$skus->picture,
		$skus->weight,
		$skus->variant_available,
		$skus->sku_code,
		$skus->stock,
		$skus->price_inr,
		$skus->price_usd,
		$skus->on_sale,
		$skus->on_sale_price_inr,
		$skus->on_sale_price_usd		
		];
		
		$final_data=array_merge($fixed_attributes,$aa_array);
		
		if($sku_product->count()>0){
		return $final_data;
		}
		else{
			return  [];
		}

	
    }
	

	
	
}
