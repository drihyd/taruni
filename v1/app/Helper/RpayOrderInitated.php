<?php
namespace App\Helper;
use Request;
use App\Models\RpayOrderintity as LogRpayOrderModel;
class RpayOrderInitated
{


    public static function addToLog($logparams=false)
    {
			
    	$log = [];
    	$log['subject'] = $logparams['subject']??'Error';
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 770;
    	$log['cart_id'] =session()->get('cart')??0;
    	$log['razorpay_order_id'] = $logparams['razorpay_order_id']??0;
    	LogRpayOrderModel::create($log);
    }



}