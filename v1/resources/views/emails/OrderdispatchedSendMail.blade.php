@component('mail::message')
# Your order {{$content['order_number']??''}} has dispatched!
Dear {{$content['name']??'Hello'}}<br>
It’s being dispatched with {{$content['shipped_by']??''}}.<br><br>
Here is a tracking number that you can use to check the location of your package: [{{$content['shipped_traking_no']??''}}] <br>
It may take 24-48 hours for the live tracking to reflect on the website. So, please do be patient!<br><br>
#Tracking Details<br>
Tracking Number - {{$content['shipped_traking_no']??''}}<br>
Courier Partner - {{$content['shipped_by']??''}}<br><br>
#Order Details<br>
Order ID: {{$content['order_number']??''}}<br>
Payment Status - {{$content['payment_status']??''}}<br>
Payment mode - {{$content['gateway_name']??''}}<br>
Total Items - {{$content['total_items']??''}}<br>
Total Amount - {{$content['currency']??''}} {{$content['amount']??''}}<br>
Placed Date - {{$content['created_at']??''}}<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent