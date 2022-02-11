
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



   
    $(".newslettersubmit").click(function(e){


var email=$("input[name=email]").val();

 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };


if(email== ''){
toastr.error('Please enter valid email id.');
return false;
}
else if(IsEmail(email)==false){
toastr.error('Entered email id is wrong.');
return false;
}

else{

  	e.preventDefault();
  		if($('.newslettersubmit').parsley().validate()){
        var email = $("input[name=email]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('newsletter.post') }}",
           cache: false,
           data:{email:email},
           success:function(data){

        

				if(data.statusCode==200)
				{			 
					toastr.success(data.success);
				}
				else{
					toastr.error(data.error);
				}


           }
        });

    }



return false;

    }
  
    });


function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

</script>
<!-- <script>
   $('#newslettersform').parsley();
 </script> 
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '.newslettersubmit', function(e){
    	e.preventDefault();
    	if($('.newslettersubmit').parsley().validate()){
   			var data = $(".newslettersubmit").serialize();
	        $.ajax({
	           type:'POST',
	           url:"{{ route('newsletter.post') }}",
	           data:data;
	           success:function(data){
	              alert(data.success);
	           }
	        });
    	}
    })
   
    </script> -->

<script>
      $('.banner-slider').slick({
            slidesToShow: 2, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]
           });
		   
      $('.newarrival-slider').slick({

            slidesToShow: 1, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });

      $('.journal-slider').slick({

            slidesToShow: 1, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });

      $('.testimonial-slider').slick({

            slidesToShow: 1, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });
    </script>
	
	
	<script>
      $('.look-slider').slick({

            slidesToShow: 4, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:false,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
          ]

           });
      $('.productslike-slider').slick({

            slidesToShow: 4, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:false,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
          ]

           });
           
           $('.newarrivals-slider').slick({

            slidesToShow: 4, 

            slidesToScroll: 1,

            swipeToSlide: true,

            autoplay: false,

            dots: false,

            arrows:true,

            responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true
              }
            }
          ]

           });
		   
		

		
