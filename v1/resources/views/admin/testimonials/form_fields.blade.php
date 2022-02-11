<div class="paddingleftright pt-2 pb-5" >
@if(isset($single_testimonial->id))
<form action="{{ url('admin/update_testimonials') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$single_testimonial->id}}">
@else
<form action="{{ url('admin/store_testimonials') }}" method="POST"  enctype="multipart/form-data">
@endif
@csrf


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">
<div class="form-group">
<label>Name<span style="color: red">*</span>:</label> 
<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name',$single_testimonial->name??'') }}">
</div>
<div class="form-group">
<label>Description<span style="color: red">*</span>:</label> 
<textarea class="form-control" name="description" placeholder="Description" >{{ old('description',$single_testimonial->description??'') }}</textarea>
</div>
<div class="form-group">
<label>Image:</label>
<input type="file" name="image" class="file-input" >
</div>
<div class="form-group">
@if(isset($single_testimonial->image) && $single_testimonial->image)
<img src="{{ asset('assets/uploads/' . $single_testimonial->image) }}" width="100" />
@else             
@endif
</div>
<button type="submit" class="btn btn-admin font-weight-bold">Submit</button>
</div>
</div>
</form>
</div>
@push('scripts')
    <!-- flot charts scripts-->    
<script type="text/javascript">
  $(document).ready(function() {
    $("form").validate({
      rules:{
        description:{
          required:true,
          minlength: 3,
          maxlength: 400,	
        },name:{
            required:true,
            alphanumspace:true,
            minlength: 3,
            maxlength: 100,
        }, 
        image:{
           extension: "jpg,jpeg,png"  
        },   
       gender:{
         required:true,
        },    
          is_show_on_homepage:{
          required:true,
        },       
       
      },
       messages: {
        image: "Upload jpg,jpeg,png Only.",
    }  
     }); 
    
});
</script>
@endpush