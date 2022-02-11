<div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Shipping Address</h4>
              <p> 
				<strong><span style="font-size:15px;">{{Str::title($orders_data->ship_to_name??'')}}</span></strong><br>
				
				{{Str::title($orders_data->ship_to_address??'')}}
				{{Str::title($orders_data->ship_to_city??'')}} - {{Str::title($orders_data->ship_to_postalcode??'')}}<br>
				{{Str::title($orders_data->ship_to_state??'')}}, {{Str::title($orders_data->ship_to_country??'')}}<br>	
				<i class="fas fa-envelope"></i>   <a href="mailto:{{$orders_data->ship_to_email??''}}">{{Str::title($orders_data->ship_to_email??'')}}</a><br>
				<i class="fas fa-phone-alt"></i>   {{Str::title($orders_data->ship_to_phone??'')}}
			  </p>
            </div>
          </div>
        </div>