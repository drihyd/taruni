
@php      
use App\Models\Products;
@endphp
<div class="row m-0" style="font-size:12px!important;">
   <div class="col-sm-12 p-1">
      <div class="card" >
         <div class="card-body p-2">

      <h4>Items in Order</h4>
            <div class="table-responsive">
               <table class="table" style="font-size:14px!important;width:100%;">
                  <thead>
                     <tr>
                        <th class="text-align-center">S.No.</th>                       
                        <th></th>                       
                        <th>Product Details</th>                        
                        <th class="text-align-right">Unit Price ({{$orders_data->currency??''}})</th>                       
                        <th  class="text-align-right">Qty</th>
                        <th  class="text-align-right">Net Price ({{$orders_data->currency}})</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($order_items as $item)
					 
					 
					 @php
						$str_sku = $item->sku_code??'';
						$skucode=preg_replace('~ *-.*~', '',$str_sku);					 
					 @endphp
                     <tr>
                        <td class="text-align-right">{{$loop->iteration??''}}</td>
                       
                       
                        <td><img src="{{ URL('/public/'.Products::is_photo_exist($skucode,1,$item->product_upload_path??'','thumbnails')) }}" width="70px"></td>
                        <td>
 <a target="_new" href="{{ROUTE('product.sku.prices',['slug'=>$item->pslug,'size'=>$item->item_size])}}" >
                           {{Str::ucfirst($item->pname??'')}}
                           </a>
                       
                        @php
                        if($item->alterations){
                           $alterations=json_decode($item->alterations,true);

                        }
                         else{
                             $alterations=[];
                        }
                        if($item->sleeve_json){
                           $sleeves=json_decode($item->sleeve_json,true);

                        }
                         else{
                             $sleeves=[];
                        }
                         
                           @endphp



                    

                           <br> SKU Code: {{$item->sku_code??''}}<br> Size: {{Str::ucfirst($item->item_size)??''}}<br>
                           
                           @if($alterations)
                           <!-- <p> -->
                           <strong>Alterations:</strong><br>
                           @foreach($alterations as $key=>$alteration)
                           <span>{{Str::ucfirst($key)}}: {{$alteration}}</span>,
                           @endforeach
                           <!-- </p> -->
                           <br>
                           @endif
                           @if($sleeves)
                           <!-- <p> -->
                           <strong>Sleeves:</strong><br>
                           @foreach($sleeves as $key=>$sleeve)
                           <span>{{Str::ucfirst($key)}}: {{$sleeve}}</span>,
                           @endforeach
                           <!-- </p> -->
                           @endif
                        </td>
                        
                        <td class="text-align-right" align="right">
                           {{$item->unit_price??''}}                                 
                        </td>
                       
                        <td class="text-align-right" width="100px">{{$item->qty??''}}</td>
                        <td align="right" class="text-align-right ">{{$item->price??''}}</td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tr>
                     <td colspan="4" style="text-align:right;"><strong>Sub Total</strong></td>
                     <td class="total-num">
                     {{$order_items->sum('qty')}} 
                     @if($order_items->sum('qty')==1)
                     item @else 
                     items
                     @endif
                  </td>
                     <td class="total-sum" style="text-align: right"><strong>{{$order_items->sum('price')}}</strong></td>
                  </tr>
                  <tr>
                     <td colspan="4" style="text-align:right;"><strong>Discount Price</strong></td>
                     <td class="toal-num"></td>
                     <td class="total-sum" style="text-align: right"><strong>{{$orders_data->discount_coupon??''}}</strong></td>
                  </tr>
                  <tr>
                     <td colspan="4" style="text-align:right;"><strong>Total Shipping Charges</strong></td>
                     <td class="toal-num"></td>
                     <td class="total-sum" style="text-align: right"><strong>{{$orders_data->total_shipping_fee??''}}</strong></td>
                  </tr>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="4" style="text-align:right;"><strong>Grand Total</strong></td>
                        <td class="toal-num"></td>
                        <td class="total-sum" style="text-align: right"><strong>{{$orders_data->currency}} {{$orders_data->grand_total??''}}</strong></td>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      <!-- ./responsive-table -->
   </div>
</div>