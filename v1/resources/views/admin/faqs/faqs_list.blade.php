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
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($faqs_data as $faq)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{$faq->page_title }}</td>
                          <td>{{$faq->slug }}</td>
                          <td>{!! Str::limit(html_entity_decode($faq->page_content), 150) !!}</td>

                          <td width="10%">
                          	<a href="{{url('admin/faqs/edit/'.$faq->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/faqs/delete/'.$faq->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection