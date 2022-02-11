@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
	<div class="col-sm-12">
		@if(isset($shipping_rates_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/shipping_rates/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$shipping_rates_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/shipping_rates/store') }}" enctype="multipart/form-data">
@endif
			@csrf
			<div class="row">
				<div class="col-sm-5">
          <div class="form-group">
            <label>Level<span style="color: red">*</span></label>
            <input type="text" name="level" id="title" class="form-control" value="{{old('level',$shipping_rates_data->level??'')}}" required="required">
          </div>
          <div class="form-group">
            <label>Country<span style="color: red">*</span></label>
            <input type="text" name="country" id="title" class="form-control" value="{{old('country',$shipping_rates_data->country??'')}}" required="required">
          </div>
          <div class="form-group inline">
            <label>Starting Price<span style="color: red">*</span></label>
            <input type="number" name="starting_price" id="title" class="form-control" value="{{old('starting_price',$shipping_rates_data->starting_price??'')}}" required="required">
          </div>
          <div class="form-group inline">
            <label>Ending Price<span style="color: red">*</span></label>
            <input type="number" name="ending_price" id="title" class="form-control" value="{{old('ending_price',$shipping_rates_data->ending_price??'')}}" required="required">
          </div>
          <div class="form-group inline">
            <label>Charges (INR)<span style="color: red">*</span></label>
            <input type="text" name="charges_inr" id="title" class="form-control" value="{{old('charges_inr',$shipping_rates_data->charges_inr??'')}}" required="required">
          </div>
          <div class="form-group inline">
            <label>Charges (USD)<span style="color: red">*</span></label>
            <input type="text" name="charges_usd" id="title" class="form-control" value="{{old('charges_usd',$shipping_rates_data->charges_usd??'')}}" required="required">
          </div>
		</div>
		<div class="col-sm-5">
			
          

      </div>
      </div>
          
          <button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
          <a href="{{url('admin/shipping_rates')}}" class="btn btn-back">Back</a>
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
