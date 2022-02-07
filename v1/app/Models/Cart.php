<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Redirect;

class Cart extends Model
{
    use HasFactory;
	protected $table = 'carts';
	public $timestamps = true;
	
		protected $fillable = [
'session_id', 
'user_id', 
'order_id', 
'checked_out',
'checkout_mode',
'order_number',
'total_amount',
'total_items',
'total_shipping_weight',
'total_shipping_fee',
'cod_fee',
'grand_total', 
'currency', 
'bill_to_name',
'bill_to_email',
'bill_to_phone',
'bill_to_address',
'bill_to_city', 
'bill_to_state',
'bill_to_country',
'bill_to_postalcode', 
'ship_to_name', 
'ship_to_email',
'ship_to_phone',
'ship_to_alt_phone',
'ship_to_address',
'ship_to_city', 
'ship_to_state', 
'ship_to_country', 
'ship_to_country_id', 
'ship_to_state_id', 
'ship_to_city_id', 
'ship_to_postalcode',
'payment_mode',
'gateway_name',
'tax_percentage',
'shipping_rate', 
'shipping_base_price', 
'shipping_cost', 
'shipping_time', 
'shipping_time_id', 
'shipping_rate_id',
'our_hash', 
'clicked_paypal',
'v_ip', 'v_user_agent', 
'v_platform', 
'v_browser', 
'v_is_mobile', 
'v_mobile_type',
'v_is_bot', 
'v_source_url', 
'v_landed_on',
'utm_source',
'utm_medium',
'utm_campaign', 
'utm_term',
'utm_content', 
'v_failed_campaigns',
'guest_checkout',
'went_to_gateway', 
'returned_from_gateway', 
'payment_status', 
'razor_payorderid', 
'order_status', 
'schedule_discount',
'abandoned_coupon_id',
'last_discount_mailer', 
'verified', 
'created_at', 
'updated_at'
	];  
	
	

}
