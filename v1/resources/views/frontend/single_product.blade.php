@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')


<section >
<div class="container pl-sm-0">	 
	  
	  

	   
	   {{ Breadcrumbs::render('singlproduct', $sku_code??'', $Categories??'') }}
	  
        <div class="row">
		
		
		
	


		
		
		
          <div class="col-sm-6">		  
		 
         @include('frontend.common_pages.product_zoom_gallery')
		 
		 
          </div>
		  
		  
          <div class="col-sm-6" >
		  
		  
		  @if($Products)
			@foreach ($Products as $product)
  		  
            <div class="product-details-wrapper" >
			<h4 class="product-title">{{Str::ucfirst($product_desc)??''}}</h4>
              <p class="mb-1" style="color:#000;">Product Code: {{Str::ucfirst($product->sku_code)}}</p>
              <h3 class="product-price">{{session()->get('appcurrency')}} 
				@if(isset($product->on_sale))	
				@if($product->on_sale=="Yes")
			<span class="old-sale-price">{{$product->pprice}}</span>
			<span class="new-sale-price">{{$product->psaleprice}}</span>
				@else
					<span class="new-sale-price">{{$product->pprice}}</span>
				@endif
			@endif
			  
			  </h3>
			  
			  <!--
              <p class="stock-availability">Availability : 
			  @if($Products[0]->pstock>0)
			  <span>In Stock</span>
				@else
			   <span class="text-danger">Out of stock</span>
			  @endif	  
			  
			  </p>
			  -->
			  
			  
              <div class="product-details">
                <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
				@csrf
                  <div class="row mt-4">
                    <div class="col-sm-2 col-4">
                      <p class="label">QUANTITY</p>
                    </div>
                    <div class="col-1">
                      <p>:</p>
                    </div>
                    <div class="col-sm-9 col-5">
                      <input type="number" name="qty" id="qty" class="btn size-btn pl-2 pt-1" value="1" min="1" max="{{$Products[0]->pstock??0}}">
                    </div>
                  </div>
				  
				  
                  <div class="row">
                    <div class="col-sm-2 col-4">
                      <p class="label">SIZE
					  
					  
								
							

							
					  </p>
                    </div>
                    <div class="col-1">
                      <p>:</p>
                    </div>
                    <div class="col-sm-9 col-5">
					
					<div class="btn-group" >
					
				
	
						
@if($Products)				

@foreach ($product->sizes as $key=>$pimg)


@if($key)
<a @if($key==$product_size) style="background-color:black;color:#fff;" @else @endif href="{{ROUTE('product.sku.prices',['slug'=>$product->pslug,'size'=>$pimg->variant_value])}}" class="btn size-btn mt-1">


{{Str::upper(str_replace('_', '-',trim($key)))}} 

</a>

@endif

@endforeach	

