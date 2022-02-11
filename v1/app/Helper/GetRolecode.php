<?php
namespace App\Helper;
use Request;
use Illuminate\Support\Facades\DB;
class GetRolecode
{
    public static function _getRolecode($logparams=false)
    {
	   	$attributes_data=DB::table('user_types')->select('code')->where('id',$logparams)->get()->first();	
		if($attributes_data){
		return $attributes_data->code??'';
		}
		else{
		return "admin";
		}
    }
}