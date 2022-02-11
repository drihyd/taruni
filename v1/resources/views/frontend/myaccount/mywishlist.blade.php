@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')

@php			
use App\Models\Products;
@endphp
<section class="my-account-sec">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
          <div class="my-account-area">
            
            
@include('frontend.myaccount.mysidebar')
            
            <div id="account-details-area">
              
              <div id="account-menu-toggle" class="btn btn-custom btn-brand btn-sm" href="#my-account-menu"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</div>
              
                  <h2 class="smaller section-title">My Wishlist</h2>

@if($wishlists->count()==0)

<div class="row">
          <div class="col-sm-12 text-center">
            
          
          <div id="products-area" style="min-height: 50px; margin-top: 50px;">
            
            <div class="text-align-center padding-bottom-30">
              
              <p>Oops! Seems like your closet is empty.<br>Add your favorite outfits now, buy them later.</p>
              <a href="{{ URL('/')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Continue Shopping</a>
            </div>
            
          </div> <!-- ./products-area -->
          
      
          </div>
        </div>

@else
      <div class="row ">
       @if($wishlists)
      @foreach ($wishlists as $product)
      @php
      $price=$product['images'][0]->pprice??0;
      @endphp

      @if($price>0)
      
  
  
              <div class="col-sm-4 col-6">                  
                <div class="product-wrapper">
				
				
				
				
				
                     
                <a href="{{ URL('/product/'.$product->pslug)}}">
                  <div class="text-center product-img">
                    <img src="{{ URL('/public/'.Products::is_photo_exist($product->pcode,1,$product->product_upload_path,'large')) }}" alt="{{Str::ucfirst($product->pname)}}" class="img-fluid">
          
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

                                
            </div> <!-- ./account-details-area -->

            @endif
            
          </div>
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection