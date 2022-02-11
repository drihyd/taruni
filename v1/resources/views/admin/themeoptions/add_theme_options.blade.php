@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
	<div class="col-sm-12">
		@if(isset($theme_options_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/theme_options/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$theme_options_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/theme_options/store') }}" enctype="multipart/form-data">
@endif
			@csrf
			<div class="row">
				<div class="col-sm-5">
			<div class="form-group">
				<label>Header Logo<span style="color: red">*</span></label>				
				<input type="file"  name="header_logo" class="file-input" @if(isset($theme_options_data->header_logo)) @else required @endif  />
			</div>
			<div class="form-group">
        @if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo))
				<img src="{{ asset('assets/uploads/' . $theme_options_data->header_logo) }}" width="100"   />
				@else
				@endif
			</div>
			<div class="form-group">
					<label>Favicon</label>
				<input type="file" name="favicon" class="file-input" @if(isset($theme_options_data->favicon)) @else required @endif>
			</div>
			<div class="form-group">
				
        @if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon))
				<img src="{{ asset('assets/uploads/' . $theme_options_data->favicon) }}" width="100" />
				@else
				@endif
			</div>
          <div class="form-group">
            <label>Copyright Description<span style="color: red">*</span></label>
            <textarea  name="copyright" id="title" class="form-control" value="" required="required" rows="1">@if(isset($theme_options_data->id)){{$theme_options_data->copyright??''}}@else{{ old('copyright') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label>Facebook Call to URL<span style="color: red">*</span></label>
            <input type="url" name="facebook_url" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->facebook_url??''}}@else{{ old('facebook_url') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Instagram Call to URL<span style="color: red">*</span></label>
            <input type="url" name="instagram_url" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->instagram_url??''}}@else{{ old('instagram_url') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Twitter Call to URL<span style="color: red">*</span></label>
            <input type="url" name="twitter_url" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->twitter_url??''}}@else{{ old('twitter_url') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Pinterest Call to URL<span style="color: red">*</span></label>
            <input type="url" name="pinterest_url" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->pinterest_url??''}}@else{{ old('pinterest_url') }}@endif" required="required">
          </div>
		</div>
		<div class="col-sm-5">
			
          
          <div class="form-group">
            <label>Youtube Call to URL<span style="color: red">*</span></label>
            <input type="url" name="youtube_url" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->youtube_url??''}}@else{{ old('youtube_url') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>GST NO on Invoice<span style="color: red">*</span></label>
            <input type="text" name="gst_no_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->gst_no_invoice??''}}@else{{ old('gst_no_invoice') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Mobile No on Invoice<span style="color: red">*</span></label>
            <input type="text" name="mobile_no_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->mobile_no_invoice??''}}@else{{ old('mobile_no_invoice') }}@endif" required="required">
          </div>
           <div class="form-group">
            <label>Company Name on Invoice<span style="color: red">*</span></label>
            <input type="text" name="company_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->company_invoice??''}}@else{{ old('company_invoice') }}@endif" required="required">
          </div>
           <div class="form-group">
            <label>Dr.No/Buliding No on Invoice<span style="color: red">*</span></label>
            <input type="text" name="drno_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->drno_invoice??''}}@else{{ old('drno_invoice') }}@endif" required="required">
          </div>
           <div class="form-group">
            <label>Street<span style="color: red">*</span></label>
            <input type="text" name="street_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->street_invoice??''}}@else{{ old('street_invoice') }}@endif" required="required">
          </div>
           <div class="form-group">
            <label>Landamark<span style="color: red">*</span></label>
            <input type="text" name="landmark_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->landmark_invoice??''}}@else{{ old('landmark_invoice') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>City<span style="color: red">*</span></label>
            <input type="text" name="city_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->city_invoice??''}}@else{{ old('city_invoice') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>State<span style="color: red">*</span></label>
            <input type="text" name="state_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->state_invoice??''}}@else{{ old('state_invoice') }}@endif" required="required">
          </div>
          <div class="form-group">
            <label>Pincode<span style="color: red">*</span></label>
            <input type="text" name="pincode_invoice" id="title" class="form-control" value="@if(isset($theme_options_data->id)){{$theme_options_data->pincode_invoice??''}}@else{{ old('pincode_invoice') }}@endif" required="required">
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
