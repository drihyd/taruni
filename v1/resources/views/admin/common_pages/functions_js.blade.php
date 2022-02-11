
<script type="text/javascript">


		toastr.clear();

	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		
		
  $(function () {
    
    var table = $('.product-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,
        

         ajax: {
          url: "{{ url('admin/products') }}",
          data: function (d) {
            //console.log(d);
                d.cat_id = $('#cat_id').val();
          
            }
        },
        columns: [
            {data: 'product_image', name: 'product_image',searchable: false},
            {data: 'product_name', name: 'product_name', orderable: true, searchable: true},
            {data: 'scode', name: 'scode' ,orderable: true, searchable: true},
            {data: 'sku_size', name: 'sku_size',searchable: true},
            {data: 'sku_stock', name: 'sku_stock',searchable: true},
            {data: 'sku_price_inr', name: 'sku_price_inr',searchable: true},
            {data: 'sku_price_usd', name: 'sku_price_usd',searchable: true},
            {data: 'cat_name', name: 'cat_name',searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     $('#cat_id').change(function(){
        table.draw();
    });
    
  });
</script>



<script type="text/javascript">



        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

        $(document).ready(function() {
          $('#orders-table').DataTable(
              
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              
              );
      } );

      $(document).ready(function() {
          $('#orders-table2').DataTable(
              
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              );
      } );
      $(document).ready(function() {
          $('#orders-table3').DataTable(
              
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              
              );
      } );
      $(document).ready(function() {
          $('#orders-table4').DataTable(
              
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              
              );
      } );
      $(document).ready(function() {
          $('#orders-table5').DataTable(
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              );
      } );
      $(document).ready(function() {
          $('#orders-table6').DataTable(
              
              
              {
			  
			   lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
		  }
              );
      } );
    </script>
    <script type="text/javascript">
function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-');
}

function slugClean(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

function codeClean(Text) {
  return Text
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

$('.nameForSlug').on('keyup change', function() {
  $('.slugForName').val(convertToSlug($(this).val()));
});

$('.slugForName').on('change keyup', function() {
  $('.slugForName').val(slugClean($(this).val()));
});

$('.codeClean').on('change keyup', function() {
  $('.codeClean').val(codeClean($(this).val()));
});


</script>

<script type="text/javascript">
function convertToSlug1(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'_');
}

function slugClean1(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'_')
    .replace(/_+/g,'_');
}

function codeClean1(Text) {
  return Text
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'_')
    .replace(/_+/g,'_');
}

$('.nameForSlug1').on('keyup change', function() {
  $('.slugForName1').val(convertToSlug1($(this).val()));
});

$('.slugForName1').on('change keyup', function() {
  $('.slugForName1').val(slugClean1($(this).val()));
});

$('.codeClean1').on('change keyup', function() {
  $('.codeClean1').val(codeClean1($(this).val()));
});


</script>
<script type="text/javascript">
    $(document).ready(function () {
		
		
		

        $('#master').on('click', function(e) {
		 if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
		

        $('.delete_all').on('click', function(e) {

            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  

            if(allVals.length <=0)  
            {  
				toastr.error("Please select row.");
               // alert("Please select row.");  
            }  else {  

                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  

                    var join_selected_values = allVals.join(","); 

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
											 beforeSend: function(){											
												 $("#action_happend_status").html("<h4 class='text-danger'><strong>Your action is in progress. Don't click submit button /refresh/close during the upload process.</strong></h4>");
     
   },
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
							
							$("#action_happend_status").html("");
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
		
		$('.migrate_all').on('click', function(e) {

            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  

            if(allVals.length <=0)  
            {  
		     
                //alert("Please select row.");  
				toastr.error("Please select row.");
            }  else {  

                var check = confirm("Are you sure you want to migrate this row?");  
                if(check == true){  

                    var join_selected_values = allVals.join(","); 

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
						 beforeSend: function(){
     $("#action_happend_status").html("<h4 class='text-danger'><strong>Your action is in progress. Don't click submit button /refresh/close during the upload process.</strong></h4>");
   },
                        success: function (data) {
							
							//console.log(data);
							
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
								 //toastr.success(data['success']);
								
                                alert(data['success']);
                            } else if (data['error']) {
								toastr.error(data['error']);
                                //alert(data['error']);
                            } else {
								toastr.error(data['error']);
                               // alert('Whoops Something went wrong!!!');
                            }
							 $("#action_happend_status").html("");
                        },
                        error: function (data) {
							toastr.error(data.responseText);
                            //alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
		
		
		

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });
</script>

<script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
<script>
Dropzone.autoDiscover = false;

const myDropzone = new Dropzone("#my-great-dropzone", {
    url: "{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.dropzone.store') }}",
    maxFiles: 10, 
    acceptedFiles: '.jpg, .jpeg',
    preview_image: false,
    inputLabelWithFiles: false,
	addRemoveLinks: true,
	
/* 	 init: function() {
    this.on("completemultiple", file => {
      console.log("A file has been added");
	  
	  
	   location.reload();
	  
	  
    })
	
	 } */
	 
	 
	  init: function () {
        // Set up any event handlers
        this.on('queuecomplete', function () {
			    console.log("A file has been uploaded");
           // location.reload();
        });
    }
    // autoProcessQueue: false,
    // uploadMultiple: True,
    // previewTemplate: '',
})
</script>