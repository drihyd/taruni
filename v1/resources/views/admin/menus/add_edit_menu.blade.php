@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 <div class="paddingleftright pt-2 pb-5" >
<div class="row">
  <div class="col-sm-12">
    @if($menu_data->id??'')
<form method="POST" class="Addnewblog" action="{{ url('admin/menu/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$menu_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url('admin/menu/store') }}" enctype="multipart/form-data">
@endif
      @csrf
      <div class="row">
        <div class="col-sm-5">
          <div class="form-group">
<label>Location On<span style="color: red">*</span></label>

<select name="menu_category" class="form-control" required="required">
<option value="header-menu" {{ old('menu_category',$menu_data->menu_category??'') == 'header-menu'? 'selected':''}}>Header Menu</option>

<option value="footer-widget-1" {{ old('menu_category',$menu_data->menu_category??'') == 'footer-widget-1'? 'selected':''}}>Footer Widget 1</option>

</select>
</div>
<div class="form-group">
<label>Parent Menu<span style="color: red">*</span></label>

<select name="parent_id" class="form-control" required="required">
<option value="0" {{ old('parent_id',$menu_data->parent_id??'') == '0'? 'selected':''}}>--Pick One--</option>
@foreach($main_menu_data as $main_menu)
<option value="{{$main_menu->id??''}}" {{ old('parent_id',$menu_data->parent_id??'') == $main_menu->id ? 'selected':''}}>{{$main_menu->menu_name}}</option>
@endforeach

</select>
</div>
<div class="form-group">
  <div>
            <label>Mapping to Sub Categories<span style="color: red">*</span></label>
            </div>
            <input type="radio" class="rdbtn"  name="mapping_sub_cat" value="yes"  {{ old('mapping_sub_cat',$menu_data->mapping_sub_cat??'') == 'yes'? 'checked':''}}/>
                <label>Yes</label>
                <input type="radio" class="rdbtn" value="no"  name="mapping_sub_cat"  {{ old('mapping_sub_cat',$menu_data->mapping_sub_cat??'no') == 'no'? 'checked':''}}/>
                  <label>No</label>
            
          </div>
<div class="form-group">
<label>Child Menu<span style="color: red">*</span></label>

<select name="child_id" class="form-control" required="required">
<option value="0" {{ old('child_id',$menu_data->child_id??'') == 'NA'? 'selected':''}}>--NA--</option>
@foreach($child_menu_data as $child_menu)
<option value="{{$child_menu->id??''}}" {{ old('child_id',$menu_data->child_id??'') == $child_menu->id ? 'selected':''}}>{{$child_menu->menu_name}}</option>
@endforeach

</select>
</div>


      <div class="form-group">
            <label>Name<span style="color: red">*</span></label>
            <input type="text" name="menu_name" id="menu_name" class="form-control nameForSlug" value="{{old('menu_name',$menu_data->menu_name??'')}}" required="required">
          </div>
          <div class="form-group">
            <label>URL<span style="color: red"></span></label>
            <input type="url" name="menu_url" id="title" class="form-control" value="{{old('menu_url',$menu_data->menu_url??'')}}" >
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
            <label>Sorting<span style="color: red"></span></label>
            <input type="number" name="menu_sorting" id="title" class="form-control" value="{{old('menu_sorting',$menu_data->menu_sorting??'')}}" >
          </div>
            </div>
            <div class="col-sm-5">
              
            </div>
          </div>
          
          <div class="form-group">
            <!-- <label>Active<span style="color: red">*</span></label> -->
            <input type="radio" class="rdbtn"  name="is_active" value="Yes"  {{ old('is_active',$menu_data->is_active??'') == 'Yes'? 'checked':''}}/>
                <label>Active</label>
                <input type="radio" class="rdbtn" value="No"  name="is_active"  {{ old('is_active',$menu_data->is_active??'') == 'No'? 'checked':''}}/>
                  <label>Inactive</label>
            
          </div>
          <div class="form-group">
<label class="form-check-label" for="exampleCheck1">Open in New Tab</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" class="form-check-input" name="open_new_tab" id="" value="Yes" {{ old('open_new_tab',$menu_data->open_new_tab??'') == 'Yes'? 'checked':''}}>
                  
            
          </div>

    <button  id="" type="submit" class="btn btn-brand submit_btn ">Submit</button>
    <a href="{{url('admin/menu')}}" class="btn btn-back">Back</a>
    </div>
    
      </div>
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
        menu_category:{
          required:true, 
        },
        menu_name:{
          required:true, 
        },
        menu_slug:{
          required:true, 
        },
        menu_url:{
          required:true,
          url:true
        },
        menu_sorting:{
          required:true,
          numeric:true,
        },
        menu_column_grid:{
          required:true,
          numeric:true,
        },
      }
     });
});

  function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-');
}

function slugClean(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

function codeClean(Text) {
  return Text
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

$('.nameForSlug').on('keyup change', function() {
  $('.slugForName').val(convertToSlug($(this).val()));
});

$('.slugForName').on('change keyup', function() {
  $('.slugForName').val(slugClean($(this).val()));
});

$('.codeClean').on('change keyup', function() {
  $('.codeClean').val(codeClean($(this).val()));
});
</script>
@endpush
