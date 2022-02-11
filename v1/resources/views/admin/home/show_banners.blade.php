<div class="paddingleftright pt-2 pb-5" >
<div class="row" >
@foreach ($list_banners as $list_banner)
<div class="col-md-4 col-lg-4 pb-3">
<div class="card rounded-0">

<!-- <h5 class="text-center  m-0">{{$list_banner->name}}</h5> -->
<img class="card-img-top" src="{{URL::to('assets/uploads/'.$list_banner->image)}}" alt="">
<div class="card-footer text-right">

<!--<a class="text-left">Sorting: {{$loop->iteration}}</a>-->
@if($list_banner->is_show == 'yes')
<span>Active</span>
@else
<span>InActive</span>
@endif
<a href="{{url('admin/edit_homepagebanner/'.$list_banner->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/delete_homepagebanner/'.$list_banner->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
</div>
</div>
</div>
@endforeach 
</div>
</div>