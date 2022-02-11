@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
 <!-- Form Starts        -->
<div class="paddingleftright pt-2 pb-5" >
	<div class="col-sm-12">
		@if(isset($theme_options_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/gtm_tracking/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$theme_options_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/gtm_tracking/store') }}" enctype="multipart/form-data">
@endif
			@csrf

      <label style="color: red;"><b>Note<span style="color: red">*</span>: Add Analytics code only</b></label><br>
      <hr><br>
      <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <label><b>Google Analytics Script (header tag code)</b></label>
            <textarea  name="google_analytics_script" id="title" class="form-control" value="" rows="6" required="required">@if(isset($theme_options_data->id)){{$theme_options_data->google_analytics_script??''}}@else{{ old('google_analytics_script') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label><b>Google Analytics Script (Body tag code)</b></label>
            <textarea  name="google_analytics_script_body" id="title" class="form-control" value="" rows="6" required="required">@if(isset($theme_options_data->id)){{$theme_options_data->google_analytics_script_body??''}}@else{{ old('google_analytics_script_body') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label><b>Facebook Pixels Script (header tag code)</b></label>
            <textarea  name="facebook_pixels_script" id="title" class="form-control " value="" rows="6">@if(isset($theme_options_data->id)){{$theme_options_data->facebook_pixels_script??''}}@else{{ old('facebook_pixels_script') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label><b>Facebook Pixels Script (Body tag code)</b></label>
            <textarea  name="facebook_pixels_script_body" id="title" class="form-control " value="" rows="6">@if(isset($theme_options_data->id)){{$theme_options_data->facebook_pixels_script_body??''}}@else{{ old('facebook_pixels_script_body') }}@endif</textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label><b>Google Adwords Script</b></label>
            <textarea  name="google_adwords_script" id="title" class="form-control " value="" rows="6" >@if(isset($theme_options_data->id)){{$theme_options_data->google_adwords_script??''}}@else{{ old('google_adwords_script') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label><b>Google Remarketing Script</b></label>
            <textarea  name="google_remarketing_script" id="title" class="form-control " value="" rows="6">@if(isset($theme_options_data->id)){{$theme_options_data->google_remarketing_script??''}}@else{{ old('google_remarketing_script') }}@endif</textarea>
          </div>
          <div class="form-group">
            <label><b>Live Chat Script</b></label>
            <textarea  name="live_chat_script" id="title" class="form-control " value="" rows="6">@if(isset($theme_options_data->id)){{$theme_options_data->live_chat_script??''}}@else{{ old('live_chat_script') }}@endif</textarea>
          </div>
          
          <div class="form-group">
          </div> 
        </div>
		</div>
		<button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
		</form>
	</div>
</div>
<!-- Form End -->
@endsection
@push('scripts')
    
@endpush
