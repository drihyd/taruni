@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')			
            <div class="paddingleftright pt-2 pb-5" >
            	
   
                <table  class="table customdatatable att_masters-data-table" style="width:100%">
                  <thead>
                      <tr>
                      	<th width="10%">S.No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 
                  </tbody>
              </table>
            </div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(function () {
    
    var table = $('.att_masters-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,
        

         ajax: {
          url: "{{ url('admin/attributes_masters') }}",
          data: function (d) {
            
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on("click",".nddelete",function(e){
    var id = $(this).attr('data-id');
        if (confirm("Delete Record?") == true) {
          var id = id;
          // ajax
          $.ajax({
            type:"POST",
            url: "{{ url('admin/attributes_masters/delete') }}",
            data: {_token: "{{ csrf_token() }}", id: id },
            dataType: 'json',
            success: function(res){
              var oTable = $('.att_masters-data-table').dataTable();
              oTable.fnDraw(false);
            }
          });
        }
    });
     
    
  });
</script>

 @endpush