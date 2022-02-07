<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
		'user_id',
		'amount',
		'return_response',
		'cart_id',
		'order_number',
		'created_at',
		'updated_at',
		'paypal_currency_type',
		'payment_method',
		'billing_email',
		'billing_phone',
		'paypal_payment_status',
		'razorpay_order_id',
		'entity',
		'amount_paid',
		'amount_due',
		'razorpay_signature',
		
    ];
	
	protected $table = 'payments';
}