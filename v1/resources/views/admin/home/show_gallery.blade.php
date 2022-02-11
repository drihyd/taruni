<div class="row" id="floorplans">
@foreach ($list_gallery as $gallery)
<div class="col-md-3 col-lg-3">
<div class="card rounded-0">
<img class="card-img-top" src="{{URL::to('assets/uploads/'.$gallery->image)}}" alt="">
<div class="card-footer text-right">

<!--<a class="text-left">Sorting: {{$loop->iteration}}</a>-->
<a href="{{url('admin/edit_homegallery/'.$gallery->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/delete_homegallery/'.$gallery->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
</div>
</div>
</div>
@endforeach 
</div>