function update_cart(itemid,qty,unitprice,sku_id,shipping_weight){
	

	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };



        var url = "{{ route('checkout.cart.update', Crypt::encryptString("+itemid+")) }}";
	     var id= 
		$.ajax({
			url: url,
			type: "post",
			cache: false,
			data:{
                _token:'{{ csrf_token() }}',
				itemid: itemid,
				quantity: qty,
				unitprice: unitprice,
				sku_id: sku_id,
				shipping_weight: shipping_weight,

			},
			success: function(dataResult){
	 		
		      if(dataResult.statusCode==200)
             {
				 
				toastr.success(dataResult.success);
		
	window.location = "{{ route('orders.show_cart')}}"; 
				
					 
						
             }
             else{
 		 
				 
					 toastr.error(dataResult.error);
             }
				
			}
		});
}






 </script>
 
 
	
	<script>
	
	$(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 1,
        max: 15000,
        from: 1,
        to: 15000,
        grid: true
    });
	



	
	
	
	
	
	
	</script>
	
		<script>
		
		
	$("#ajaxfilter").change(function(e) {
		
		
		/*
		toastr.clear();

	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		*/
			var element = this;
			var heightPreserve = $("#products-grid").closest(".col-xs-12").css('height');
			
			$("#products-grid").append("<div style='width: 100%; position: absolute; left: 0; text-align: center; top: 200px;margin: 0 auto;'><i class='products-loader fa fa-spinner fa-spin'></i></div>");
			
			var filters = [];
			var postData = $(this).serializeArray();
			
			
		
	

			$.each(postData, function(key, value) {
				if(filters[value['name']] == undefined){
					filters[value['name']] = [];
				}
				filters[value['name']].push(value['value']);
			});

			if (searchTerm) { 
				filters['searchTerm'] = searchTerm;
			}

			var sizes = '';
			var searchTerm = '';
			var categories = '';
			var colors = '';
			var fabrics = '';
			var tags = '';
			var cuts = '';
			var minprice = '';
			var maxprice = '';
				var currency = 'usd';
					     
			var sort_by = '';
			
			//queryString = window.location.search;
			
			var temp = {};



        value = $("#rangePrimary").prop("value").split(";");
		
        var minprice = value[0];
        var maxprice = value[1];
		

			var queryString = '';
			if(queryString == '') {
				queryString = '?';
			}		
			
			if(filters['searchTerm'] !== undefined) {
				searchTerm = filters['searchTerm'].join(',');
				temp['searchTerm'] = searchTerm;
				// queryString += '&searchTerm=' + searchTerm;
			}
			
			if(filters['categories[]'] !== undefined) {
				categories = filters['categories[]'].join(',');
				temp['categories'] = categories;
				// queryString += '&categories=' + categories;
			}
			
			if(filters['sizes[]'] !== undefined) {
				sizes = filters['sizes[]'].join(',');
				temp['sizes'] = sizes;
				// queryString += '&sizes=' + sizes;
			}
			
			if(filters['colors[]'] !== undefined) {
				colors = filters['colors[]'].join(',');
				temp['colors'] = colors;
				// queryString += '&colors=' + colors;
			}
			
			
			
		
			if(filters['fabrics[]'] !== undefined) {
				fabrics = filters['fabrics[]'].join(',');
				temp['fabrics'] = fabrics;
				// queryString += '&fabrics=' + fabrics;
			}
			
			if(filters['cuts[]'] !== undefined) {
				cuts = filters['cuts[]'].join(',');
				temp['cuts'] = cuts;
				// queryString += '&cuts=' + cuts;
			}
			if(filters['tags[]'] !== undefined) {
				tags = filters['tags[]'].join(',');
				temp['tags'] = tags;
				// queryString += '&tags=' + tags;
			}
			
			
			
			if(filters['my_range'] !== undefined) {
				minprice = filters['my_range'].join(',');
				temp['minprice'] = minprice;
				// queryString += '&minprice=' + minprice;
			}
			
			if(filters['my_range'] !== undefined) {
				maxprice =  filters['my_range'].join(',');
				temp['maxprice'] = maxprice;
				// queryString += '&maxprice=' + maxprice;
			}
			
			if(filters['currency'] !== undefined) {
				currency = filters['currency'].join(',');
				// queryString += '&currency=' + maxprice;
			}

			if(filters['currency'] !== undefined) {
				currency = filters['currency'].join(',');				
				// queryString += '&currency=' + maxprice;
			}

			if(filters['sort_by'] !== undefined) {
				sort_by = filters['sort_by'];	
				temp['sort_by'] = sort_by;			
				// queryString += '&currency=' + maxprice;
			}
			
			if(filters['cat_slug'] !== undefined) {
				cat_slug = filters['cat_slug'];	
				temp['cat_slug'] = cat_slug;			
				// queryString += '&currency=' + maxprice;
			}

			// temp['currency'] = currency;
		
			queryString = '?'+jQuery.param( temp );
			

			// console.log(window.location.hostname + window.location.pathname + queryString);
			//window.history.pushState('obj', 'newtitle', window.location.pathname + queryString);
			
			

		
		
		
		$("#products-area").html("<h4 class='text-center mt-5 mb-5'>Fetching some fashions.</h4>.");
		
				$("#products-area").LoadingOverlay("show", {
		background  : "rgba(255, 255, 255, 0.5)"
		});
		
			
			var formURL = $(this).attr("action");
			$.ajax({
				url : formURL,
				type: "POST",
				data : postData,			
				success:function(data, textStatus, jqXHR) {		
	

					//console.log(data);
					// console.log(data);
					$("#products-area").html(data);
					
					//adjust_productsGrid(); 
					//$("#products-grid").append("<div style='position: absolute; left: 0; width: 100%; text-align: center; top: 200px;'><i class='products-loader fa fa-spinner fa-spin'></i></div>");
					//$(".products-loader").fadeOut();
					//$.LoadingOverlay("hide");
				},
				error: function(jqXHR, textStatus, errorThrown) {
					//console.log(errorThrown);
					//alert('Not available');
					//toastr.error('Not available');
					//$(this.form).empty();
					//$(this.form).html(errorThrown);
				}
			});
			
			$("#products-area").LoadingOverlay("hide", true);
			
			e.preventDefault(); //STOP default action
		});
</script>

