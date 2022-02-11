
<form action="{{ route('products.search') }}" method="post" accept-charset="utf-8" id="ajaxfilter" onsubmit="return false">
@csrf
    <div id="product-fliter">
     
    
    <nav id="sidebar">
        <div id="accordion">
		
		
		@if(isset($Product_Attributes) && $Product_Attributes->count()>0)
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Fabric
                        </button>
                      </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="filter-more-card">
						  
						  
						 
						  @foreach($Product_Attributes as $key=>$value)
						  
						  @if($value)
                          <div class="form-check mb-2">
                            <input autocomplete="off" name="fabrics[]" type="checkbox" class="form-check-input filled-in" value="{{$value->varinat_value??''}}" autocomplete="off">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">{{$value->varinat_value??''}}</label>
                          </div>
						  @endif
						  
						  
						  @endforeach
                          
					</div>
				
			
@if($Product_Attributes->count()>5)
<div>
<a class="filter-more">More <i class="fas fa-chevron-down icon-small"></i></a>
</div>

@endif
						  
						  
                      </div>
                    </div>
                  </div>
				  
				  
				  @endif
				  
				  
				  
				  
				  
				  
				  
				  
				  
			
						  
						  
						  
						  @if(isset($Product_colors) && $Product_colors->count()>0)
                    <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          Color
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                          <div class="color-filter-more-card">
						  
						  @foreach($Product_colors as $key=>$value)
						  
						  @if($value)
             
						  
						  
						   <div class="form-check mb-2">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="new" value="{{$value->varinat_value??''}}" autocomplete="off">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">{{$value->varinat_value??''}}</label>
                          </div>
						  
						  @endif
						  
						  
						  @endforeach
                          
					</div>
						@if($Product_colors->count()>5)
						<div>
						<a class="color-filter-more">More <i class="fas fa-chevron-down icon-small"></i></a>
						</div>
						@endif
											
						  
						  
						  
						  
                      </div>
                    </div>
                  </div>
				  
				  
				  @endif
						  
						  
						  
				




<!-- Work-->

@if(isset($Product_Workmanship) && $Product_Workmanship->count()>0)
<div class="card">
<div class="card-header" id="headingWork">
<h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseWork" aria-expanded="true" aria-controls="collapseWork">
Work
</button>
</h5>
</div>
<div id="collapseWork" class="collapse" aria-labelledby="headingWork" data-parent="#accordion">
<div class="card-body">
<div class="filter-more-card">
@foreach($Product_Workmanship as $key=>$value)
@if($value)
<div class="form-check mb-2">
<input autocomplete="off" name="workmanship[]" type="checkbox" class="form-check-input filled-in" value="{{$value->varinat_value??''}}" autocomplete="off">
<label class="form-check-label small text-uppercase card-link-secondary" for="new">{{$value->varinat_value??''}}</label>
</div>
@endif
@endforeach
</div>

@if($Product_Workmanship->count()>5)
<div>
<a class="filter-more">More <i class="fas fa-chevron-down icon-small"></i></a>
</div>
@endif


</div>
</div>
</div>
@endif


<!--- End --->				
						  
						  
						  
						  
						  
						  
						  
						  
						  
						  
               
						  

            													
            
        	  
						  
		 		  
           
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  Price Range
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
            
				  
				  
				   <input type="text" id="rangePrimary" class="js-range-slider s_update" name="my_range" value="" />
				  
				  
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  Size
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
               <div class="filter-wrapper">
                <div class="btn-group size-filter filter-checkboxes-2" data-toggle="buttons">
				
	
					
					 @include('frontend.populated_sizes',["Categories"=>$Categories])

					
                </div>                
              </div>
              </div>
            </div>
          </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
    
          <button type="button" id="sidebarCollapse" class="btn btn-togglebar">
              <span>FILTER</span>
          </button>
      </div>
    </nav>
           
                      
                  
                   
    </div>
    <input type="hidden" name="cat_slug" id="cat_slug" value="{{$catslug}}"/>

</form>