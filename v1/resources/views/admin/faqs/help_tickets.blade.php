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
                        <th>Issue</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Reply Message</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($support_data as $faq)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{ucwords($faq->fullname)??'' }}<br>{{$faq->email??'' }}<br>{{$faq->mobile??'' }}</td>
                          <td>{{$faq->issue??''}}</td>
                          <td>{{$faq->message??'' }}</td>
                          <td>{{ucwords($faq->status)??'' }}</td>
                          <td>{{ucwords($faq->status_remarks)??'' }}</td>
                          <td><a href="{{url('admin/support_leads/reply/'.$faq->id)}}" class="edit mr-2" title="Edit" >Reply</a></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection