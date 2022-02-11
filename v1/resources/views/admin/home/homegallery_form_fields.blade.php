@extends('theme.default')
@section('content')
@include('theme.pagetitle')
@include('theme.alerts')


@if(isset($single_data->id))
<form action="{{ url('update_homepagegallery') }} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$single_data->id}}">
@else
<form action="{{ url('store_homepagegallery') }}" method="POST"  enctype="multipart/form-data">
@endif
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">   
<div class="form-group">

<strong>Upload Gallery<span style="color: red">*</span></strong>
<input type="file" name="image" class="file-input"  @if(isset($single_data->image))@else required @endif>
</div>

<div class="form-group">
@if(isset($single_data->image))
<img src="{{ asset('assets/uploads/' . $single_data->image) }}" width="100" />
@else             
@endif
</div>
@php
$sorting=$single_data->sorting??'';
@endphp
<div class="form-group">
<label>Sorting</label>
<select name="sorting" id="sorting" class="form-control">
@for ($i = 1; $i < 15; $i++)
<option value="{{ $i }}" @if($sorting==$i) selected @endif>{{$i}}</option>
@endfor
</select>
</div>

<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
</div>
</div>
<input type="hidden" name="project_id" value="{{$project_id}}">
<input type="hidden" name="slug" value="gallery">
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
          maxlength: 150,
          minlength: 10
        },name:{
          required:true,
          alphanumspace:true,
          maxlength: 35,
          minlength: 10
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