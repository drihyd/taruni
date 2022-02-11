@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')			
            <div class="paddingleftright pt-2 pb-5" >
            	
   
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                      	<th>S.No.</th>
                        <th>Coupon Title</th>
                        <th>Coupon Code</th>
                        <th>Added On</th>
                        <th>Expired On</th>
                        <th>Description</th>
                        <th>Discount Type</th>
                        <th>Discount Value</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($coupons_data as $coupon)
                      <tr >
                      	<td>{{$loop->iteration}}</td>
                          <td>{{ucwords($coupon->Coupon_title)??''}}</td>
                          <td>{{strtoupper($coupon->CouponCode)??''}}</td>
                          <td>{{ \Carbon\Carbon::parse($coupon->CouponAddedon)->format('d M Y')}}</td>
                          <td>{{ \Carbon\Carbon::parse($coupon->CouponExpiryDate)->format('d M Y')}}</td>
                          <td>{{$coupon->Description??''}}</td>
                          <td>{{$coupon->DiscountType??''}}</td>
                          <td>{{$coupon->Discount_value??''}}</td>

                          <td width="10%">
                          	<a href="{{url('admin/coupons/edit/'.$coupon->CouponID)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/coupons/delete/'.$coupon->CouponID)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection