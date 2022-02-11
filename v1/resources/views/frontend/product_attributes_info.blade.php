<section class="product-details-sec">
		<div class="container">
			
			
			<div class="row">
				<div class="col-xs-12">					
					<div class="product-details-tabs margin-bottom-0">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="#product-details" aria-controls="product-details" role="tab" data-toggle="tab" aria-expanded="true" class="active"><span class="hidden-xs">Product </span>Details</a></li>
							<li role="presentation"><a href="#wash-instructions" aria-controls="wash-instructions" role="tab" data-toggle="tab" aria-expanded="false">Wash<span class="hidden-xs"> Instructions</span></a></li>								
							<li role="presentation"><a href="#return-policy" aria-controls="return-policy" role="tab" data-toggle="tab" aria-expanded="false"><span class="hidden-xs">Cancellation &amp; </span>Exchange</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="product-details">
							
							<div class="row">
				<div class="col-sm-9">	
				<ul class="product-details-list">
				@if($Products)
				@foreach ($product->attributes as $key=>$pimg)
				@if($pimg->varinat_value)
				<li><strong>{{Str::title(str_replace('_', ' ',$key))}}</strong> :&nbsp;&nbsp;{{Str::title(str_replace('_', '-',trim($pimg->varinat_value)))}}</li>
				@endif
				@endforeach
				@else
				@endif
				</ul>
				</div>
				
				<!--
				<div class="col-sm-3">	
					@if($Products)
						<p class="mb-0"><strong>Description</strong></p>
					<p>{{$product->pdesc??''}}</p>
					@else
					@endif
				</div>
				-->
				
				</div>
							


							
								
								
							</div>
							
							
							<div role="tabpanel" class="tab-pane" id="wash-instructions">
								<p>We recommend dry wash for your first wash</p>
							</div>								
							<div role="tabpanel" class="tab-pane container-fluid" id="return-policy">
							

						<h3><strong>{{$cancellation_exchange_data->name??''}}</strong></h3>
						{!!$cancellation_exchange_data->description??''!!}


							</div>
						</div>
					</div> <!-- ./product-details-tabs -->
					
				</div> <!-- ./col -->
			</div> <!-- ./row -->
			
		</div>
	</section>