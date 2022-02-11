<div class="mt-4 table-responsive">
                              <table id="add-sku-table" class="table customdatatable table-striped" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>SKU Code</th>
                                          <th>Size</th>
                                          <th>Price INR</th>
                                          <th>Price USD</th>
                                          <th>Stock</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($skus as $sku)
                                      <tr>
                                          <td>{{$sku->sku_code??''}}</td>
                                          <td>{{ucwords($sku->variant_value??'')}}</td>
                                          <td>INR. {{$sku->price_inr??''}}</td>
                                          <td>USD. {{$sku->price_usd??''}}  </td>
                                          <td>
                                            <form action="{{url('admin/products/skus_stock/update')}}" method="post" accept-charset="utf-8" class="mb-0"> 
                                              @csrf
                                              <input type="hidden" name="id" value="{{$sku->id}}">
                                            <input type="hidden" name="product_id" value="{{$Products->id}}">   
                                              <input type="number" name="stock" value="{{$sku->stock??''}}" class="mb-2">
                                              <button type="submit" class="btn btn-sm btn-brand border text-black">update</button>
                                            </form>
                                          </td>
                                          <td class="edit-column tiny-col">
                                            <a href="{{url('admin/products/skus/edit/'.$sku->id)}}" class="btn btn-default btn-edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('admin/products/skus/delete/'.$sku->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                    
                                  </tbody>
                              </table>
                          </div>