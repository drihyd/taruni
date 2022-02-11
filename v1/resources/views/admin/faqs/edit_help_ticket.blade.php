@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >
          

<form id="crudTable" action="{{url('admin/support_leads/reply/store')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$support_data->id}}">
 
      @csrf
              

            <div class="row mt-3">
              <div class="col-sm-1">
                <label>Remarks<span style="color: red;">*</span></label>
              </div>
              <div class="col-sm-5 pl-4">
                <textarea id="page_editor" name="status_remarks" rows="4" cols="50" class="form-control" required="required">{{old('status_remarks',$support_data->status_remarks??'')}}</textarea>
                  
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-1">
                <label>Status<span style="color: red;">*</span></label>
              </div>
              <div class="col-sm-5 pl-4">
                <select name="status" class="form-control" required="required">
                  <option value="pending" {{ old('status',$support_data->status??'') == 'pending'? 'selected':''}} >Pending</option>
                  <option value="closed" {{ old('status',$support_data->status??'') == 'closed'? 'selected':''}}>Closed</option>
                </select>
                
              </div>
            </div>
            <div class="row">
               <div class="col-sm-1">
                <label>&nbsp;</label>
              </div>
                <div class="col-sm-3 pl-4">
                  <button type="submit" class="btn btn-brand btn-sm mt-3">Save</button>
                      <a href="{{url('admin/support_leadss')}}" class="btn btn-outline-danger btn-sm mt-3">Back</a>
                      
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
 