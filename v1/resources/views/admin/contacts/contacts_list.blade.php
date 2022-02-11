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
                        <th>Name</th>
                        <th>email</th>
                        <th>Mobile</th>
                        <th>Message</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($contacts_data as $contact)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{ucwords($contact->name)??''}}</td>
                          <td>{{$contact->email??''}}</td>
                          <td>{{$contact->mobile??''}}</td>
                          <td>{{$contact->message??''}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection