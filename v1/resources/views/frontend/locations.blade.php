@extends('frontend.template_v1')
@section('content')


<section>
      <div class="container pl-sm-0">	
	  
	  {{ Breadcrumbs::render('loacation', 'Store Locations') }}  
        <div class="row">
          <div class="col-sm-12">
          <h2 class="text-dark">{{$pageTitle??''}}</h2>
          </div>
        </div>
        <div class="row">
          @foreach($locations_data as $location)
  <div class="col-sm-4 pl-1 pr-1">
    <div class="card locations-card mb-2">
      
      <div class="card-body p-3">
        <h4 class="card-title">{{Str::ucfirst($location->name??'')}}</h4>
        <p style="line-height: 1.5;">{{$location->plot_no??''}}<br>{{$location->street??''}}<br>{{Str::ucfirst($location->city??'')}}<br>
          @if($location->primary_phone)
          Ph: {{$location->primary_phone??''}}
          @endif
          @if($location->secondary_phone)
          /{{$location->secondary_phone??''}}
          @endif
          <br></p>
      </div>
      <div class="map-responsive">
        {!! $location->map_iframe??'' !!}<br>
      </div>
    </div>
  </div>
  @endforeach
</div>
      </div>
    </section>

    @endsection