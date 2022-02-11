@extends('frontend.template_v1')
@section('title',$faqs_data->page_title??'')
@section('content')
<section class="staticpage-card">
<div class="container">
<div class="col-sm-12 p-0">
<h2 class="text-dark">@yield('title')</h2>
<p><p>&nbsp;</p>
{!! html_entity_decode($faqs_data->page_content??'') !!}
</div>
</div>
</section>
@endsection