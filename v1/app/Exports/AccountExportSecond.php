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
use App\Models\Orders;
use Illuminate\Support\Str;

class AccountExportSecond implements FromCollection,WithMapping, WithHeadings
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
		$final_heading=[
		'Order ID',
		'Grand Total',	
		'Bill Amount USD',	
		'Bill Amount INR',	
		'Items',
		'KG',
		'Ship Name',
		'Payment',
		'Date',
		'Ship To',
		'Status',
		'Tracking',
		'Email',
		'Phone No.',
		'Shipping Charges',
		'Net Amount',
		'Action',
		'Payment ID',
		'Transations ID'
		];


		
        return $final_heading;
    }
	
	public function collection()
    {
		$addition_params=$this->data;
		$category_id=$addition_params['category_id']??'';
		$from_date=$addition_params['fd']??'';
		$to_date=$addition_params['td']??'';
		$payment_data=Orders::select('payments.razorpay_order_id as razorpay_order_id','payments.payment_id as payment_id','users.phone as uphone','users.firstname as fn','users.lastname as ln','users.email as uemail','orders.order_number as order_number','orders.grand_total as grand_total','orders.total_shipping_fee as total_shipping_fee','orders.total_items as total_items','orders.ship_to_country as ship_to_country','orders.order_status as order_status','orders.shipped_traking_no as shipped_traking_no','orders.ship_to_name as ship_to_name','orders.created_at as created_at','orders.gateway_name as gateway_name','orders.currency as ocurrency','orders.total_amount as netamount','orders.total_shipping_weight as total_shipping_weight')
		->leftjoin('users','users.id','=','orders.user_id')
		->leftjoin('payments','payments.razorpay_order_id','=','orders.order_id')			
		->OrderBy('orders.created_at','desc')
		->whereDate('orders.created_at', '>=', "$from_date 00:00:00")
		->whereDate('orders.created_at', '<=',"$to_date 23:59:59")
		->get();	
		return $payment_data;
	
    }
   public function map($payment_data=null): array
    {


	if($payment_data->ocurrency=="USD"){						
		$usd_amount=$payment_data->grand_total??0;
	}	
	else if($payment_data->ocurrency=="INR"){						
		$inr_amount=$payment_data->grand_total??0;
	}	
	else{
		$usd_amount=$inr_amount=0;
	}
								
								
		/* Payment data get from the collection function */
		return [
		
		$payment_data->order_number,
		$payment_data->grand_total,
		$usd_amount??0,
		$inr_amount??0,
		$payment_data->total_items,
		$payment_data->total_shipping_weight,
		str::ucfirst($payment_data->ship_to_name),
		str::ucfirst($payment_data->gateway_name),
		date('d-m-yy', strtotime($payment_data->created_at)),
		str::ucfirst($payment_data->ship_to_country),
		str::ucfirst($payment_data->order_status),
		$payment_data->shipped_traking_no,
		$payment_data->uemail,
		$payment_data->uphone,		
		$payment_data->total_shipping_fee,
		$payment_data->netamount,
		"",
		str::ucfirst($payment_data->payment_id),
		str::ucfirst($payment_data->razorpay_order_id)
		

		];

	
    }
	

	
	
}
