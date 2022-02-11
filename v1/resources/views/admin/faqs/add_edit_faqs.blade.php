@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >
          
@if(isset($faqs_data->id))
<form id="crudTable" action="{{url('admin/faqs/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$faqs_data->id}}">
@else
<form id="crudTable" action="{{url('admin/faqs/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
              <div class="row mt-3">
              <div class="col-sm-1">
                <label>Name<span style="color: red;">*</span></label>
                
              </div>
              <div class="col-sm-5 pl-4">
                <input type="text" name="page_title" class="form-control nameForSlug" required="required" value="{{old('page_title',$faqs_data->page_title??'')}}">
              </div>
            </div>
              <div class="row mt-3">
              <div class="col-sm-1">
                <label>Slug<span style="color: red;">*</span></label>
                
              </div>
              <div class="col-sm-5 pl-4">
                <input type="text" name="slug" class="form-control slugForName" required="required" value="{{old('slug',$faqs_data->slug??'')}}">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-1">
                <label>Description<span style="color: red;">*</span></label>
              </div>
              <div class="col-sm-8 pl-4">
                <textarea id="page_editor" name="page_content" rows="8" cols="50" class="form-control ckeditor" required="required">{{old('page_content',$faqs_data->page_content??'')}}</textarea>
                  
              </div>
            </div>
            <div class="row">
               <div class="col-sm-1">
                <label>&nbsp;</label>
              </div>
                <div class="col-sm-3 pl-4">
                  <button type="submit" class="btn btn-outline-success btn-sm mt-3">Save</button>
                      <a href="{{url('admin/faqs')}}" class="btn btn-outline-danger btn-sm mt-3">Back</a>
                      
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
 