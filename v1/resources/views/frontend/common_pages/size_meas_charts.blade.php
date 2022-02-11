@if($Categories->count()>0)
	
@if( !empty($Categories->measurement_chart) || !empty($Categories->size_chart) )
<div class="row">
<div class="col-2 pr-0">
<p class="mt-2 label">SIZE CHART</p>
</div>
<div class="col-1">
<p class="mt-2">:</p>
</div>
<div class="col-9">
<div class="row">
    
@if(!empty($Categories->measurement_chart) )
<div class="col-5">
<div class="size-chart-trigger">
<span class="size-chart-link"><a href="#" data-toggle="modal" data-target="#sizeChartModal" class="btn btn-buy btn-sm p-0" >Measurements Chart <i class="fa fa-info-circle fa-1" aria-hidden="true"></i></a></span>
</div>
</div>
@endif

@if(!empty($Categories->size_chart) )
<div class="col-4">
<div class="size-chart-trigger">
<span class="size-chart-link"><a href="#" data-toggle="modal" data-target="#sizeChartModa" class="btn btn-buy btn-sm p-0" >Size Chart <i class="fa fa-info-circle fa-1" aria-hidden="true"></i></a></span>
</div>
</div>
@endif

</div>
</div>
</div>




<!-- SIZE CHART MODAL : BEGIN -->
	<div class="modal fade" id="sizeChartModal" tabindex="-1" role="dialog" aria-labelledby="sizeChartModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title" id="myModalLabel">Measurements Chart</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
					<img src="{{URL::to('assets/uploads/categories/'.$Categories->measurement_chart??'')}}" style="width: 100%;" alt="Size Measurements" title="Size Measurements">
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- SIZE CHART MODAL : END -->


 <!-- Modal -->
  <div class="modal fade" id="sizeChartModa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-align-center">
		 <h4 class="modal-title">Standard Size Measurements<br>(in Inches)</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
        </div>
        <div class="modal-body">
          <div class="row">
					<div class="col-md-12">
					<img src="{{URL::to('assets/uploads/categories/'.$Categories->	size_chart??'')}}" style="width: 100%;" alt="Size Measurements" title="Size Measurements">
					</div>
				</div>
          <div class="text-align-center seeDetails-message"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@else
@endif
@endif