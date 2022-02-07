<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_details extends Model
{
    use HasFactory;
	protected $table = 'cart_items';
	public $timestamps = true;
	protected $fillable = [
	'cart_id', 
	'sku_id', 
	'fit_profile_id',
	'item_size',
	'qty',
	'custom',
	'custom_standard',
	'unstitched',
	'unit_price',
	'gst',
	'discount_percentage',
	'price',
	'currency',
	'alterations',
	'alter_sleeves',
	'alter_dress',
	'sleeve_json',
	'created_at',
	'updated_at',
	'item_status',
	'order_number',
	'order_id',
	];  
}
