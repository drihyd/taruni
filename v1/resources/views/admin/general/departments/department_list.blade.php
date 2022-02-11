@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')		
            <div class="paddingleftright pt-2 pb-5" >
            	
                <div class="table-responsive"></div>
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                      	<th width="10%">S.No.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($departments_data as $department)
                      <tr >
                        <td>{{$loop->iteration}}</td>
                          <td>{{ucwords($department->dept_name)??''}}</td>
                          <td>{{$department->dept_slug??''}}</td>

                          <td width="10%">
                            <a href="{{url('admin/departments/edit/'.Crypt::encryptString($department->id))}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/departments/delete/'.Crypt::encryptString($department->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            </div>
@endsection