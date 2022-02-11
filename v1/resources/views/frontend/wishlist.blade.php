@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
      <div class="container">	
			<h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
			<div class="row">

	



			@if($wishlists)
			@foreach ($wishlists as $product)
			@php
			$price=$product['images'][0]->pprice??0;
			@endphp

			@if($price>0)
			
              <div class="col-sm-3 col-6">                  
                <div class="product-wrapper">
				             
                <a href="{{ URL('/product/'.$product->pslug)}}">
                  <div class="text-center product-img">
                    <img src="{{env('BASE_URL').$product->pcode.'_dp.jpg'}}" alt="{{Str::ucfirst($product->pname)}}" class="img-fluid">
					
                  </div>
                  <p class="text-black mt-3"><b>INR {{$price}}/-</b></p>
                  <p class="small">{{Str::ucfirst($product->pname)}}</p>
                  
                </a>
                <div class="cartwish-select">
                    <a href="{{ URL('/product/'.$product->pslug)}}"><i class="fas fa-shopping-cart float-left"></i></a>
                    <a href="{{ route('wishlist.destroy', Crypt::encryptString($product->wid))}}"><i class="fas fa-trash float-right"></i></a>
                </div>           
                </div>		
           
			   </div>
			
			 			   

			  @else
			   @endif
			  @endforeach
			  @else			  
			  @endif



			
			  
        
		 </div>
          
       
      </div>
    </section>
@endsection