@extends('frontend.template_v1')
@section('title',$page_data->name??'')
@section('content')
<section class="staticpage-card">
<div class="container">
<div class="col-sm-12 p-0">
<h2 class="text-dark">@yield('title')</h2>
<p><p>&nbsp;</p>
{!! html_entity_decode($page_data->description??'') !!}
</div>
</div>
</section>

@endsection