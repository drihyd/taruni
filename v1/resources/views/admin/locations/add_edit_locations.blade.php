@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
	<div class="col-sm-12">
		@if(isset($locations_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/location/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$locations_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/location/store') }}" enctype="multipart/form-data">
@endif
			@csrf
			<div class="row">
				<div class="col-sm-5">
          <div class="form-group">
            <label>Location Name<span style="color: red">*</span></label>
            <input type="text" name="name" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->name??''}}@else{{ old('name') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Dr.No/Plot.No/Shop.No<span style="color: red">*</span></label>
            <input type="text" name="plot_no" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->plot_no??''}}@else{{ old('plot_no') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Street<span style="color: red">*</span></label>
            <input type="text" name="street" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->street??''}}@else{{ old('street') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>City<span style="color: red">*</span></label>
            <input type="text" name="city" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->city??''}}@else{{ old('city') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>State<span style="color: red">*</span></label>
            <input type="text" name="state" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->state??''}}@else{{ old('state') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Country<span style="color: red">*</span></label>
            <input type="text" name="country" id="title" class="form-control" value="{{old('country',$page->country??'India')}}" required="required">
          </div>
		</div>
		<div class="col-sm-5">
			
          <div class="form-group">
            <label>Pincode<span style="color: red">*</span></label>
            <input type="number" name="pincode" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->pincode??''}}@else{{ old('pincode') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Primary Phone No</label>
            <input type="text" name="primary_phone" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->primary_phone??''}}@else{{ old('primary_phone') }}@endif" >
          </div>
          <div class="form-group">
            <label>Secondary Phone No</label>
            <input type="text" name="secondary_phone" id="title" class="form-control" value="@if(isset($locations_data->id)){{$locations_data->secondary_phone??''}}@else{{ old('secondary_phone') }}@endif" >
          </div>
          <div class="form-group">
            <label>Map (Iframe Code Only)<span style="color: red">*</span></label>
            <textarea name="map_iframe" id="title" class="form-control" rows="4">@if(isset($locations_data->id)){{$locations_data->map_iframe??''}}@else{{ old('map_iframe') }}@endif</textarea>
          </div>
          

      </div>
      </div>
          <div class="form-group">
          
          </div>
          <button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
          <a href="{{url('admin/theme_options')}}" class="btn btn-back">Back</a>
        </div>


		</div>
		
		</form>
	</div>
</div>
</div>
<!-- Form End -->
@endsection
@push('scripts')
    <!-- flot charts scripts-->    
<script type="text/javascript">
  $(document).ready(function() {
    $("form").validate({
      rules:{
        footer_title:{
          required:true,
          alphanumspace:true,
          minlength:3,
          maxlength:30
        },copyright:{
          required:true,
          
        },
        twitter_url:{
          required:true,
          url:true
        },linkedin_url:{
          required:true,
          url:true
        },facebook_url:{
          required:true,
          url:true
        },
        header_logo:{
          extension: "png|jpe?g",  
       
        },footer_logo:{
          extension: "png|jpe?g",   
        
        }
      },
      messages: { 
          header_logo: {
           extension: "File must be JPG or PNG",
      
          }
      },
      
     });
});
</script>
@endpush
