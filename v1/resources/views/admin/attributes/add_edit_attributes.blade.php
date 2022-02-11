@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >
          
@if(isset($attributes_data->id))
<form id="crudTable" action="{{url('admin/attributes/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$attributes_data->id}}">
@else
<form id="crudTable" action="{{url('admin/attributes/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
        <label for="attr_name">Attribute Name<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control nameForSlug1" id="attr_name" name="attr_name" required="required"  value="{{old('attr_name',$attributes_data->attr_name??'')}}">
      </div>
       <div class="form-group">
        <label for="attr_name">Attribute Slug<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control slugForName1" id="slug" name="slug" required="required"  value="{{old('slug',$attributes_data->slug??'')}}">
      </div>
      
      <button type="submit" class="btn btn-brand">Submit</button>
      <a href="{{url('admin/attributes')}}" class="btn btn-info">Back</a>
    </div>
    <div class="col-md-5">
      
      </div>
        </div>
      </form>
      </div> 
        
 @endsection


@push('scripts')
<script>
   $("#crudTable").validate({
  rules: {
  name: {
      required: true,
      
    },
     description: {
      required: true,
      
    },
    max_admissions: {
      required: true,
      number:true,
      minlength:1,
      maxlength:100
    },course_fee: {
      required: true,
      number:true,
      minlength:2,
      maxlength:100
    },
    institute_id: {
      required: true
    }
  }
});
 </script> 
 @endpush
 