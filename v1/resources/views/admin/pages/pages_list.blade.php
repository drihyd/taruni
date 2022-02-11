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
                  	 @foreach($pages_data as $page)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{$page->name }}</td>
                          <td>{{$page->slug }}</td>
                          <td>{!! Str::limit(html_entity_decode($page->description), 150) !!}</td>

                          <td width="10%">
                          	<form action="{{ route('pages.destroy',$page->id) }}" method="POST">
                          	<a  href="{{ route('pages.show',$page->id) }}"><i class="fas fa-eye"></i></a>&nbsp;
                          	<a href="{{ route('pages.edit',$page->id) }}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i>
                          	</a>
                          	
                          	<button type="submit"  class="fas fa-trash-alt btn btn-none" onclick="return confirm('Are you sure to delete this?')" style="box-shadow: none; outline: none; background: unset; cursor: pointer; padding: 0;">
                          	</button>
                          	@csrf
                    @method('DELETE')
                </form>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection