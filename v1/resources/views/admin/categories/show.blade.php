@extends('admin.template_v1')
@section('content')
<div class="paddingleftright pt-2 pb-5" >
<h4>{{$page->name??''}}</h4>

{!! html_entity_decode($page->description) !!}


</div>
@endsection