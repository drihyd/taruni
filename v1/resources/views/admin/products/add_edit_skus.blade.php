@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 
            <div class="row paddingleftright pt-3 pb-3 m-0">
                <div class="col-sm-6 pl-0 pr-0">
                    <form action="{{url('admin/products/skus/update')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                         
                        @csrf    
                         <input type="hidden" name="id" value="{{$skus->id}}">             
                          <legend>SKUS</legend>
                          <div class="form-group inline">
                            <label for="productName" class="control-label">SKU Code</label>
                            <input type="text" class="form-control input-sm" id="name" name="sku_code" value="{{old('sku_code',$skus->sku_code??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="size" class="control-label">Size</label>
                                <select class="form-control input-sm" id="size" name="size" required>
                                  <option value="">--Select Size--</option>
                                      <option value="S" {{$skus->variant_value == "S" ? 'selected':''}}>S</option>
                                      <option value="M" {{$skus->variant_value == "M" ? 'selected':''}}>M</option>
                                      <option value="L" {{$skus->variant_value == "L" ? 'selected':''}}>L</option>
                                      <option value="XL" {{$skus->variant_value == "XL" ? 'selected':''}}>XL</option>
                                      <option value="XXL" {{$skus->variant_value == "XXL" ? 'selected':''}}>XXL</option>
                                    </select>
                              </div>
                          <div class="form-group inline">
                            <label for="price_inr" class="control-label">Price (in INR)</label>
                            <input type="text" class="form-control input-sm" id="price_inr" name="price_inr" value="{{old('price_inr',$skus->price_inr??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="skuslug" class="control-label">Price (in USD)</label>
                            <input type="text" class="form-control input-sm " id="price_usd" name="price_usd" value="{{old('price_usd',$skus->price_usd??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="price_inr" class="control-label">Discount Price (in INR)</label>
                            <input type="text" class="form-control input-sm" id="price_inr" name="discount_price_inr" value="{{old('discount_price_inr',$skus->discount_price_inr??'')}}">
                          </div>
                          <div class="form-group inline">
                            <label for="skuslug" class="control-label">Discount Price (in USD)</label>
                            <input type="text" class="form-control input-sm " id="discount_price_usd" name="discount_price_usd" value="{{old('discount_price_usd',$skus->discount_price_usd??'')}}">
                          </div>
                          <div class="form-group inline">
                            <label for="skuslug" class="control-label">Stock</label>
                            <input type="text" class="form-control input-sm " id="stock" name="stock" value="{{old('stock',$skus->stock??'')}}" required>
                          </div>
                          <div class="form-group margin-top-30">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button> 
                            <!-- <a href="{{url('admin/skus/edit/'.Crypt::encryptString($skus->id))}}" class="btn btn-action-link">Cancel</a> -->
                          </div>
                        </form>
                </div>
            </div>
<!-- Form End -->
@endsection
@push('scripts')
  
@endpush
