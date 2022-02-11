@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
<section class="my-account-sec">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="my-account-area">
@include('frontend.myaccount.mysidebar')
@include('frontend.myaccount.my_single_order_details')
</div>
</div>
</div>
</div>
</div></section>
@endsection