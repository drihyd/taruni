@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
<!-- @include('admin.alerts')
@include('admin.errors') -->
 <!-- Form Starts        -->
 <div class="paddingleftright custom-tabs">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-basic-info-tab" data-toggle="tab" href="#nav-basic-info" role="tab" aria-controls="nav-basic-info" aria-selected="true">Basic Info</a>
                  <a class="nav-item nav-link" id="nav-skus-tab" data-toggle="tab" href="#nav-skus" role="tab" aria-controls="nav-skus" aria-selected="true">SKUs</a>

                  <!-- <a class="nav-item nav-link" id="nav-product-pictures-tab" data-toggle="tab" href="#nav-product-pictures" role="tab" aria-controls="nav-product-pictures" aria-selected="false">Product Pictures</a> -->
                  <a class="nav-item nav-link" id="nav-seo-tags-tab" data-toggle="tab" href="#nav-seo-tags" role="tab" aria-controls="nav-seo-tags" aria-selected="false">SEO Tags</a>
                  <a class="nav-item nav-link" id="nav-attr-tab" data-toggle="tab" href="#nav-attr" role="tab" aria-controls="nav-attr" aria-selected="false">Add Attribute Values</a>
                </div>
              </nav>
            </div>
            <div class="row paddingleftright pt-3 pb-3 m-0">
                <div class="col-sm-5 pl-0 pr-0">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-basic-info" role="tabpanel" aria-labelledby="nav-basic-info-tab">
                        <form action="{{url('admin/products/update')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                          <input type="hidden" name="id" value="{{$Products[0]->id}}">
                        @csrf                 
                          <legend>Basic Info</legend>
                          <div class="form-group inline">
                            <label for="productName" class="control-label">Name</label>
                            <input type="text" class="form-control input-sm nameForSlug" id="name" name="name" value="{{old('name',$Products[0]->name??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="productCode" class="control-label">Code</label>
                            <input type="text" class="form-control input-sm" id="productCode" name="code" value="{{old('code',$Products[0]->code??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="productSlug" class="control-label">Slug</label>
                            <input type="text" class="form-control input-sm slugForName" id="slug" name="slug" value="{{old('slug',$Products[0]->slug??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="productCategory" class="control-label">Category</label>
                                <select class="form-control input-sm" id="productCategory" name="cat_id" required>
                                  <option value="">--Select Category--</option>
                                  @foreach($categories as $category)
                                      <option value="{{$category->id}}" {{$Products[0]->cat_id == $category->id ? 'selected':''}}>{{ucwords($category->name)}}</option>

                                      @endforeach
                                      
                                    </select>
                              </div>
                              <div class="form-group inline">
                            <label for="productCategory" class="control-label">Collections</label>
                                <select class="form-control input-sm" id="productCategory" name="collection" required>
                                  <option value="">--Select--</option>
                                  @foreach($collections as $collection)
                                      <option value="{{$collection->title_slug}}" {{$Products[0]->collection == $collection->title_slug ? 'selected':''}}>{{ucwords($collection->title??'')}}</option>

                                      @endforeach
                                      
                                    </select>
                              </div>
                          <div class="row">
                            
                          <div class="col-sm-6">
                            <div class="form-group ">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="newarrival" value="1" autocomplete="off" {{ old('newarrival',$Products[0]->newarrival??'') == '1'? 'checked':''}}> Is New Arrival?
                              </label>
                            </div>
                          </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <label for="productPosScore" class="control-label">Position Score</label>
                            <input type="number" min="0" max="1000" class="form-control input-sm" id="productPosScore" name="position_score" value="{{old('position_score',$Products[0]->position_score??'')}}">
                            <div class="help-block"><small>Position Score is a number between 0 and 1000. Products are displayed in the descending order of their Position Score. Products with higher scores show up first.</small></div>
                          </div>
                          
                          <div class="form-group">
                            <label for="productDesc" class="control-label">Description</label>
                            <textarea class="form-control input-sm" style="max-width: 100%; min-width: 100%; min-height: 100px; border-radius: 0px;" id="productDesc" name="desc" required>{{old('desc',$Products[0]->desc??'')}}</textarea>
                          </div>
                          
                          <div class="form-group margin-top-30">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button> <a href="{{url('admin/products/edit/'.Crypt::encryptString($Products[0]->id))}}" class="btn btn-action-link">Cancel</a>
                          </div>
                        </form>
                      </div>
        
                        
                      <div class="tab-pane fade" id="nav-skus" role="tabpanel" aria-labelledby="nav-skus-tab">
                        

                        @include('admin.products.form_fields_skus')
                        

                      </div>
                      <div class="tab-pane fade" id="nav-product-pictures" role="tabpanel" aria-labelledby="nav-product-pictures-tab">
                       <form action="{{url('admin/products_images/update')}}" method="post" accept-charset="utf-8" class="edit-form" style=" display: inline-block;" enctype="multipart/form-data">
                        @csrf
                                             <legend>Upload Image</legend>
                          <small class="text-danger">Must be 500 X 500 px</small><br>
                          <img src="https://www.taruni.in/manage/img/Not_Available.jpg" width="210px"><br>
                          <label for="productImage" class="control-label">Change Picture</label>
                          <br>
                          <input type="file" class="file-input" id="productImage" name="image" >

        
                          <div class="form-group mt-3">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button>

                          </div>
                      </form>
                      </div>
                      <div class="tab-pane fade" id="nav-seo-tags" role="tabpanel" aria-labelledby="nav-seo-tags-tab">
                       <form action="{{url('admin/products_seo/update')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                        @csrf
                          <input type="hidden" name="id" value="{{$Products[0]->id}}">
                                            <legend>SEO Tags</legend>
                          <div class="form-group">
                            <label for="productSeoTitle" class="control-label">Page Title</label>
                            <input type="text" class="form-control input-sm" id="seo_title" name="seo_title" value="{{old('seo_title',$Products[0]->seo_title??'')}}" required>
                          </div>
                          <div class="form-group">
                            <label for="productSeoDesc" class="control-label">Page Description</label>
                            <textarea class="form-control input-sm" id="seo_desc" name="seo_desc">{{old('seo_desc',$Products[0]->seo_desc??'')}}</textarea>
                            
                          </div>
                          <div class="form-group ">
                            <label for="productSeoKeys" class="control-label">Page Keywords</label>
                            <textarea class="form-control input-sm" id="seo_keywords" name="seo_keywords" required>{{old('seo_keywords',$Products[0]->seo_keywords??'')}}</textarea>
                          </div>
                          
                          <div class="form-group margin-top-0">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button> <a href="{{url('admin/products/edit/'.Crypt::encryptString($Products[0]->id))}}" class="btn btn-action-link">Cancel</a>
                          </div>
                        </form>
                      </div>
                      @php
