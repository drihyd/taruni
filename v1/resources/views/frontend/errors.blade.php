
@if($message = Session::get('success'))
<div class="paddingleftright pt-2 pb-2" >
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Success!</strong> {{ isset($success) ? $info : Session::get('success') }}
</div>	
@endif

@if(isset($error) || Session::has('error') )
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Error!</strong> {{ isset($error) ? $info : Session::get('error') }}
</div>
@endif

@if(isset($warning) || Session::has('warning') )
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Warning!</strong> {{ isset($warning) ? $info : Session::get('warning') }}
	</div>
@endif

@if(isset($info) || Session::has('info') )
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Info!</strong> {{ isset($info) ? $info : Session::get('info') }}
	</div>

</div>
@endif