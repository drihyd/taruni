@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >

@if(isset($departments_data->id))
<form id="crudTable" action="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$departments_data->id}}">
@else
<form id="crudTable" action="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments/store')}}" method="POST"  enctype="multipart/form-data" data-parsley-validate>
@endif  
@csrf
<div class="row">
<div class="col-md-5">
<div class="form-group">
<label for="attr_name">Name<span class="text-red"style="color: red;">*</span></label>
<input type="text" class="form-control nameForSlug" id="dept_name" name="dept_name" required="required"  value="{{old('dept_name',$departments_data->dept_name??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
</div>
<div class="form-group">
<label for="slug">Slug<span class="text-red"style="color: red;">*</span></label>
<input type="text" class="form-control slugForName" id="dept_slug" name="dept_slug" required="required"  value="{{old('dept_slug',$departments_data->dept_slug??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
</div>

<button type="submit" class="btn btn-brand">Submit</button>
<a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments')}}" class="btn btn-info">Back</a>
</div>
<div class="col-md-5">

</div>
</div>
</form>
</div> 

@endsection



 