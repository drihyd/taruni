@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
     
            <div class="paddingleftright pt-2 pb-5" >
              
   
                <!-- <table id="orders-table" class="table customdatatable" style="width:100%"> -->
<div class="form-group">
<label>Categories<span style="color: red">*</span></label>

<select id='cat_id' name="cat_id" class="form-control col-md-4" required="required">
<option value="">--All--</option>
@foreach($categories as $category)
<option value="{{$category->id}}"  {{ $categoryid == $category->id ? 'selected':''}} >{{ucwords($category->name??'')}}</option>
@endforeach
</select>
</div>

                <table  class="table table-bordered  product-data-table customdatatable" style="width:100%">
                  <thead >
                      <tr>
                        <th width="10%">Product Image</th>
                        <th>Product Name</th>
                        <th>SKU Code</th>
                        <th>Size</th>
                        <th>Stock</th>
                        <th>Price (INR)</th>
                        <th>Price (USD)</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody >
                    
                  </tbody>
              </table>
            </div>
@endsection
@push('scripts')
@endpush