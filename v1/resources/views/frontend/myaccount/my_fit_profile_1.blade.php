@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
<section class="my-account-sec">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
          <div class="my-account-area">
            
            
@include('frontend.myaccount.mysidebar')
            
            <div id="account-details-area">
      <div class="row">
        <div class="col-sm-6">
          <h2>My Fit Profile</h2>
      </div>
      <div class="col-sm-6">
          <a href="{{url('myfitprofile/add')}}" class="float-right btn btn-brand"><span class="fa fa-plus"></span>&nbsp;Add New</a>
      </div>
    </div>
      <div class="row">
        @foreach($my_fit_profile_data as $my_fit_profile)
        <div class="col-sm-6 pt-sm-0 pt-2">
                <div class="card" >
                  <div class="card-body content">
                    <table class="table">
                <tbody>
                  <tr>
                    <td colspan="2" class="">
                        <h5>{{ucwords($my_fit_profile->profile_name)??''}}</h5>
                        <h6 class="mt-2"><b>Attach Sleeves</b></h6>
                        Sleeve Length: {{ucwords($my_fit_profile->sleeve_length.' inches')??''}}<br>
                        Armhole: {{ucwords($my_fit_profile->armhole.' inches')??''}}<br>
                        Sleeve Circumference: {{ucwords($my_fit_profile->sleeve_circumference.' inches')??''}}<br>

                        @php
$user_ID=auth()->user()->id;
                        $body_data=DB::table('my_fit_profile')
            ->where('type','body')
            ->where('slug',$my_fit_profile->slug)
            ->where("user_id",$user_ID)
            ->get()->first();

                        @endphp
                        <h6 class="mt-2"><b>Body Measurements</b></h6>
                        Chest: {{ucwords($body_data->chest.' inches')??''}}<br>
                        Waist: {{ucwords($body_data->waist.' inches')??''}}<br>
                        Hips: {{ucwords($body_data->hips.' inches')??''}}<br>
                        Top Length: {{ucwords($body_data->top_length.' inches')??''}}<br>
                        </td>


                  </tr>
                  <tr>
                   
                </tbody>
                <tr>
                    
                    <td>
                      <a href="{{url('myfitprofile/edit/'.$my_fit_profile->slug)}}"><span class="fa fa-cog"></span> Edit</a> 
                    </td>
                    
                    <td class="float-right">
                      <a  href="{{url('myfitprofile/delete/'.$my_fit_profile->id)}}" onclick="return confirm('Are you sure?')"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>
              </table>
                  </div>
                </div>
              </div>
              @endforeach
              
      </div>
    </div>
  </div>

                                
            </div> <!-- ./account-details-area -->
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection