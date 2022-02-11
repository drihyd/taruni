
<div class="paddingleftright pt-2 pb-5" >
@if(isset($single_data->id))
<form action="{{ url('admin/update_homepagebanners') }} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$single_data->id}}">
@else
<form action="{{ url('admin/store_homepagebanners') }}" method="POST"  enctype="multipart/form-data">
@endif
@csrf

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">   
<div class="form-group">



<strong>Upload Banner<span style="color: red">*</span></strong>
<input type="file" name="image" class="file-input"  @if(isset($single_data->image))@else required @endif>
</div>

<div class="form-group">
@if(isset($single_data->image))
<img src="{{ asset('assets/uploads/' . $single_data->image) }}" width="100" />
@else             
@endif
</div>
<div class="form-group">
<label>Banner URL<span style="color: red">*</span></label>
<input type="url" name="banner_url"  id="thumbnail-title" class="form-control" value="@if(isset($single_data->id)){{$single_data->banner_url??''}}@else{{ old('banner_url') }}@endif">
</div>

<div class="form-group">
            <!-- <label>Active<span style="color: red">*</span></label> -->
            <input type="radio" class="rdbtn"  name="is_show" value="yes"  {{ old('is_show',$single_data->is_show??'') == 'yes'? 'checked':'checked'}}/>
                <label>Show</label>
                <input type="radio" class="rdbtn" value="no"  name="is_show"  {{ old('is_show',$single_data->is_show??'') == 'no'? 'checked':''}}/>
                  <label>Hide</label>
            
          </div>

<button type="submit" class="btn btn-admin font-weight-bold">Submit</button>
</div>
</div>
<input type="hidden" name="project_id" value="{{$project_id}}">
<input type="hidden" name="slug" value="banner">
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