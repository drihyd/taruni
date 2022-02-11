<html class="no-js" lang>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>{{env('APP_NAME')}} - {{$pageTitle??""}}</title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="robots" content="noodp">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">
      @stack('styles')
      <link rel="stylesheet" href="{{ URL::to('assets/admin/css/global.css') }}">
      <!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<!--<link rel="stylesheet" href="https://www.taruni.in/manage/css/style.css">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   
     

   </head>
<body class="vertical-layout admin-login-page">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-5 col-lg-5">
                        <!-- Start Auth Box -->
              
                        <div class="auth-box-right">
                            <div class="card border-0 p-2">
                                <div class="card-body">
                                   
                                    <form action="{{route('adminlogin.verification')}}" method="post">
                                       @csrf 
                                        <div class="form-head text-center mb-4">
                                         
                                            <a href="#" class="logo"><img src="{{ URL::to('assets/admin//img/logo.svg') }}" class="img-fluid" alt="logo" width="200px"></a>
                                      
                                        </div>                                        
                                        <h4 class="text-danger my-4 text-center">Admin Login</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="username" placeholder="Enter Email here" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name='password' id="password" placeholder="Enter Password here" required>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <!-- <div class="custom-control custom-checkbox text-left">
                                                  <input type="checkbox" class="custom-control-input" id="rememberme">
                                                  <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                                </div> -->                                
                                            </div>
                                            <!-- <div class="col-sm-6">
                                              <div class="forgot-psw"> 
                                                <a id="forgot-psw" href="{{url('/user-forgotpsw')}}" class="font-14">Forgot Password?</a>
                                              </div>
                                            </div> -->
                                        </div>                          
                                      <button type="submit" class="btn btn-brand btn-lg btn-block font-18">Log in</button>
                                    </form>
                                   <!-- <div class="login-or">
                                        <h6 class="text-muted">OR</h6>
                                    </div>
                                     <div class="social-login text-center">
                                        <button type="submit" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook mr-2"></i>Facebook</button>
                                        <button type="submit" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google mr-2"></i>Google</button>
                                    </div> -->
                                    <!-- <p class="mb-0 mt-3">Don't have a account? <a href="{{url('/user-register')}}">Sign up</a></p> -->
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
   @stack('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- CK editor -->
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/config.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/admin/ckeditor/styles.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('admin.common_pages.functions_js')
    
    
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif
  
    @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
  
  

  
</script>
   </body>
</html>