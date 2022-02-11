@extends('admin.template_v1')
@section('content')

<!-- @include('admin.pagetitle') -->

<div class="paddingleftright">
<div class="m-0 mb-4 row justify-content-between">
			<h3>{{$pageTitle??''}}</h3>
			@if(!isset($theme_options_data->id))
			<div class="">
			<a href="{{url('admin/theme_options/create')}}" class="btn btn-admin btn-sm ">+ Add</a>
			</div>
			@else
 @endif
</div>
</div>
@include('admin.alerts')
@include('admin.errors')
<!-- <div class="bg-light p-3 mb-5 mt-4 card-action">

      <div class="row justify-content-end">
          <div class="col-auto float-right">
              <a href="{{url('admin/theme_options/create')}}" class="btn btn-sm btn-info card-add"><i class="fa fa-plus"></i> Add New</a>
          </div>
      </div>
 </div> -->
 
  <div class="paddingleftright pt-2 pb-5" >
  @if(isset($theme_options_data->id) && !empty($theme_options_data->id))            
 <div class="card border-0">
 	<div class="card-body bg-white">
 		<div class="row">
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Header Logo</h4>
		 			<div class="col">
		 				@if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo)) 
		 				<img src="{{ asset('assets/uploads/' . $theme_options_data->header_logo??'') }}" width="100" />
		 				@else
		 				@endif
		 			</div>
		 		</div><br>
		 		<div class="row form-row">
		 			<h4 class="col-auto">Favicon</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 			<div class="col">
		 				@if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon)) 
		 				<img src="{{ asset('assets/uploads/' . $theme_options_data->favicon??'') }}" width="50" />
		 				@else
		 				@endif
		 			</div>
		 		</div>						 		
		 	</div>
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Copyright</h4>
		 			<div class="col">
		 				{{$theme_options_data->copyright??''}}
		 			</div>
		 		</div><!-- <br>
		 		<div class="row form-row">
		 			<h5 class="col-auto">Footer Address</h5>
		 			<div class="col">
		 				{{$theme_options_data->footer_address??''}}
		 			</div>
		 		</div> -->						 		
		 	</div>
		 </div>
 	</div>
 	<div class="card-footer text-right">
        <a href="{{url('admin/theme_options/edit/'.$theme_options_data->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
        <a href="{{url('admin/theme_options/delete/'.$theme_options_data->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fas fa-trash-alt"></i></a>
    </div>

</div>
</div>
@else
@endif
              
                  
@endsection