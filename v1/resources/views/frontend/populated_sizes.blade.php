@if($Categories)	
@php
$available_sizes=$Categories[0]->available_sizes??'';
@endphp	
@if($available_sizes)
@foreach($Categories[0]->available_sizes as $key=>$psize)
<label class="btn btn-size-select btn-xs " title="{{$psize->variant_value}}: Available">
<input type="checkbox" name="sizes[]" value="{{$psize->variant_value}}" id="size_{{$psize->variant_value}}" autocomplete="off">{{$psize->variant_value}}
</label>
@endforeach	
@endif
@else
@endif