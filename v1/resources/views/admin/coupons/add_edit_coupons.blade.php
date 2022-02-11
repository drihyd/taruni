@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
<div class="paddingleftright pt-2 pb-5" >
          
@if(isset($coupons_data->CouponID))
<form id="crudTable" action="{{url('admin/coupons/update')}}" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$coupons_data->CouponID}}">
@else
<form id="crudTable" action="{{url('admin/coupons/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
        <label for="Coupon_title">Coupon Title<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control" id="Coupon_title" name="Coupon_title" required="required"  value="{{old('Coupon_title',$coupons_data->Coupon_title??'')}}">
      </div>
      <div class="form-group">
        <label for="CouponCode">Coupon Code<span class="text-red"style="color: red;">*</span></label>
        <input type="text" class="form-control " id="CouponCode" name="CouponCode" required="required" value="{{old('CouponCode',$coupons_data->CouponCode??'')}}">
      </div>
      <div class="form-group">
        <label for="Description">Description<span class="text-red"style="color: red;">*</span></label>
        <textarea class="form-control" id="Description" name="Description" required="required" >{{old('Description',$coupons_data->Description??'')}}</textarea>
      </div>
      <div class="form-group" id="DiscountType">
        <label for="ParentID">Coupon Type<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="DiscountType" id="DiscountType" required="required">
          <option value="">-- Pick One --</option>
          <option value="FXD" {{ old('DiscountType',$coupons_data->DiscountType??'') == 'FXD'? 'selected':''}}>Fixed</option>
          <option value="PCTG" {{ old('DiscountType',$coupons_data->DiscountType??'') == 'PCTG'? 'selected':''}}>Percent</option>
        </select>
      </div>
      <div class="form-group">
        <label for="Coupon_title">Coupon Value<span class="text-red"style="color: red;">*</span></label>
        <input type="number" class="form-control" id="Discount_value" name="Discount_value" required="required" value="{{old('Discount_value',$coupons_data->Discount_value??'')}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="" class="btn btn-default">Back</a>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="CouponExpiryDate">Coupon Expiry Date<span class="text-red"style="color: red;">*</span></label>
        <input type="date" class="form-control" id="CouponExpiryDate" name="CouponExpiryDate" value="{{old('CouponExpiryDate',$coupons_data->CouponExpiryDate??'')}}" required="required">
      </div>
      <div class="form-group">
  <label for="Productlive">IsActive? </label>&nbsp;
  <input type="radio" name="Is_Active" value="1" {{ old('Is_Active',$coupons_data->Is_Active??'') == '1'? 'checked':'checked'}}> Yes
  <input type="radio" name="Is_Active" value="0"   {{ old('Is_Active',$coupons_data->Is_Active??'') == '0'? 'checked':''}}> No
  </div>
  <div class="form-group">
  <!-- <label for="Productlive">Is Public?</label> -->
  <input type="radio" name="Is_public" value="1" {{ old('Is_public',$coupons_data->Is_public??'') == '1'? 'checked':'checked'}}> Public
  <input type="radio" name="Is_public" value="0"  {{ old('Is_public',$coupons_data->Is_public??'') == '0'? 'checked':''}} > Private  
</div>
      </div>
        </div>
      </form>
      </div> 
        
 @endsection


@push('scripts')
<script>
   $("#crudTable").validate({
  rules: {
  name: {
      required: true,
      
    },
     description: {
      required: true,
      
    },
    max_admissions: {
      required: true,
      number:true,
      minlength:1,
      maxlength:100
    },course_fee: {
      required: true,
      number:true,
      minlength:2,
      maxlength:100
    },
    institute_id: {
      required: true
    }
  }
});
 </script> 
 @endpush
 