@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <!-- Form Starts        -->
 
            <div class="row paddingleftright pt-3 pb-3 m-0">
                <div class="col-sm-6 pl-0 pr-0">
                    
                        <form action="{{url('admin/products/store')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                        @csrf                 
                          <legend>Basic Info</legend>
                          <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="productName" class="control-label">Name</label>
                            <input type="text" class="form-control input-sm nameForSlug" id="name" name="name" value="" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="productSlug" class="control-label">Slug</label>
                            <input type="text" class="form-control input-sm slugForName" id="slug" name="slug" value="" required>
                          </div>
                          
                          </div>
                          <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="productCode" class="control-label">Code</label>
                            <input type="text" class="form-control input-sm" id="productCode" name="code" value="" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="productCategory" class="control-label">Category</label>
                                <select class="form-control input-sm" id="productCategory" name="cat_id" required>
                                  <option value="">--Select Category--</option>
                                  @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{ucwords($category->name)}}</option>

                                      @endforeach
                                      
                                    </select>
                              </div>
                          </div>
                          <div class="row">
                            <!-- <div class="col-sm-3">
                              <div class="form-group ">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="productissale" value="1" autocomplete="off"> Is sale?
                              </label>
                            </div>
                          </div>
                              </div> -->
                          <div class="col-sm-3">
                            <div class="form-group ">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="unstitched" value="1" autocomplete="off"> unstitched
                              </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group ">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="newarrival" value="1" autocomplete="off"> Is New Arrival?
                              </label>
                            </div>
                          </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <label for="productPosScore" class="control-label">Position Score</label>
                            <input type="number" min="0" max="1000" class="form-control input-sm  col-sm-4" id="productPosScore" name="position_score" value="">
                            <div class="help-block"><small>Position Score is a number between 0 and 1000. Products are displayed in the descending order of their Position Score. Products with higher scores show up first.</small></div>
                          </div>
                          
                          <div class="form-group">
                            <label for="productDesc" class="control-label">Description</label>
                            <textarea class="form-control input-sm" style="max-width: 100%; min-width: 100%; min-height: 100px; border-radius: 0px;" id="productDesc" name="desc" required></textarea>
                          </div>
                          
                          <div class="form-group margin-top-30">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">Save Changes</button> <a href="https://www.taruni.in/manage/products/product_info/6568" class="btn btn-action-link">Cancel</a>
                          </div>
                        </form>
                </div>
            </div>
<!-- Form End -->
@endsection
@push('scripts')
  
@endpush
