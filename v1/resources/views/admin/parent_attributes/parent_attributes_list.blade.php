@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')			
            <div class="paddingleftright pt-2 pb-5" >
            	
   
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                      	<th width="10%">S.No.</th>
                        <th>Attribute Name</th>
                        <th>Slug</th>
                        <th>Position</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($parent_attributes_data as $parent_attribute)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{ucwords($parent_attribute->name)??''}}</td>
                          <td>{{$parent_attribute->slug??''}}</td>
                          <td>{{$parent_attribute->position??''}}</td>

                          <td width="10%">
                          	<a href="{{url('admin/parent_attributes/edit/'.$parent_attribute->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/parent_attributes/delete/'.$parent_attribute->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection