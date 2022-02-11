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
                        <th>Level</th>
                        <th>Country</th>
                        <th>Starting Price</th>
                        <th>Ending Price</th>
                        <th>Charges (INR)</th>
                        <th>Charges (USD)</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($shipping_rates_data as $shipping_rates)
                      <tr >
                        <td>{{$loop->iteration}}</td>
                          <td>{{ucwords($shipping_rates->level)??''}}</td>
                          <td>{{ucwords($shipping_rates->country)??''}}</td>
                          <td>{{$shipping_rates->starting_price}}</td>
                          <td>{{$shipping_rates->ending_price}}</td>
                          <td>{{$shipping_rates->charges_inr}}</td>
                          <td>{{$shipping_rates->charges_usd}}</td>
                          

                          <td width="10%">
                            <a href="{{url('admin/shipping_rates/edit/'.$shipping_rates->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
<a href="{{url('admin/shipping_rates/delete/'.$shipping_rates->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
      
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection