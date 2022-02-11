@extends('frontend.template_v1')
@section('title', 'Payment failed')
@section('content')
<section>
<div class="container">
<div class="col-sm-12 p-0">



	
	
	
	
	<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fas fa-times" style="color:red;"></i></div>
            </div>
            <div class="content">
               <h2 class="card-title pt-2 mb-3">@yield('title')</h2>
               <p>
					The payment transaction failed. Please try again later.
					</p>
               <a href="{{url('/myorders')}}" class=" btn btn-brand mt-4">Go to Purchase history</a>
            </div>
            
         </div>
      </div>
   </div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>

</div>
</div>
</section>
@endsection