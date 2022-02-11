@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')

    <div class="paddingleftright pt-2 pb-5" >
           
        @include('admin.alerts')
@include('admin.errors')
         
          @if(isset($users_data->id))

          
<form id="crudTable" action="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/profile/update')}} " method="POST"  enctype="multipart/form-data">

@else
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          
          <div class="form-group">
            <label><b>First Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="firstname" value="{{old('firstname',$users_data->firstname??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Last Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="lastname" value="{{old('lastname',$users_data->lastname??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span style="color: red;">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="{{old('email',$users_data->email??'')}}">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span style="color: red;">*</span></label>
                <input type="text" name="phone" id="title" class="form-control" value="{{old('phone',$users_data->phone??'')}}" required="required" >
          </div>
          
      
      <button type="submit" class="btn btn-brand btn-sm">Save</button>
	  
	  
		@if(isset(Auth::user()->role) && Auth::user()->role==1)
		<a href="{{url('admin/users')}}" class="btn btn-danger btn-sm">Back</a>
		@endif

        </div>
        <div class="col-md-5">
          <div class="form-group">
        <label>Profile<span style="color: red">*</span></label>       
        <input type="file"  name="profile" class="file-input" @if(isset($users_data->profile)) @else required @endif  />
      </div>
      <div class="form-group">
        @if(isset($users_data->profile) && !empty($users_data->profile))
        <img src="{{ asset('assets/uploads/' . $users_data->profile) }}" width="100"   />
        @else
        @endif
      </div>
          <div class="form-group">
        <label><b>Password</b><span style="color: red;">*</span></label>
        <input name="password" type="password" class="form-control"  pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpassword.pattern = this.value;" placeholder="Password" @if(isset($users_data->password)) @else required @endif>
      </div>
      <div class="form-group">
        <label><b>Confirm Password</b><span style="color: red;">*</span></label>
        <input name="cpassword" type="password" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Confirm Password"  @if(isset($users_data->password)) @else required @endif>
      </div>
      
        </div> 
        </form> 
      </div>
    </div>
    </div>
 
 @endsection


 