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
              
                  <h2 class="smaller section-title">My Orders</h2>
@if($orders_data->count()==0)

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
        @foreach($orders_data as $orders)
        <div class="col-sm-12 mb-2">
          
          <div id="cart-area" class="table-responsive cart-container">
            <table class="table cart-table responsive">
              <thead>
                <tr>
                  <th colspan="2">Items (<span id="cart-item-count">{{$orders->total_items}}</span>)</th>
                  <th style="text-align:right;">Total</th>
                </tr>
              </thead>
              <tbody>
                
                                
                @foreach($orders->sub_items as $order_items)
				
					@php									 
					$str_sku = $order_items->sku_code??'';
					$skucode=preg_replace('~ *-.*~', '', $str_sku);
					@endphp
				
                <tr>
                  <td class="product-image-td">
                    <img src="{{ URL('/public/'.Products::is_photo_exist($skucode,1,$order_items->product_upload_path,'thumbnails')) }} " alt="Light Brown With Mirror Work Neck With Gotta Pathi Work Silk Straight Cut Suit" title="Light Brown With Mirror Work Neck With Gotta Pathi Work Silk Straight Cut Suit">
                  </td>
                  <td class="product-details-td" id="cart-item-1">
                    <h3 class="product-title">{{$order_items->pname??''}}</h3>
                    <p class="detail-item">
                      <span class="heading">Size: {{strtoupper($order_items->item_size)??''}}</span>
                      <span class="info"></span>
                    </p>
                    <p class="detail-item">
                      <span class="heading">Alteration:</span>
                      @if($order_items->alterations)
                      <span class="info"><a href="#" class="show-alteration" id="alteration-id-1">
                                                    Yes
                                              </a></span>
                                              @else
                                              <span class="info"><a href="#" class="show-alteration" id="alteration-id-1">
                                                    No
                                              </a></span>
                                              @endif
                    </p>
                    <div class="actions">
                                          </div>
                    
                  </td>
                  <td class="product-price-td">
                    <p class="price price-shown">{{strtoupper($order_items->currency)??''}} {{$order_items->price??''}}/-</p>
                    <!-- p class="price price-striked"><strike>INR . 12, 500/-</strike></p -->
                  </td>
                </tr>
                @endforeach
                                  <tr>
                   <!--  <td>
                      
                        <a href="" >View Details</a>
                      
                    </td> -->
                      
                      <!-- <a href="">
                        <div class="action-item cart-item-remove" id="cart-item-id">Remove</div>
                      </a> -->
    
                  </tr>
                              
              </tbody>

              
            </table>
            <div class="row border-top pt-2 justify-content-between">
              <div class="col-auto">
                @php $orderID= Crypt::encrypt($orders->order_number); @endphp
            <a href="{{url('myorders/'.$orderID)}}" class="">View Details</a>
            </div>
            <div class="col-auto">
            <p><span class="badge @if($orders->order_status=='cancelled' || $orders->order_status=='cancelled-refund-pending' || $orders->order_status=='cancelled-refunded') badge-danger @else badge-success @endif"><strong>Status: </strong>{{ucwords($orders->order_status)??''}}</span></p>
            </div>
          </div>
          
        </div> <!-- ./col -->

        </div> <!-- ./col -->

        @endforeach

                                
            </div> <!-- ./account-details-area -->
            @endif
          </div>
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection