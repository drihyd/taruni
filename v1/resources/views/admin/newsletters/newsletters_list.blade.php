@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')			
            <div class="paddingleftright pt-2 pb-5" >
            	
   
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                      	<th>S.No.</th>
                        <th>email</th>
                        <th>Subscription</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($newsletters_data as $newsletter)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{$newsletter->email??''}}</td>
                          <td>{{Str::ucfirst($newsletter->subcribe??'')}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection