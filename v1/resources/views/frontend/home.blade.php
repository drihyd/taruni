@extends('frontend.template_v1')
@section('title', 'Home')
@section('content')
@php




$list_banners = DB::table('project_photos')->orderBy('sorting', 'ASC')->get()->where("project_id",0)->where('type','banner')->where('is_show','yes'); 
$testimonials = DB::table('testimonials')->get();




$fashionjournals_data=DB::table('fashionjournals')->get();
$collections_data=DB::table('collections')->take(3)->get();

  


@endphp
<section class="pb-0">
      <div class="container pr-sm-0">
        <div class="banner-slider">
          @if($list_banners)
          @foreach($list_banners as $banner)
        <div>
          <div class="slider-wrapper">
            <a href="{{$banner->banner_url??''}}">
            <img src="{{ URL::to('assets/uploads/'.$banner->image??'')}}" class="img-fluid" alt="Shop for  Taruni’s Latest Arrivals Online" title="Shop for  Taruni’s Latest Arrivals Online" width="100%"></a>
          </div>
        </div>
        @endforeach
        @endif
        
      </div>
      <div class="row highlights-row mt-3">
        <div class="col-sm-2 first">
          <div class="wrapper">
            <h3>FREE<br>SHIPPING</h3>
          </div>
        </div>
        <div class="col-sm-4 highlights-divider second">
          <div class="wrapper">  		  
		
		<p class="mb-0">For International orders above US ${{$shipping_rates_usd->ending_price??225}}</p><hr>
		<p class="mb-0" >Across India for orders above Rs. {{$shipping_rates_inr->ending_price??1000}}</p>
			
			
          </div>
        </div>
        <!-- <div class="col-sm-4 highlights-divider">
          <div class="wrapper text-center">
            <h3>NEW USERS<br>WELCOME CODE: WLCM10</h3>
          </div>
        </div> -->
        <div class="col-sm-6 highlights-divider last">
          <div class="wrapper text-center">
            <h3>ALTERATIONS & CUSTOMIZATION</h3>
          </div>
        </div>
      </div>
      </div>
    </section>
    
	
	@if($recently_viewed->count()>0)	
	@include('frontend.new_arrivals')
	@endif
	
	
	
    
	
	

    <section class="pb-0 card-sec">
      <div class="container">
        <div class="row">
          @foreach($collections_data as $collection)
          <div class="col-sm-4">
            <div class="wrapper mb-4">
              <a href="{{$collection->link??''}}" alt="{{$collection->title}}" title="{{$collection->title}}">
              <div class="card-img" style="background: url({{ URL::to('assets/uploads/'.$collection->image??'') }})top center no-repeat;background-size: cover;height: 430px;">
                <div class="card-content">
                  <!-- <h1 class="text-bright">{{Str::upper($collection->title??'')}}</h1> -->
                </div>
              </div>
              </a>
            </div>
          </div>
          @endforeach
        </div>
        <!--<div class="shopnow-container text-center">-->
        <!--  <a href="#" class="shopnow-btn">SHOP NOW</a>-->
        <!--</div>-->
      </div>
    </section>

    <section class="fashion-jouranl-sec">
      <div class="container">
        <h3>Fashion Journals</h3>
        <div class="journal-slider">
          @foreach($fashionjournals_data as $fashionjournals)
          <div>
            <a href="{{$fashionjournals->link??''}}" alt="{{$fashionjournals->title}}" title="{{$fashionjournals->title}}">
            <div class="row">
              <div class="col-sm-6 pr-md-0">
                <div class="wrapper mobile-image" style="background: url({{ URL::to('assets/uploads/'.$fashionjournals->image??'') }}) center left no-repeat; background-size: cover; height: 100%">
                </div>
              </div>
              <div class="col-sm-6 pl-md-0">
                <div class="wrapper p-sm-5 p-4 bg-bright">
                  <h4>"{{$fashionjournals->title}}"</h4>
                  <P>{{date('d M, Y', strtotime($fashionjournals->date??''))}}</P>
                  <p class="mt-4">{{$fashionjournals->description??''}}</p>
                </div>
              </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
        
      </div>
    </section>

    <section class="testimonial-sec">
      <div class="container">
        <h3 class="text-center">Testimonials</h3>
        <div class="testimonial-slider mt-4" id="testimonials">
          @if($testimonials)
          @foreach($testimonials as $testimonial)
          <div>
            <div class="slider-wrapper text-center">
              <div class="testimonial-img" style="width: 100px;height: 100px;background: url({{ URL::to('assets/uploads/'.$testimonial->image??'') }}) center center no-repeat;border-radius: 50%;margin: auto;background-size: cover;"></div>
              
              <p class="mt-3 testi-content">{{$testimonial->description??''}}</p>
              <p>- <b>{{ucwords($testimonial->name)??''}}</b></p>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </section>
@endsection