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
          <h2>My Addresses</h2>
      </div>
      <div class="col-sm-6">
          <a href="{{url('myaddresses/create')}}" class="float-right btn btn-brand"><span class="fa fa-plus"></span>&nbsp;Add New</a>
      </div>
    </div>
      <div class="row">
        @foreach($address_data as $address)
        <div class="col-sm-6 pt-sm-0 pt-2">
                <div class="card price-box" >
                  <div class="ribbon">
                    <span>{{ucwords($address->addtype)??''}}</span>
                  </div>
                  <div class="card-body content">
                    <table class="table">
                <tbody>
                  <tr>
                    <td colspan="2" class="">
                        <h5><i><u>{{ucwords($address->address_title)??''}}</u></i></h5>
						{{ucwords($address->firstname)??''}} {{ucwords($address->lastname)??''}}<br>
                        {{ucwords($address->address)??''}}<br>
                        {{ucwords($address->city)??''}}<br>{{ucwords($address->state)??''}}, {{ucwords($address->country)??''}}<br>Phone: {{$address->phone??''}}<br>                       Email: {{ucwords($address->email)??''}}<br></td>
                  </tr>
                  <tr>
                    <td>
                      <a href="{{url('myaddresses/edit/'.$address->id)}}"><span class="fa fa-edit"></span> Edit</a> 
                    </td>
                    <td>
                      <!-- <a href=""><span class="fa fa-asterisk"></span> Set Default</a>  -->
                      @if($address->is_default == "Yes")
                     <!-- <p class="m-0 text-dark">Default</p>-->
                      @else
                      @endif
                    </td>
                    <td>
                      <a  href="{{url('myaddresses/delete/'.$address->id)}}" onclick="return confirm('Are you sure?')"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>
                </tbody>
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