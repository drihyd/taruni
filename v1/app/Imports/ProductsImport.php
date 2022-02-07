<?php
namespace App\Imports;
use App\Models\Temp_Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Categories;
class ProductsImport implements ToModel,WithStartRow,WithHeadingRow
{
		private $data;
		public function __construct(array $data = [])
		{
			$this->data = $data; 
		}
	
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	public function startRow(): int
    {
        return 2;
    }
	





    public function model(array $row)
    {

		


	$addition_params=$this->data;
	
	if($addition_params['category_id']){		

		
		$category_id=$addition_params['category_id'];	
		$cat_info=Categories::find($category_id);
		$skucodeinfo=Temp_Products::select()->where("category_id",$category_id)->where("code",$row['product_code'])->get();
		$skuseries=$skucodeinfo->COUNT()+1;
		
		if(isset($cat_info->applicable_attributes))
		{
			$applicable_attributes=json_decode($cat_info->applicable_attributes,true);
		}
	
		
		
	$total_attributes=sizeof($applicable_attributes);	
	$aa_array=[];	
	for($no=0;$no<$total_attributes;$no++)
	{
	$aa_array["$applicable_attributes[$no]"]=$row["$applicable_attributes[$no]"];

	}

		

		

	return new Temp_Products(
	[		
	
	'product_name'=> $row['product_name'], 
	'product_slug'=> Str::slug($row['product_code'].$row['product_name']), 
    'code'=> $row['product_code'], 
    'category_id'=> $addition_params['category_id'],
	'subcategory_id'=>0,
    'description'=> $row['product_description'], 
    'variant'=> $row['variant'], 
    'variant_name'=> $row['variant_name'], 
	'child_variant'=> $row['child_variant'], 
    'combination_variant_name'=> $row['combination_variant_name'], 
    'picture'=> $row['picture'], 
    'weight'=> $row['weight'], 
    'product_available'=> $row['product_available'], 
    //'sku_code'=> $cat_info->sku_prefix."-".$row['product_code']."-".$skuseries, 
    'sku_code'=> $row['sku'], 
    'stock_total'=> $row['stock_total']??0, 
    'price_inr'=> $row['buy_price'], 
    'price_usd'=> $row['buy_price_usd'], 
    'on_sale'=> Str::ucfirst(Str::lower($row['on_sale']))??'No', 
    'on_sale_price'=> $row['on_sale_price'], 
    'on_sale_price_usd'=> $row['on_sale_price_usd'], 
	'attribute_1'=> json_encode($aa_array,JSON_UNESCAPED_SLASHES),
	
	]);
	}		
    }
}