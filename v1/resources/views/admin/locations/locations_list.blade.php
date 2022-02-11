@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')


@include('admin.alerts')
@include('admin.errors')
 
  <div class="paddingleftright pt-2 pb-5" >
        <div class="row p-0 m-0">
 @foreach($locations_data as $location)
  <div class="col-sm-4 pl-1 pr-1">
    <div class="card locations-card mb-2">
      
      <div class="card-body">
        <h4 class="card-title">{{$location->name??''}}</h4>
        <p style="line-height: 1.5;font-weight: 500">{{$location->plot_no??''}}<br>{{$location->street??''}}<br>{{$location->city??''}}<br>Ph: {{$location->primary_phone??''}}/{{$location->secondary_phone??''}}<br></p>
      </div>
      <div class="map-responsive">
      	{!! $location->map_iframe??'' !!}<br>
      </div>
      <div class="card-footer text-right">
<a href="{{url('admin/location/edit/'.$location->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/location/delete/'.$location->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
</div>
    </div>
  </div>
@endforeach
  
</div>
  
  </div>
              
                  
@endsection