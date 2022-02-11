@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp

<html class="no-js" lang>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
	  @if($theme_options_data)
<link rel="shortcut icon" href="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}" type="image/x-icon">
@endif

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
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     

   </head>
   <body>
      <div class="sidebar-wrapper">
          <!-- Sidebar -->
		  
		  
		  @if(Auth::user()->role==1)
			@include('admin.common_pages.sidebar')
		  @elseif(Auth::user()->role==2)
			@include('admin.common_pages.finance_sidebar')
		  @elseif(Auth::user()->role==3)
			@include('admin.common_pages.content_sidebar')
			 @elseif(Auth::user()->role==4)
			@include('admin.common_pages.general_sidebar')
		  @else
			@include('admin.common_pages.norole')
		  @endif
          
          <!-- Page Content -->
          <div id="content">

              @include('admin.common_pages.nav')
              
              @yield('content')
          </div>
      </div>
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="{{URL::to('assets/scripts/parsley.min.js') }}"></script>
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
 @stack('scripts')
    
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
<script>
   $('form').parsley();

   $(function() {
    console.log( "ready!" );
$(".collapse ul li").each(function() {

       if ( $(this).hasClass('active') ) {
          $(this).closest('.card').find('.card-header .btn').removeClass('collapsed'); 
          $(this).closest('.card').find('.collapse').addClass('show');

       }  
    });

   })
 </script> 
   </body>
</html>