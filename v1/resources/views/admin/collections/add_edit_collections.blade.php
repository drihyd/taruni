@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')

@php

if(isset($collections_data->categories_data) && !empty($collections_data->categories_data)){
$categories_map= json_decode( $collections_data->categories_data, true);


if($categories_map){
  $categories_map=$categories_map;
}
else{
$categories_map=[];
  
}

}
else{
$categories_map=[];
}




$categories_data=DB::table('categories')->select('categories.*','departments.id as dept_id','departments.dept_name as dept_name' )
        ->leftjoin('departments','departments.id','=','categories.department_id')
        ->orderBy('name','ASC')->get()->toArray(); 



@endphp




 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
	<div class="col-sm-12">
		@if(isset($collections_data->id))
<form method="POST" class="Addnewblog" action="{{ url('admin/collections/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$collections_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/collections/store') }}" enctype="multipart/form-data">
@endif
			@csrf
			<div class="row">
				<div class="col-sm-5">
          <div class="form-group">
            <label>Title<span style="color: red">*</span></label>
            <input type="text" name="title" id="title" class="form-control nameForSlug" value="{{old('title',$collections_data->title??'')}}" required="required">
          </div>
          <div class="form-group">
            <label>Slug<span style="color: red">*</span></label>
            <input type="text" name="title_slug" id="title" class="form-control slugForName" value="{{old('title_slug',$collections_data->title_slug??'')}}" required="required">
          </div>
          
          <div class="form-group">
        <label>Image<span style="color: red">*</span></label>       
        <input type="file"  name="image" class="file-input" @if(isset($collections_data->image)) @else required @endif  />
      </div>
      <div class="form-group">
        @if(isset($collections_data->image) && !empty($collections_data->image))
        <img src="{{ asset('assets/uploads/' . $collections_data->image??'') }}" width="100"   />
        @else
        @endif
      </div>
          <div class="form-group">
            <label>CTA Link<span style="color: red">*</span></label>
            <input type="url" name="link" id="link" class="form-control" value="{{old('link',$collections_data->link??'')}}" required="required">
          </div>
          <div class="form-group">
            <label>Sorting<span style="color: red">*</span></label>
            <input type="number" name="sorting" id="date" class="form-control" value="{{old('sorting',$collections_data->sorting??'')}}" required="required">
          </div>
          <button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
          <a href="{{url('admin/fashionjournals')}}" class="btn btn-back">Back</a>
		</div>
    
		<div class="col-sm-5">
			
      <div class="form-group">
            <label>Mapping Collections<span style="color: red">*</span></label>
          </div>
          <div class="form-group"> 
            @foreach($departments_data as $department) 
          <h4>{{$department->dept_name}}</h4> 
            <div class="row">
            @foreach($categories_data as $categories) 
            @if($categories->dept_id == $department->id)
              <div class="col-md-12"> 
           @if(in_array($categories->id,$categories_map))      
      <div class="row">
<div class="col-md-4">
  <div class="form-group mb-2">
    <input  type="checkbox" checked name="categories_data[]" value="{{$categories[0]->id??''}}">&nbsp; {{ucfirst($categories[0]->name??'')}}&nbsp;
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group mx-sm-3 mb-2">
  <Small>Ex: 1000-8000</small>
    <label for="inputPassword2" class="sr-only">Price</label>
	
    <input type="text" name="price_data[{{$categories->id??''}}]" class="form-control form-control-sm" id="inputPassword2" placeholder="Price" value="">

  </div>
</div>

</div>
@else
<div class="row">
<div class="col-md-4">
  <div class="form-group mb-2">
    <input  type="checkbox"  name="categories_data[]" value="{{$categories->id??''}}">&nbsp; {{ucfirst($categories->name??'')}}&nbsp;
  </div>
  </div>
  <div class="col-md-6">
  
  <div class="form-group mx-sm-3 mb-2">
  <Small>Ex: 1000-8000</small>
    <label for="inputPassword2" class="sr-only">Price</label>
	
    <input type="text" name="price_data[{{$categories->id??''}}]" class="form-control form-control-sm" id="inputPassword2" placeholder="Price">
  </div>
  
</div>

</div>

  @endif
              </div>
              @endif
              
               @endforeach
            </div>
         
                @endforeach
          </div>
          
          

      </div>
      </div>
          <div class="form-group">
          
          </div>
          
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
