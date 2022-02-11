@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
     
            <div class="paddingleftright custom-tabs">
                <p>Actions</p>
              </div>
              <div class="paddingleftright pt-3 pb-3 bg-bright">
                  <div class="col-sm-12 pl-0 pr-0">
                    <a href="{{url('admin/products')}}" class="btn btn-sm btn-default border text-black mb-2"><i class="fas fa-chevron-left"></i> &nbsp; Back to All Products</a>
                    &nbsp;
                    <a href="{{url('admin/products/edit/'.Crypt::encryptString($Products->id))}}" class="btn btn-warning btn-sm text-white mb-2"><i class="far fa-edit"></i> Edit</a> 
                    &nbsp;
                    <a href="{{url('admin/product/delete_product/'.Crypt::encryptString($Products->id))}}" class="btn btn-danger btn-sm delete-confirm mb-2"><i class="fas fa-trash-alt"></i> Delete</a>
                  </div>
              </div>
              
              <div>
                <div class="paddingleftright custom-tabs pt-3 pb-3">
                    <p class="mb-0">Product Info</p>
                </div>  
                <div class="row paddingleftright bg-bright white-sec pt-4 pb-4 m-0">
                    <div class="col-sm-6 pl-0 pr-0 mb-3">
                        <p>Name: {{ucwords($Products->name??'')}}</p>
                        <p>Code: {{$Products->code??''}}</p>
                        <p>Slug: {{$Products->slug??''}}</p>
                        <p>Category: <a href="#">{{$Products->cname??''}}</a></p>
                        <hr>
                        <p><strong>Attributes:</strong></p>
                        @if($product_attributes)
                        @foreach($product_attributes as $attributes)
                        <p>{{str_replace('_', ' ', ucwords($attributes->variant_name??''))}}: {{$attributes->varinat_value??''}}</p>
                        @endforeach
                        @endif
                        <hr>
                        <p>Images:<br></p>
                        <div class="prod-photos">
                          <a href="https://www.taruni.in/manage/application/../../assets/uploads/A900580_1.jpg" style="display: inline-block">
                            <img src="https://www.taruni.in/manage/application/../../assets/uploads/A900580_1.jpg" class="small-thumbnail" style="display:inline-block;">
                          </a>
                          <a href="https://www.taruni.in/manage/application/../../assets/uploads/A900580_2.jpg" style="display: inline-block">
                            <img src="https://www.taruni.in/manage/application/../../assets/uploads/A900580_2.jpg" class="small-thumbnail" style="display:inline-block;">
                          </a>
                          <a href="https://www.taruni.in/manage/application/../../assets/uploads/A900580_3.jpg" style="display: inline-block">
                            <img src="https://www.taruni.in/manage/application/../../assets/uploads/A900580_3.jpg" class="small-thumbnail" style="display:inline-block;">
                          </a>
                          <a href="https://www.taruni.in/manage/application/../../assets/uploads/A900580_dp.jpg" style="display: inline-block">
                            <img src="https://www.taruni.in/manage/application/../../assets/uploads/A900580_dp.jpg" class="small-thumbnail" style="display:inline-block;">
                          </a>
                    </div>
                    <p></p>
                    <p>Description: {{$Products->desc??''}}</p>
                    <p>Position Score: {{$Products->position_score??''}}</p>
                    <p><b>SEO Title:</b> {{$Products->seo_title??''}}</p>
                    <p><b>SEO Description:</b> {{$Products->seo_desc??''}}</p>
                    <p><b>SEO Keywords:</b> {{$Products->seo_keywords??''}}</p>
                    <br>
                    <a href="#" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit Details</a>
                      </div>
                      <div class="col-sm-6">        
                        <p><a href="#sub-skus-section" class="stat-value">{{$skus_count??''}}</a> SKU's</p>            
                      </div>
                  </div>
                  <div class="paddingleftright custom-tabs pt-3 pb-3">
                    <p class="mb-0">SKU's</p>
                  </div>
                  <div class="row paddingleftright bg-bright white-sec pt-3 pb-5 m-0">
                      <div class="col-sm-12 pl-0 pr-0">
                          <a href="#" class="btn btn-sm btn-default text-black border">+ Add an SKU</a>
                          @include('admin.products.sku_stock_table')
                      </div>
                  </div>
                
              </div>
@endsection
@push('scripts')
@endpush