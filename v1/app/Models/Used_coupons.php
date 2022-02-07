<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Used_coupons extends Model
{
    use HasFactory;
	protected $table = 'used_coupons';
	public $timestamps = true;
	
		protected $fillable = [
'user_id', 
'cart_id', 
'coupon_id', 
'coupon_code', 
'created_at', 
'updated_at'
	];  
}
