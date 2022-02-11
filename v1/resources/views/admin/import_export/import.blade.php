@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@php			
use App\Models\Products;
@endphp
<div class="paddingleftright pt-2 pb-5" >

<div class="float-right">
<a href="{{ url('admin/categories') }}" class="btn btn-brand btn-sm">Back to categories</a>
</div>


<form id="importdata" action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group-sm">
<input type="file" name="file" class="form-control col-md-4">
</div>
<br>
<button type="submit" class="btn btn-sm btn-success submitBtn">Import Data</button>
<input type="hidden" name="categoryid" value="{{$categoryid}}" />
</form>

<div id='file_progress_status'></div>
<div id='action_happend_status'></div>





<div class="row mb-5">
<div class="col-md-12 p-0">
<div class="card card-body bg-light">
<h4><b><u>Instructions:</u></b><br><br> Please Optimize the Image before upload to the server and <strong>the Format should be: A1054499_1.jpg, A1054499_2.jpg, A1054499_1.png, A1054499_2.png</strong></h4>
<p>For Optimizing the Images, Please <a href="https://imagecompressor.com/" target="_blank">Click Here</a></p>

<p>For Upload the Images, Please  <a href="{{URL('admin/bulk_images_upload')}}" target="_blank" >Click Here</a></p>
<br>

<h4 class="text text-danger">
<strong>Note: Please cross check sku code should be with this format: A1054499-1,A1054499-2,A1054499-3,A1054499-4,A1054499-5</strong>
</h4>


</div>

</div>
</div>
 


@if($temp_products->count()>0) 
	
<button style="margin-bottom: 10px;float:right;" class="btn btn-sm btn-danger delete_all full-right" data-url="{{ url('admin/importsDeleteAll') }}">Delete Selected</button>
&nbsp;&nbsp;
<button id="actionhappend" style="float:left;" class="btn btn-sm btn-danger migrate_all full-right" data-url="{{ url('admin/importsMigrateAll') }}">Migrate Selected</button>
 <table  class="table customdatatable" style="width:100%">
               
                      <tr>
					  					   <th  scope="col">S.No.</th>
					  <th scope="col" width="50px"><input type="checkbox" id="master"></th>
					   <th  scope="col">Errors</th>
                        <th scope="col">Prd.Name</th>
                       
						  <th scope="col">Product Code</th>
                        <th scope="col">SKU Code</th>
						<th scope="col">Variant</th>
						<th scope="col">Var.Name</th>
						<th scope="col">Stock</th>
						<th scope="col">Buy Pr. INR</th>
						<th scope="col">Buy Pr. USD</th>
						<th scope="col">Sale Price INR</th>
						<th scope="col">Sale Price USD</th>
						<th scope="col">On sale</th>
						<th scope="col">First Image</th>
						
                        
                      </tr>
             
           
                      @foreach($temp_products as $item)
					  
					   
                  
                      <tr id="tr_{{$item->id}}" class="@if($item->is_error!=NULL) p-3 mb-2 bg-warning text-white @else @endif">
<td>{{ucwords($loop->iteration) }}</td>					 
					 <td>
					  @if(empty($item->is_error))
					  <input type="checkbox" class="sub_chk" data-id="{{$item->id}}">
				  @else
					 <!--<input type="checkbox" class="sub_chk" data-id="{{$item->id}}" >-->
					  @endif
					  
					  </td>
					<td>
					@if(!empty($item->is_error))
					    <a href="#" class="text text-error" data-toggle="tooltip" data-placement="top" title="{!! $item->is_error !!}"><i class="fas fa-info"></i></a>
					@else
						@endif
					
					</td>                         
						 <td>{{ucwords($item->product_name) }}</td>
                          <td>{{$item->code }}</td>
                          <td>{{$item->sku_code}}</td>
						  <td>{{ucwords($item->variant) }}</td>
						  <td>{{ucwords($item->variant_name) }}</td>
						  <td>{{ucwords($item->stock_total) }}</td>
						<td>{{ucwords($item->price_inr) }}</td>
						<td>{{ucwords($item->price_usd) }}</td>						  
						<td>{{ucwords($item->on_sale_price) }}</td>						  
						<td>{{ucwords($item->on_sale_price_usd) }}</td>						  
						<td>{{ucwords($item->on_sale) }}</td>

						<td><img src="{{ URL('/public/'.Products::is_photo_exist($item->code,1,$product_upload_path??'','thumbnails')) }}" width="40" height="40"/>
						</td>						
<!--						  
                          <td>
                         <a href="{{ url('admin/importproducts',$item->id) }}" class="btn btn-danger btn-sm"
                           data-tr="tr_{{$item->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            Delete
                        </a>
                    </td>
					-->
                      </tr>
                 
                      @endforeach
                  
                
              </table>			  
			  @else				  
			  @endif
</div>
@endsection

@push('scripts')
<script>
$('form#importdata').submit(function(e){
	// Stop the form submitting
  	e.preventDefault();	
	$("#file_progress_status").html("<h4 class='text-danger'><strong>Don't click submit button /refresh/close during the upload process.</strong></h4>");
	// Do whatever it is you wish to do
  	//...
  	// Now submit it 
    // Don't use $(this).submit() FFS!
  	// You'll never leave this function & smash the call stack! :D
  	e.currentTarget.submit();
});
</script>


<script>
$('button#actionhappend').submit(function(e){
	// Stop the form submitting
  	e.preventDefault();	
	$("#action_happend_status").html("<h4 class='text-danger'><strong>Your action is in progress. Don't click submit button /refresh/close during the upload process.</strong></h4>");
	// Do whatever it is you wish to do
  	//...
  	// Now submit it 
    // Don't use $(this).submit() FFS!
  	// You'll never leave this function & smash the call stack! :D
  	e.currentTarget.submit();
});
</script>

@endpush

