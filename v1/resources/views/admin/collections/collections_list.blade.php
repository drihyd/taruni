@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')

  <div class="paddingleftright pt-2 pb-5" >
        <div class="row p-0 m-0">
 @foreach($collections_data as $collection)
              <div class="col-sm-4 pr-1 pl-1">
                <div class="card mb-2">
                  
      <div class="card-body" >
        <h4>{{$collection->title??''}}</h4>
        <img src="{{ URL::to('assets/uploads/'.$collection->image??'') }}" class="img-fluid" style="max-height: 370px; width: 100%;">
                 
              </div>

              <div class="card-footer text-right">
<a href="{{url('admin/collections/edit/'.Crypt::encryptString($collection->id))}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
                  <a href="{{url('admin/collections/'.Crypt::encryptString($collection->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
</div>
            </div>

  
</div>
@endforeach
  
  </div>
              
                  
@endsection