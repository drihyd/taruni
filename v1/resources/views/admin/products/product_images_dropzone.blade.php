<div class="paddingleftright pt-2 mb-5" >

  <h3>Images Upload</h3>
              
   <div class="row m-0">
                <div class="col-md-6 card">
           <div class="p-4 card-body">
       
       
       <form action="{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.dropzone.store') }}" id="my-great-dropzone" class="dropzone" method="post" enctype="multipart/form-data">
 
       
       
            
                @csrf
                
        
      

            <input type="hidden" name="cat_id" id="cat_id" value="{{$Products[0]->cat_id??''}}"> 
        
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
            </div>
            <div class="paddingleftright pt-2 pb-5" >
                <table  class="table table-bordered  images-data-table customdatatable" style="width:100%">
                  <thead >
                      <tr>
                        <th >ID</th>
                        <th >Category</th>
                        <th>Thumbnail</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody >
                    
                  </tbody>
              </table>
            </div>