@else
@endif
						
						
						
						
						
					    
					
					<!--@if($Products)				-->
					<!--@foreach ($Products as $product)-->
					<!--@foreach ($product->images as $pimg)	-->
											
					<!--		<label class="btn size-btn pt-1">-->
					<!--		               -->
					<!--		</label>    -->
											  
					<!--@endforeach			  -->
					<!--@endforeach			  -->
					<!--@else			  -->
					<!--@endif-->
					
					
                    </div>
               
                    </div>
                  </div>
				  

				  @if($product->child_variant_value)
				   <div class="row">
                    <div class="col-sm-3 col-5">
                      <!--<p class="label">ALSO SUIT</p>-->
                    </div>
                 
                    <div class="col-sm-8 col-7">
					 <p class="small text text-danger">*Size {{$product_size??''}} can be altered to {{Str::ucfirst(Str::replace(" OR "," or ",$product->child_variant_value??''))}}</p>
				              
                    </div>
                  </div>
				  
				  @else
				@endif
				  
				  
				  
				  
				  
				  
                 @include('frontend.common_pages.size_meas_charts')
				  
				  
				  
				  
				  
                  <div class="row mt-1">
				  
				
				  
				  

                    <div class="col-sm-2 col-4">
                      <p class="label">COLOR</p>
                    </div>
                    <div class="col-1">
                      <p class="">:</p>
                    </div>
                    <div class="col-sm-9 col-5 mt-1">
					
					
			@if($Products)				
			@foreach ($Products as $product)
			@foreach ($product->attributes as $key=>$pimg)
			@if($key=="color")
			<p class="small text">{{Str::title(str_replace('_', '-',trim($pimg->varinat_value)))}} </p>
			@continue;
			@else
			@endif
			@endforeach	
			@endforeach	
			@else
			@endif

					  
					  
					  
                    </div>
                  </div>
				  
				  @if($Categories->count()>0)
				  
				  
				  @if(!empty($Categories->alteration))
                  <div class="row mt-1">
                    <div class="col-sm-3 col-5 pr-0">
                      <p class="label mb-0">ATTACH SLEEVE?</p>
                    </div>
                    <div class="col-sm-9 col-6">
                      <label class="mr-3">
                        <input type="radio" name="attachSleeves" value="yes" id="attachSleeves" autocomplete="off" class="radio-btn">Yes
                      </label>
                      <label>
                        <input type="radio" name="attachSleeves" value="no" id="attachSleeves" autocomplete="off" class="radio-btn" checked>No
                      </label>
                    </div>
                  </div>
				  @else
				   <input type="hidden" name="attachSleeves" value="no" id="attachSleeves">
				  @endif
				  
				  
				    @if(!empty($Categories->sleeve) )
                  <div class="row">
                    <div class="col-sm-3 col-5">
                      <p class="label mb-0">ALTERATIONS</p>
                    </div>
                    <div class="col-sm-9 col-6">
                      <label class="mr-3">
                        <input type="radio" name="alterations" value="yes" id="alterationsyes" autocomplete="off" class="radio-btn">Yes
                      </label>
                      <label>
                        <input type="radio" name="alterations" value="no" id="alterationsno" autocomplete="off" class="radio-btn" checked>No
                      </label>
                    </div>
                  </div>
				  @else
				  <input type="hidden" name="alterations" value="no" id="alterationsno">
				  @endif
				  
				  
		<ul class="details-list">
				@if($Products)
				@foreach ($product->attributes as $key=>$pimg)
			
			@if($key=="sleeve" || $key=="dress_length") 				
			<li>{{Str::title(str_replace('_', ' ',$key))}} :&nbsp;&nbsp;{{Str::title(str_replace('_', '-',trim($pimg->varinat_value)))}}</li>
			 @continue
			@endif
			
			
				@endforeach
				@else
				@endif
				</ul>
				  
				
				  
				  @endif

                  <div class="submit-btns mt-3">
				  
				  
				  
				    
			  
              <p class="stock-availability">
			  @if($Products[0]->pstock>0)
			  <p class="mb-0 label">IN STOCK: {{$Products[0]->pstock??0}}</p>
				@else
			    Availability : <span class="text-danger">Out of stock</span>
			  @endif	  
			  
			  </p>
			
                 
					

					@if($Products[0]->pstock==0)
						<!--<button type="button" class="btn btn-submit"> Out of stock</button>-->
						@else
					 <button type="button" class="btn btn-submit btn-addtocart addtocartsubmitButton"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                    @endif
					<a href="{{ route('wishlist.store', Crypt::encryptString($product->pid))}}" class="btn btn-submit"><i class="fas fa-heart"></i> Wishlist</a>
                   <!-- <a href="#" class="btn btn-submit">Notify Me</a>-->
					  </div>
					  
					
			

		<input type="hidden" name="productId" value="{{ $product->pid }}">
		
			@if(isset($product->on_sale) && $product->on_sale=="Yes")
		
			<input type="hidden" name="price" id="finalPrice" value="{{ $product->psaleprice != '' ? $product->psaleprice : $product->psaleprice }}">
				@else
				<input type="hidden" name="price" id="finalPrice" value="{{ $product->pprice != '' ? $product->pprice : $product->pprice }}">
			@endif
		
		
		
		<input type="hidden" name="skuid" id="skuid" value="{{ $product->skuid}}">
		<input type="hidden" name="sku" value="{{$product_size}}" >	
		
		<input type="hidden" name="product_weight" id="product_weight" value="{{$Categories->shipping_weight??0}}" >						
                </form>
        
             
             @include('frontend.common_pages.shipping_description')
				
				
				
              </div>
            </div>
			
			
			  @endforeach
			  @else			  
			  @endif
			
          </div>
        </div>
      </div>
    </section>
	
	
	 @include('frontend.product_attributes_info')
	
	
	
	
	
	
	
	<!--
	
	
    <section>
      <div class="container pl-0 pr-0">
        <h3 class="pl-3">Complete your look</h3>
        <div class="look-slider">
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
			  
			  
			  
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-2.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-3.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-4.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
          <div>
            <div class="look-wrapper">
              <div class="cartwish-select">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-heart float-right"></i></a>
              </div>
              <div class="mt-2">
                <img src="{{ URL::to('images/look-1.jpg')}}"" alt="product" class="img-fluid mb-3" width="100%">
              </div>
              <p class="text-black"><b>INR 2500/-</b></p>
              <p class="small">Mustard Linen Silk Anarkali Gold Resham Work and Contrast Banaras Bandini Dupatta</p>
            </div>
          </div>
        </div>
        <div class="shopnow-container text-center mt-3">
          <a href="#" class="shopnow-btn">SHOP NOW</a>
        </div>
      </div>
    </section>
    -->
	
	
@if($Recomended_Products)
<section>
<div class="container pl-0 pr-0">
<h3 class="pl-3">Products You May Also Like</h3>
<div class="newarrivals-slider mt-4">	
@include('frontend.recommended_products')
</div>
<div class="shopnow-container text-center mt-3">
<a href="#" class="shopnow-btn">SHOP NOW</a>
</div>
</div>
	
</div>
</section>

@endif
    
    
@if($recently_viewed)  
<section>
<div class="container pl-0 pr-0">
<h3 class="pl-3">Recently Viewed</h3>
<div class="newarrivals-slider mt-4">	
@include('frontend.products_strips',$recently_viewed)	 
</div>
<div class="shopnow-container text-center mt-3">
<a href="#" class="shopnow-btn">SHOP NOW</a>
</div>
</div>
</section>
@endif
@endsection




