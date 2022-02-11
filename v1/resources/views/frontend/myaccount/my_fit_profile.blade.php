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
              
              <div id="account-menu-toggle" class="btn btn-custom btn-brand btn-sm"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</div>
              
                  <h2 class="smaller section-title">{{ucwords($pageTitle)??''}}</h2>
                  
        
          <div class="width-80-desktop">
            <div class="card" >
    <div class="card-body p-3">
<div class="alter-box">
  <h3 class="modal-title mb-2"><img src="https://taruni.in/img/icn-alteration.png" class="alterations-icn" alt="Alterations" title="Alterations">  Alterations</h3>
  <fieldset>
    
    @if($my_fit_profile_data->id??'')
<form method="POST" class="Addnewblog" action="{{ url('myfitprofile/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$my_fit_profile_data->id}}">
@else
    <form action="{{url('myfitprofile/store')}}" id="dress-alt-form" class="clearfix" method="post" accept-charset="utf-8" data-parsley-validate>
      @endif
      @csrf
      <div class="form-wrap">
      <div class="form-group">
        <label for="sleeveLength">Profile Name</label>
        <input type="text" name="profile_name" id="name" class="form-control col-md-6" value="{{old('profile_name',$my_fit_profile_data->profile_name??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i" required="required">
      </div>
    </div>
      
        <label style="font-size: 14px;">
          <div class="form-group">
           Attach Sleeves (in Inches) </label>
          </div>
      
      <div  id="sleeveAttach_data">
      <table class="table table-sm alt-table"  >
        <tbody>
          <tr>
            <td class="label-td">
              <label for="sleeveLength">1. Sleeve Length</label>
            </td>
            <td>
              <input type="text" class="form-control input-sm" name="sleeve_length" id="chest" value="{{old('sleeve_length',$my_fit_profile_data->sleeve_length??'')}}"> </td>
            <td class="label-td">
              <label for="sleeveArmhole">2. Armhole</label>
            </td>
            <td>
              <input type="text" class="form-control input-sm" name="armhole" id="waist" value="{{old('armhole',$my_fit_profile_data->armhole??'')}}"> </td>
          </tr>
          <tr>
            <td class="label-td">
              <label for="sleeveCircumference">3. Sleeve Circumference</label>
            </td>
            <td>
              <input id="hip" type="text" class="form-control input-sm" name="sleeve_circumference" value="{{old('sleeve_circumference',$my_fit_profile_data->sleeve_circumference??'')}}"> </td>
          </tr>
        </tbody>
      </table>
      </div>
        <fieldset>
          <hr>
          <p>Provide <span style="color:red">"Body"</span> Measurements (in Inches)</p>
          <table class="table table-sm alt-table">
            <tbody>
              <tr>
                <td class="label-td">
                  <label for="chest">1. Chest (<span style="color:red; font-weight: normal;">body</span>)</label>
                </td>
                <td>
                  <input type="text" class="form-control input-sm" name="chest" id="chest" value="{{old('chest',$body_fit_profile_data->chest??'')}}"> </td>
                <td class="label-td">
                  <label for="waist">2. Waist (<span style="color:red; font-weight: normal;">body</span>)</label>
                </td>
                <td>
                  <input type="text" class="form-control input-sm" name="waist" id="waist" value="{{old('waist',$body_fit_profile_data->waist??'')}}"> </td>
              </tr>
              <tr>
                <td class="label-td">
                  <label for="hip">3. Hips (<span style="color:red; font-weight: normal;">body</span>)</label>
                </td>
                <td>
                  <input id="hip" type="text" class="form-control input-sm" name="hips" value="{{old('hips',$body_fit_profile_data->hips??'')}}"> </td>
                <td class="label-td">
                  <label for="dressLength">4. Top Length (<span style="color:blue; font-weight: normal;">dress</span>)</label>
                </td>
                <td>
                  <input type="text" class="form-control input-sm" name="top_length" id="dressLength" value="{{old('top_length',$body_fit_profile_data->top_length??'')}}"> </td>
              </tr>
            </tbody>
          </table>
     
          <input type="hidden" name="fit_slug"  value="{{$my_fit_profile_data->slug??''}}">
          <div class="form-group cta">
            <div id="dress-alt-message"></div>
            <div style="font-size: 16px; margin-bottom: 12px;"><strong style="color: red;">Note:</strong> Please make sure Chest, Waist and Hip sizes are <strong>"body"</strong> measurements only.</div>
            <button type="submit" class="btn btn-brand mt-2" id="btnSubmitDressAlt">Submit</button>
          </div>
        </fieldset>
      </form>
</div>
          </div> <!-- ./width-80-desktop -->
        </div>
      </div>
                                
            </div> <!-- ./account-details-area -->
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection

