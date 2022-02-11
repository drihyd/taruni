@extends('admin.template_v1')
@section('content')
<div class="paddingleftright pt-2 pb-5" >
          
@if(isset($page->id))
<form id="crudTable" action="{{ route('pages.update',$page->id) }}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$page->id}}">
@method('PUT')
@else
<form id="crudTable" action="{{ route('categories.store') }}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
              <div class="row mt-3">
              <div class="col-sm-1">
                <label>Name<span style="color: red;">*</span></label>
                
              </div>
              <div class="col-sm-5 pl-4">
                <input type="text" name="name" class="form-control nameForSlug" required="required" value="{{old('name',$page->name??'')}}">
              </div>
            </div>
              <div class="row mt-3">
              <div class="col-sm-1">
                <label>Slug<span style="color: red;">*</span></label>
                
              </div>
              <div class="col-sm-5 pl-4">
                <input type="text" name="slug" class="form-control slugForName" required="required" value="{{old('slug',$page->slug??'')}}">
              </div>
            </div>
            <div class="row">
               <div class="col-sm-1">
                <label>&nbsp;</label>
              </div>
                <div class="col-sm-3 pl-4">
                  <button type="submit" class="btn btn-outline-success btn-sm mt-3">Save</button>
                      <a href="{{url('admin/categories')}}" class="btn btn-outline-danger btn-sm mt-3">Back</a>
                      
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
 