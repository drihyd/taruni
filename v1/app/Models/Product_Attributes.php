<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Attributes extends Model
{
	use HasFactory;
	protected $table = 'product_attributes';		
	protected $guarded=[];
	
}
