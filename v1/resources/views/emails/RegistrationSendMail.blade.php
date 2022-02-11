@component('mail::message')
<h1>Registration confirmation</h1>
Dear {{$content['name']??'Hello'}}<br><br>
Congratulations on registering with us. Now you can get all the inside information on the collections and sales! Please login to enjoy shopping with us.
Let's build that perfect wardrobe together, beautiful you!<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