if(isset($Products[0]->c_applicable_attributes) && !empty(isset($Products[0]->c_applicable_attributes))){
$attributes=json_decode($Products[0]->c_applicable_attributes);
if($attributes){
  $attributes=$attributes;
}
else{
$attributes=[];
  
}

}
else{
$attributes=[];
}



@endphp
                      <div class="tab-pane fade" id="nav-attr" role="tabpanel" aria-labelledby="nav-attr-tab">
                       <form action="{{url('admin/products/attribute_values/store')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                        @csrf
                          <input type="hidden" name="product_id" value="{{$Products[0]->id??''}}">
                           <input type="hidden" name="category_id" value="{{$Products[0]->cat_id??''}}">
                           <input type="hidden" name="product_code" value="{{$Products[0]->code??''}}">
                                            <legend>ADD Attribute Values</legend>
                          @foreach($attributes as $key=> $attribute)
                          <div class="form-group inline">
                            <p>{{str_replace('_', ' ', ucwords($attribute??''))}}</p>
                            <input type="text" class="form-control input-sm" id="{{$attribute}}" name="{{$attribute}}" value="{{old('variant_name',$Products[0]->attributes[$attribute]->varinat_value??'')}}">
                          </div>
                         
                          @endforeach
                          <div class="form-group margin-top-0">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button> <a href="{{url('admin/products/edit/'.Crypt::encryptString($Products[0]->id))}}" class="btn btn-action-link">Cancel</a>
                          </div>
                        </form>
                      </div>

                    </div>
                </div>
                
                
                <div class="col-sm-7 pl-sm-3 pr-0 pl-0">
                    <div class="edit-form white-sec">
                        <legend>Info</legend>
                        <p>Name: {{ucwords($Products[0]->name??'')}}</p>
                        <p>Code: {{$Products[0]->code??''}}</p>
                        <p>Category: <a href="#">{{$Products[0]->cname??''}}</a></p>
                        <p>Description: {{$Products[0]->desc??''}}</p>
                        <hr style="margin: 10px 0;">
                        <div class="mt-4 table-responsive">
                              <table id="add-sku-table" class="table customdatatable table-striped" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>SKU Code</th>
                                          <th>Size</th>
                                          <th>Price INR</th>
                                          <th>Price USD</th>
                                          <th>Stock</th>
                                          <th width="20%">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($skus as $sku)
                                      <tr>
                                          <td>{{$sku->sku_code??''}}</td>
                                          <td>{{ucwords($sku->variant_value??'')}}</td>
                                          <td>INR. {{$sku->price_inr??''}}</td>
                                          <td>USD. {{$sku->price_usd??''}}  </td>
                                          <td>
                                            <form action="{{url('admin/products/skus_stock/update')}}" method="post" accept-charset="utf-8" class="mb-0"> 
                                              @csrf
                                              <input type="hidden" name="id" value="{{$sku->id}}">
                                            <input type="hidden" name="product_id" value="{{$Products[0]->id}}">   
                                              <input type="number" name="stock" value="{{$sku->stock??''}}" class=" mb-2 col-sm-5">
                                              <button type="submit" class="btn btn-sm btn-brand border text-black">update</button>
                                            </form>
                                          </td>
                                          <td class="edit-column">
                                            <a href="{{url('admin/products/skus/edit/'.$sku->id)}}" class="btn btn-default btn-edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('admin/products/skus/delete/'.$sku->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                        <hr style="margin: 10px 0;">
                        <p><strong>Attributes:</strong></p>
                         @foreach($attributes as $key=> $attribute)
                          <p>{{str_replace('_', ' ', ucwords($attribute??''))}} : {{$Products[0]->attributes[$attribute]->varinat_value??''}}</p>
                          
                          @endforeach
                        <hr style="margin: 10px 0;">
                        <p><b>Position Score:</b> {{$Products[0]->position_score??''}}</p>
                        <hr style="margin: 10px 0;">
                        <p><b>Slug:</b> {{$Products[0]->slug??''}}</p>
                        <p><b>SEO Title:</b> {{$Products[0]->seo_title??''}}</p>
                        <p><b>SEO Description:</b> {{$Products[0]->seo_desc??''}}</p>
                        <p><b>SEO Keywords:</b> {{$Products[0]->seo_keywords??''}}</p>
                        <hr style="margin: 10px 0;">
                        <a href="{{url('admin/products')}}" class="btn btn-sm btn-default border text-black mb-2"><i class="fas fa-chevron-left"></i> &nbsp; Back to All Products</a>
                        &nbsp;
                        <a href="{{url('admin/product/delete_product/'.Crypt::encryptString($Products[0]->id))}}" class="btn btn-danger btn-sm delete-confirm mb-2"><i class="fas fa-trash-alt"></i> Delete</a>
                        <br>
                        <small class="help-block">Deleting this Product will delete all the SKU's listed under it.</small>
                    </div>
                  </div> 
            </div>
<!-- Form End -->

@include('admin.products.product_images_dropzone')
@endsection
@push('scripts')

<script type="text/javascript">
  $(function () {

    var cat_id = $('#cat_id').val();

    

    var table = $('.images-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,

 ajax:{
                      url: "{{route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.products.upload.images')}}",
                      type: 'POST',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},                 
                      data: function (data) {
                          data.catid = $('#cat_id').val();
                 
                    }

                  },



        columns: [
            {data: 'id', name: 'id',orderable: false, searchable: false},
            {data: 'cname', name: 'cname',orderable: false, searchable: false},
            {data: 'thumbnails', name: 'thumbnails', orderable: true, searchable: true},
            {data: 'large', name: 'large', orderable: true, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     $(document).on("click",".nddelete",function(e){
    var id = $(this).attr('data-id');
        if (confirm("Delete Record?") == true) {
          var id = id;
          // ajax
          $.ajax({
            type:"POST",
            url: "{{ url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/bulk_images_upload/delete') }}",
            data: {_token: "{{ csrf_token() }}", id: id },
            dataType: 'json',
            success: function(res){
              var oTable = $('.images-data-table').dataTable();
              oTable.fnDraw(false);
            }
          });
        }
    });
    
  });
</script>

@endpush
