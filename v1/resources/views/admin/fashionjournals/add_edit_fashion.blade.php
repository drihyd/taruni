@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
	<div class="col-sm-12">
		@if(isset($fashionjournals_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/fashionjournals/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$fashionjournals_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/fashionjournals/store') }}" enctype="multipart/form-data">
@endif
			@csrf
			<div class="row">
				<div class="col-sm-5">
          <div class="form-group">
            <label>Title<span style="color: red">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title',$fashionjournals_data->title??'')}}" required="required">
          </div>
          <div class="form-group">
            <label>Date<span style="color: red">*</span></label>
            <input type="date" name="date" id="date" class="form-control" value="{{old('date',$fashionjournals_data->date??'')}}" required="required">
          </div>
          <div class="form-group">
        <label>Image<span style="color: red">*</span></label>       
        <input type="file"  name="image" class="file-input" @if(isset($fashionjournals_data->image)) @else required @endif  />
      </div>
      <div class="form-group">
        @if(isset($fashionjournals_data->image) && !empty($fashionjournals_data->image))
        <img src="{{ asset('assets/uploads/' . $fashionjournals_data->image??'') }}" width="100"   />
        @else
        @endif
      </div>
          <div class="form-group">
            <label>Description<span style="color: red">*</span></label>
            <textarea name="description" id="description" class="form-control" rows="4">{{old('description',$fashionjournals_data->description??'')}}</textarea>
          </div>
          <div class="form-group">
            <label>CTA Link<span style="color: red">*</span> (optional)</label>
            <input type="url" name="link" id="date" class="form-control" value="{{old('link',$fashionjournals_data->link??'')}}">
          </div>
		</div>
    
		<div class="col-sm-5">
			
          
          

      </div>
      </div>
          <div class="form-group">
          
          </div>
          <button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
          <a href="{{url('admin/fashionjournals')}}" class="btn btn-back">Back</a>
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
