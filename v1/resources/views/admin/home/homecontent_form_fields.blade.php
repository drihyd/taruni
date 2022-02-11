@extends('theme.default')
@section('content')
@include('theme.pagetitle')
@include('theme.alerts')

@if(isset($single_data->id))
<form action="{{url('admin/home_content/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$single_data->id}}">
@else
<form action="{{url('admin/home_content/store')}}" method="POST"  enctype="multipart/form-data">
@endif
@csrf

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">   


<div class="form-group">
<label>Title<span style="color: red">*</span></label>
<input type="text" name="title"  id="thumbnail-title" class="form-control" value="@if(isset($single_data->id)){{$single_data->title??''}}@else{{ old('title') }}@endif" required>
</div>

<div class="form-group">
<label>Description<span style="color: red">*</span></label>
<textarea name="description" id="description" class="form-control">@if(isset($single_data->id)){{$single_data->description??''}}@else{{ old('description') }}@endif</textarea>
</div>
<div class="row">
        <div class="col-md-4">
          <div class="form-group">
        <label>Min Seats<span style="color: red">*</span></label> 
        <input type="number" name="min_seats" class="form-control" required="required" value="@if(isset($single_data->min_seats)){{$single_data->min_seats??''}}@else{{ old('min_seats') }}@endif">
      </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
        <label>Max Seats<span style="color: red">*</span></label> 
        <input type="number" name="max_seats" class="form-control" required="required" value="@if(isset($single_data->max_seats)){{$single_data->max_seats??''}}@else{{ old('max_seats') }}@endif">
      </div>
        </div>
</div>
<div class="form-group">
<label>Seats short description<span style="color: red">*</span></label>
<input type="text" name="seats_text"  id="thumbnail-title" class="form-control" value="@if(isset($single_data->id)){{$single_data->seats_text??''}}@else{{ old('seats_text') }}@endif" required>
</div>
<div class="form-group">
<label>Google Map<span style="color: red">*</span></label>
<textarea name="home_google_map" id="home_google_map" class="form-control">@if(isset($single_data->id)){{$single_data->home_google_map??''}}@else{{ old('home_google_map') }}@endif</textarea>
</div>
<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
</div>
</div>
</form>

@endsection
@push('scripts')
    <!-- flot charts scripts-->    
<script type="text/javascript">
  $(document).ready(function() {
    $("form").validate({
      rules:{
        description:{
          required:true,
        },name:{
          required:true,
          alphanumspace:true,
        }, 
        image:{
           extension: "jpg,jpeg,png"  
        },            
       
      },
       messages: {
        image: "Upload jpg,jpeg,png Only.",
    }
  
     });    
    
});
</script>
@endpush