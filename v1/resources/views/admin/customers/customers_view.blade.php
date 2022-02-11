@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
     
            <div class="paddingleftright pt-2 pb-5" >
              
   
     
                <!-- <table id="orders-table" class="table customdatatable" style="width:100%"> -->
                  <div class="form-inline pb-3">
<div class="form-group">
<label class="mr-2">Search By Name/Email/Phone:</label>
    <input type="text" class="form-control form-control-sm mr-3 mx-sm-4 searchEmail" name="user_email_phone" id="user_email_phone">
    <button type="button" name="filter_no" id="filter_no" class="btn btn-outline-danger btn-sm mr-3">Go</button>
   <a href="#" id="reset1" name="reset1"><u>Reset filters</u></a>
</div>
</div>

                <table  class="table table-bordered cutomer-data-table " style="width:100%">
                  <thead>
                      
                      
                      <tr>
                       
                        <th>S.No</th>
                        <th>Customer Info</th>
                        <!-- <th>Phone</th> -->
                        <!-- <th>Gender</th> -->
                        <th>Reg.Date</th>
                        <th>Last Ordered On</th>
                        <th>Email Verification?</th>
                        <th>Email Verification Date</th>
                        <th>Profile</th>
                        <!-- <th>Action</th> -->
                      </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
              </table>
            </div>
@endsection
@push('scripts')
<script type="text/javascript">
  load_data();
 function load_data(user_email_phone= '')
 {
    
    var table = $('.cutomer-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,
        

         ajax: {
          url: "{{ url('admin/customers') }}",
          data:{user_email_phone:user_email_phone},
        },
        columns: [
           { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            // {data: 'email', name: 'email', orderable: true, searchable: true},
            {data: 'fullname', name: 'fullname' ,orderable: true, searchable: true},
            // {data: 'phone', name: 'phone',searchable: true},
            // {data: 'gender', name: 'gender',searchable: false},
            {data: 'reg_date', name: 'reg_date',searchable: true},
            {data: 'last_ordered_date', name: 'last_ordered_date',searchable: true},
            {data: 'active', name: 'active',searchable: true},
            {data: 'email_verified_date', name: 'email_verified_date',searchable: false},
            {data: 'profile', name: 'profile',orderable: false, searchable: false},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    
  }
  $('#filter_no').click(function(){
  var user_email_phone = $('#user_email_phone').val();
  if(user_email_phone!= ''){
    $('.cutomer-data-table').DataTable().destroy();
   load_data(user_email_phone);
  }
  else
  {
   alert('Please enter any one field');
  }
 });
  $('#reset1').click(function(){
        $('#user_email_phone').val('');
        $('.cutomer-data-table').DataTable().destroy();
        load_data();
    });
  $(document).on("click",".s_update",function(e){
    var id = $(this).attr('data-id');
    var reversests = $(this).attr('data-sid');
        if (confirm("Are you sure you want update account status?") == true) {
          // var status = $(this).prop('click') == true ? '1' : '0';
          var id = id;
// alert(status);
          // ajax
          $.ajax({
            type:"POST",
            url: "{{ url('admin/changeStatus') }}",
            data: {_token: "{{ csrf_token() }}", id: id,reversests:reversests},
            dataType: 'json',
            success: function(res){
              alert('Successfully update a customer account');
              var oTable = $('.cutomer-data-table').dataTable();
              oTable.fnDraw(false);
            }
          });
        }
    });
</script>
@endpush