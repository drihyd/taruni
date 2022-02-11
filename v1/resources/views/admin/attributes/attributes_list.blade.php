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
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($attributes_data as $attribute)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{ucwords($attribute->attr_name)??''}}</td>
                          <td>{{$attribute->slug??''}}</td>

                          <td width="10%">
                          	<a href="{{url('admin/attributes/edit/'.$attribute->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/attributes/delete/'.$attribute->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection