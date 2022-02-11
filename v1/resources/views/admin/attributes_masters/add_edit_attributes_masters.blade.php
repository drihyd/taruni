@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >
          
@if(isset($attributes_masters_data->id))
<form id="crudTable" action="{{url('admin/attributes_masters/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$attributes_masters_data->id}}">
@else
<form id="crudTable" action="{{url('admin/attributes_masters/store')}}" method="POST"  enctype="multipart/form-data" data-parsley-validate>
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
<label>Attribute Category<span style="color: red">*</span></label>

<select name="attribute_category" class="form-control" required="required">
  <option value="">--Pick One--</option>
<option value="color" {{ old('attribute_category',$attributes_masters_data->attribute_category??'') == 'color'? 'selected':''}}>Color</option>

<option value="workmanship" {{ old('attribute_category',$attributes_masters_data->attribute_category??'') == 'workmanship'? 'selected':''}}>Workmanship</option>

</select>
</div>
          <div class="form-group">
        <label for="attr_name">Name<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control nameForSlug" id="name" name="name" required="required"  value="{{old('name',$attributes_masters_data->name??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
      </div>
      <div class="form-group">
        <label for="slug">Slug<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control slugForName" id="name" name="slug" required="required"  value="{{old('slug',$attributes_masters_data->slug??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
      </div>
      
      <button type="submit" class="btn btn-brand">Submit</button>
      <a href="{{url('admin/attributes_masters')}}" class="btn btn-info">Back</a>
    </div>
    <div class="col-md-5">
      
      </div>
        </div>
      </form>
      </div> 
        
 @endsection



 