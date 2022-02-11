@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
			
            <div class="paddingleftright pt-2 pb-5" >
            	
    <div class="float-right">
    	<a href="{{ url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories/create') }}" class="btn btn-brand">+ Add Parent/Child Category</a>
      <!-- <a href="" class="btn btn-brand">+ Add Child Category</a> -->
    </div>
                <!-- <table id="orders-table" class="table customdatatable" style="width:100%"> -->
                <table  class="table customdatatable no-footer" style="width:100%">
                  <thead class="thead-dark ">
                      <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Department</th>
						@if(isset(Auth::user()->role) && Auth::user()->role==1)	
						<th>Export Products</th>
						<th>Import Products</th>
						@endif
						<th>Upload Images</th>
						@if(isset(Auth::user()->role) && Auth::user()->role==1)	
                        <th>Actions</th>
						@endif
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($categories_data as $category)
                     @if($category->parent_id == 0)
                      <tr>
                          <td>{{$loop->iteration}}</td>
						<!-- <td><a href="{{url('admin/categories/edit/'.$category->id)}}" class="edit mr-2" title="Edit" >{{ucwords($category->name) }}</a></td> -->
            <td>
			
		
		<a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories/edit/'.Crypt::encryptString($category->id))}}" class="edit mr-2" title="Edit" >
			    
			    
			    <strong>{{ucwords($category->name) }}</strong>
			    
			    </a>
			</td>
						<td>{{ucwords($category->dept_name??'') }}</td>


			@if(isset(Auth::user()->role) && Auth::user()->role==1)	
			<td>
			@if($category->applicable_attributes)
			<a href="{{route('products.export.products',['cat' =>Crypt::encryptString($category->id)])}}" title="Export Products" alt="Export Products"><i class="fas fa-download"></i></a>
			@endif
			</td>
			<td><a href="{{route('products.import.export',['cat' =>Crypt::encryptString($category->id)])}}" title="Import Products" alt="Import Products"><i class="fas fa-file-import"></i></a></td>
			@endif
						 
						 
						 <td><a href="{{route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.products.upload.images',['cat' =>Crypt::encryptString($category->id)])}}" title="Upload Images" alt="Upload Images"><i class="fas fa-image"></i></a></td>
						 
						 
						 
						 
						 @if(isset(Auth::user()->role) && Auth::user()->role==1)
                          <td width="10%">
            
                          	
                            
							@if(isset(Auth::user()->role) && Auth::user()->role==1)	
							<a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories/edit/'.Crypt::encryptString($category->id))}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
							&nbsp;&nbsp;						
							<a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories/delete/'.$category->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
							@else
								
							@endif
                          </td>
						  
						  @endif
						  
                      </tr>
                     
                      @endif
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection