@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
			
            <div class="paddingleftright pt-2 mb-5" >
            	
   <div class="row m-0">
                <div class="col-md-6 card">
           <div class="p-4 card-body">
		   
		   
		   <form action="{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.dropzone.store') }}" id="my-great-dropzone" class="dropzone" method="post" enctype="multipart/form-data">
 
		   
		   
            
                @csrf
                
				
			

            <input type="hidden" name="cat_id" id="cat_id" value="{{$cat_id}}">	
				
            </form>
			
			
			
        </div>
		 </div>
		<div class="col-md-1"></div>
		     <div class="col-md-5 card">
            <div class="p-4 card-body">
                <h4><b>Instructions:</b> Please Optimize the Images to the Best Performance.(Format:Example NVT 268 1.jpg,NVT 268 2.jpg)</h4>
            <p>For Optimizing the Images Please <a href="https://imagecompressor.com/" target="_blank">Click Here</a></p>
              
            </div>
        
        </div>
		</div>

<!-- <div class="row justify-content-between mb-3 mt-5 card">
    <div class="col-md-8 mt-2">
<h5 class="d-inline ">Search by Product code</h5>
</div>
<div class="col-md-4 mt-2">
    <form method="post" action="{{url('admin/bulk_images_upload')}}"> 
        @csrf
<div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="filename" value="">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  </form>
  </div>
  </div> -->
           
			
			<div class="row ml-0">
    <div class="col-md-8 mt-2 card">
	 <div class="p-4 card-body">
	<p>
	<b><strong>Instructions:</strong></b><br>
	<strong>skucode_1.jpg</strong> (This pattern image showing on product cart panel and dimension is: 500*500)<br>
	<strong>skucode_2.jpg,skucode_3.jpg</strong> etc (This pattern name images showing on single product page like gallery and dimension is: 1000*1000)<br>
	
	
	
	</p>
	</div>
	</div>
	</div>
			 </div>
			
            <div class="paddingleftright pt-2 pb-5" >
                <table  class="table table-bordered  images-data-table customdatatable" style="width:100%">
                  <thead >
                      <tr>
                        <th >ID</th>
                        <th>Category</th>
						 <th>SKU Code</th>
                        <th>Thumbnail</th>
                        <th>Large Image</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody >
                    
                  </tbody>
              </table>
            </div>
@endsection
@push('scripts')

<script type="text/javascript">
  $(function () {

    var cat_id = $('#cat_id').val();

    

    var table = $('.images-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,

 ajax:{
                      url: "{{route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.products.upload.images')}}",
                      type: 'POST',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},                 
                      data: function (data) {
                          data.catid = $('#cat_id').val();
                 
                    }

                  },



        columns: [
            {data: 'id', name: 'id',orderable: false, searchable: false},
            {data: 'cname', name: 'cname',orderable: false, searchable: false},
			 {data: 'skucode', name: 'skucode',orderable: true, searchable: true},
            {data: 'thumbnails', name: 'thumbnails', orderable: true, searchable: true},
            {data: 'large', name: 'large', orderable: true, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     $(document).on("click",".nddelete",function(e){
		 
		 	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		 
		 
    var id = $(this).attr('data-id');
        if (confirm("Are you sure delete this product image?") == true) {
          var id = id;
          // ajax
          $.ajax({
            type:"POST",
            url: "{{ url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/bulk_images_upload/delete') }}",
            data: {_token: "{{ csrf_token() }}", id: id },
            dataType: 'json',
            success: function(res){
				
				toastr.success(res.message);
              var oTable = $('.images-data-table').dataTable();
              oTable.fnDraw(false);
			  
			  
            }
          });
        }
    });
    
  });
</script>

@endpush
