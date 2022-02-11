@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@if(!isset($theme_options_data->id))
<div class="paddingleftright pt-2 pb-5" >

      <div class="row justify-content-end p-0 m-0">
          <div class="col-auto float-right">
              <a href="{{url('admin/gtm_tracking/create')}}" class="btn btn-sm btn-brand card-add"><i class="fa fa-plus"></i> Add New</a>
          </div>
      </div>
 </div>
 @else
 @endif
  
  @if(isset($theme_options_data->id) && !empty($theme_options_data->id))            
 <div class="col-md-6 col-lg-5 my-2">
<div class="card h-100 mb-3 shadow">

<div class="card-header">GTM Tracking</div>
<div class="card-body">
<ul class="list-unstyled">




<li>
@if(isset($theme_options_data->google_analytics_script) && !empty($theme_options_data->google_analytics_script))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Google Analytics Script (header tag code)
</li>
<li>
@if(isset($theme_options_data->google_analytics_script_body) && !empty($theme_options_data->google_analytics_script_body))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Google Analytics Script (Body tag code)
</li>
<li>
@if(isset($theme_options_data->facebook_pixels_script) && !empty($theme_options_data->facebook_pixels_script))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Facebook pixels script (header tag code)
</li>
<li>
@if(isset($theme_options_data->facebook_pixels_script_body) && !empty($theme_options_data->facebook_pixels_script_body))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Facebook pixels script (Body tag code)
</li>
<li>
@if(isset($theme_options_data->google_adwords_script) && !empty($theme_options_data->google_adwords_script))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Google Adwords Script
</li>
<li>
@if(isset($theme_options_data->google_remarketing_script) && !empty($theme_options_data->google_remarketing_script))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Google Remarketing Script
</li>
<li>
@if(isset($theme_options_data->live_chat_script) && !empty($theme_options_data->live_chat_script))
<i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i>
@else
<i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i>
@endif
Live Chat Script
</li>


</ul>
</div>
<div class="card-footer text-right">

<a href="{{url('admin/gtm_tracking/edit/'.$theme_options_data->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
        <a href="{{url('admin/gtm_tracking/delete/'.$theme_options_data->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fas fa-trash-alt"></i></a>
</div>
</div>
</div>
@else
@endif
              
                  
@endsection