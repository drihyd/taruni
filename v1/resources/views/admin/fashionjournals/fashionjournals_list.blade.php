@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')

  <div class="paddingleftright pt-2 pb-5" >
        <div class="row p-0 m-0">
 @foreach($fashionjournals_data as $fashionjournals)
  <div class="row mb-3">
              <div class="col-sm-6 pr-md-0">
                <div class="wrapper mobile-image" style="background: url({{ URL::to('assets/uploads/'.$fashionjournals->image??'') }}) center center no-repeat; background-size: cover; height: 100%">
                </div>
              </div>
              <div class="col-sm-6 pl-md-0">
                <div class="wrapper p-sm-5 p-4 bg-bright">
                  <h4>"{{$fashionjournals->title??''}}"</h4>
                  <P>{{date('d M, Y', strtotime($fashionjournals->date??''))}}</P>
                  <p class="mt-4">{{$fashionjournals->description??''}}</p>
                  <div class="float-right">
                  <a href="{{url('admin/fashionjournals/edit/'.$fashionjournals->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
                  <a href="{{url('admin/fashionjournals/'.$fashionjournals->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </div>
                            
              </div>

            </div>
@endforeach
  
</div>
  
  </div>
              
                  
@endsection