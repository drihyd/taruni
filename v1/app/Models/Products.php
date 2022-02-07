<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
	protected $guarded = [];	
	public function wishlist(){
	return $this->hasMany(Wishlist::class);
	}
	
	
	static function is_photo_exist($val='',$sequence=1,$cat_folder='',$thumb_large_folder='large')
	{
		
	 $filename = str_replace(' ', '_', $val);
	
		if (file_exists( public_path() . "/products/$cat_folder/$thumb_large_folder/".$filename."_$sequence.jpg") || file_exists( public_path() . "/products/$cat_folder/$thumb_large_folder/".$filename."_$sequence.png")) {

			return "products/$cat_folder/$thumb_large_folder/".$filename."_$sequence.jpg";

		} else {		
			return "products/default.jpg";
		} 
	}
	
	
}