<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('body').on('click', '#btnSubmitAltsEdit', function (event) {
	
		
		
		
		toastr.clear();

	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		
	
    event.preventDefault()
    var id = $("#cartItemId").val();
    var chest = $("#chestEdit").val();
    var waist = $("#waistEdit").val();
    var hip = $("#hipEdit").val();
    var dressLength = $("#dressLengthEdit").val();
    var sleeveLength = $("#sleeveLength").val();
    var sleeveArmhole = $("#sleeveArmhole").val();
    var sleeveCircumference = $("#sleeveCircumference").val();
	

   
    $.ajax({
      url: 'color/' + id,
      type: "POST",
      data: {
        id: id,
        chest: chest,
        waist: waist,
        hip: hip,
        dressLength: dressLength,
        sleeveLength: sleeveLength,
        sleeveArmhole: sleeveArmhole,
        sleeveCircumference: sleeveCircumference,
      },
      dataType: 'json',
      success: function (data) {          
          $('#formalterationdata').trigger("reset");
          $('#altsEditModal').modal('hide');		  
		  toastr.success('Successfully saved entered alteration details.');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#editalternations', function (event) {


    event.preventDefault();
    var id = $(this).data('id');
	

    $.get('color/' + id + '/edit', function (data) {
		 $('#formalterationdata').trigger("reset");
		if(data.data.id>0){
			
		var returnedData = JSON.parse(data.data.alterations);
		var returnedData_sleeve = JSON.parse(data.data.sleeve_json);
			
		
         //$('#userCrudModal').html("Edit category");
         $('#btnSubmitAltsEdit').val("Edit category");
         $('#altsEditModal').modal('show');
         $('#cartItemId').val(data.data.id);
         //$('#name').val(data.data.name);
		 if(returnedData.chest){
			$('#chestEdit').val(returnedData.chest);
		 }
		 if(returnedData.waist){
			$('#waistEdit').val(returnedData.waist);
		 }
		  if(returnedData.hip){
			$('#hipEdit').val(returnedData.hip);
		 }
		 if(returnedData.dressLength){
			$('#dressLengthEdit').val(returnedData.dressLength);
		 }
		 
		 /* Sleeve Information */
		 
		 if(returnedData_sleeve.sleeveLength){
			$('#sleeveLength').val(returnedData_sleeve.sleeveLength);
		 }
		 
		 if(returnedData_sleeve.sleeveArmhole){
			$('#sleeveArmhole').val(returnedData_sleeve.sleeveArmhole);
		 }
		 
		if(returnedData_sleeve.sleeveCircumference){
			$('#sleeveCircumference').val(returnedData_sleeve.sleeveCircumference);
		 }
		}
     })
});

}); 
</script>

<script>
  $(window).on('load', function() {
    $('.razorpay-payment-button').click();
  });
</script>

<script>
    $(document).ready(function(){
      $(".filter-more").click(function(){
        $(".filter-more-card").toggleClass("more-card-height");
      });
    });
    $(document).ready(function(){
      $(".color-filter-more").click(function(){
        $(".color-filter-more-card").toggleClass("more-card-height");
      });
    });
</script>

<script>
    //   $(document).ready(function(){
    //   	// $('#sleeveAttach_data').hide(); 
    // if ($( "#sleeveAttach" ).is(":checked")) { //check if checkbox is checked
    //     $('#sleeveAttach_data').show(); //hide if unchecked
    // } else {
    //     $('#sleeveAttach_data').hide(); //show if checked
    // }
    //    });

    </script>

<script>
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
    
    $('#account-menu-toggle').on('click', function () {
            $('#my-account-menu').toggleClass('show');
        });
</script>

<script>








function load_data(id="", _token="")
{
 



$.ajax({
url:"{{ route('loadmore.load_data') }}",
method:"POST",
type:"html",
data:{
	id:id, 
	_token:_token,
	catslug:"{{$slug??''}}",
	prices:"{{$price??''}}",
	
	},
success:function(data)
{
   


$('#load_more_button').remove();
$('#fetching_data').html(data);
}
})
}

$(document).on('click', '#load_more_button', function(){
var id = $(this).data('id');
$('#load_more_button').html('<b>Loading...</b>');
load_data(id, _token);
});

</script>




<script>
 $(document).ready(function () {
  $(".addtocartsubmitButton").click(function(event){
      event.preventDefault();
	  
	   
	  	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		

      let productId = $("input[name=productId]").val();
      let price = $("input[name=price]").val();
      let skuid = $("input[name=skuid]").val();
      let product_weight = $("input[name=product_weight]").val();
      let sku = $("input[name=sku]").val();
      let alterations = $('input[name="alterations"]:checked').val();
      let attachSleeves = $('input[name="attachSleeves"]:checked').val();      
      let qty = $("input[name=qty]").val();
	  

	  
      let _token   = $('meta[name="csrf-token"]').attr('content');




      $.ajax({
        url: "{{ route('product.add.cart') }}",
        type:"POST",
        data:{
          productId:productId,
          price:price,
          skuid:skuid,
          product_weight:product_weight,
          sku:sku,
          alterations:alterations,
          attachSleeves:attachSleeves,
          qty:qty,
          _token: _token
        },
        success:function(response){		  
	
          if(response.Statuscode==200) {		  
			    
			
				if(attachSleeves=="yes" || alterations=="yes"){
					toastr.success("Product Item added to cart, please also add alteration details to continue place order..");    
					$("#formalterationdata")[0].reset();		

 $("#alterSleevesModal").modal({
            backdrop: 'static',
            keyboard: false
        });

				
					$("input[name=cartitemid]").val(response.cartitemid);
				}
				
				else{
					toastr.success("Product Item added to cart..");    
					window.location = "{{ route('orders.show_cart') }}";
				}
          }
		  
		  else{
			  
			   toastr.error(response.error);
		  }
		  
		  
		  
		  
		  
		  
        },
       });
  });
  });
</script>


<script>
 $(document).ready(function () {
  $(".sleveealtsubmitButton_acart").click(function(event){
	  
	  
	  	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		
		
		
      event.preventDefault();

      let sleeveLength = $("input[name=sleeveLength1]").val();
      let sleeveArmhole = $("input[name=sleeveArmhole1]").val();
      let sleeveCircumference = $("input[name=sleeveCircumference1]").val();	  
      let cartitemid = $("input[name=cartitemid]").val();	  
      let _token   = $('meta[name="csrf-token"]').attr('content');

if(cartitemid=="")
{
	 toastr.error("Something went wrong");	 
	 return false;
}
if(sleeveLength=="" || sleeveArmhole=="" || sleeveCircumference=="")
{
	 toastr.error("Please enter input values.");	 
	 return false;
}


      $.ajax({
        url: "{{ route('product.sleeve.alterations') }}",
        type:"POST",
        data:{
          sleeveLength:sleeveLength,
          sleeveArmhole:sleeveArmhole,
          sleeveCircumference:sleeveCircumference,
          cartitemid:cartitemid,   
          _token: _token
        },
        success:function(response){			

console.log(response);
          if(response.Statuscode==200) {		  
		//toastr.success(response.success);         
			
		//	$("#alterationdata_acart")[0].reset()
			
			$(this).parent().parent().hide();
			
				$('#alterDressModal').modal("show");
			
			
				//$("#alterSleevesModal").modal("hide");

				

				
				$("input[name=alt_cartitemid]").val(cartitemid);
				
			//$('#alterSleevesModal').modal("hide");
				
          }
		  
		  else{
			  
			   toastr.error(response.error);
		  }
        },
       });
  });
  });
</script>

<script>
 $(document).ready(function () {
  $(".altsubmitButton_acart").click(function(event){
	  
	  
	  	 toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
		
		
		
      event.preventDefault();

      let chest = $("input[name=chest1]").val();
      let waist = $("input[name=waist1]").val();
      let hip = $("input[name=hip1]").val();	
      let dressLength = $("input[name=dressLength1]").val();	
	  
      let cartitemid = $("input[name=alt_cartitemid]").val();	  
      let _token   = $('meta[name="csrf-token"]').attr('content');

if(cartitemid=="")
{
	 toastr.error("Something went wrong");
	 
	 return false;
}

if(chest=="" || waist=="" || hip==""|| dressLength=="")
{
	 toastr.error("Please enter input values.");	 
	 return false;
}

      $.ajax({
        url: "{{ route('product.alterations') }}",
        type:"POST",
        data:{
          chest:chest,
          waist:waist,
          hip:hip,
          dressLength:dressLength,
          cartitemid:cartitemid,   
          _token: _token
        },
        success:function(response){			
	

          if(response.Statuscode==200) {		  
			    toastr.success(response.success);
            //$('.success').text(response.success);
            //$("#ajaxform")[0].reset();
			
			$("#formalterationdata")[0].reset();
			window.location = "{{ route('orders.show_cart') }}";
			
				
          }
		  
		  else{
			  
			   toastr.error(response.error);
		  }
        },
       });
  });
  });
</script>



<script>
 $(document).ready(function () {
  $(".autofillsleeve").click(function(event){
		var values = $(this).data("id");		
		if(values!=""){
		var array = $(this).data("id").split(",");		
		$("input[name=sleeveLength1]").val(array[0]);
		$("input[name=sleeveArmhole1]").val(array[1]);
		$("input[name=sleeveCircumference1]").val(array[2]);
		}
	
  });
  });
</script>

<script>
 $(document).ready(function () {
  $(".autofillbodymeas").click(function(event){
		var values = $(this).data("id");		
		if(values!=""){
		var array = $(this).data("id").split(",");		
		$("input[name=chest1]").val(array[0]);
		$("input[name=waist1]").val(array[1]);
		$("input[name=hip1]").val(array[2]);
		$("input[name=dressLength1]").val(array[3]);
		}
		
  });
  });
</script>












