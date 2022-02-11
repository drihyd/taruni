<form action="{{url('admin/products/skus/store')}}" method="post" accept-charset="utf-8" class="edit-form"> 
                          <input type="hidden" name="product_id" value="{{$Products[0]->id}}">
                          <input type="hidden" name="cat_id" value="{{$Products[0]->cat_id}}">
                        @csrf                 
                          <legend>ADD SKUS</legend>
                          <div class="form-group inline">
                            <label for="productName" class="control-label">SKU Code</label>
                            <input type="text" class="form-control input-sm" id="name" name="sku_code" value="{{old('sku_code',$Products[0]->sku_code??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="size" class="control-label">Size</label>
                                <select class="form-control input-sm" id="size" name="size" required>
                                  <option value="">--Select Size--</option>
                                      <option value="s">S</option>
                                      <option value="m">M</option>
                                      <option value="l">L</option>
                                      <option value="xl">XL</option>
                                      <option value="xxl">XXL</option>
                                    </select>
                              </div>
                          <div class="form-group inline">
                            <label for="price_inr" class="control-label">Price (in INR)</label>
                            <input type="number" class="form-control input-sm" id="price_inr" name="price_inr" value="{{old('price_inr',$Products[0]->price_inr??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="productSlug" class="control-label">Price (in USD)</label>
                            <input type="number" class="form-control input-sm " id="price_usd" name="price_usd" value="{{old('price_usd',$Products[0]->price_usd??'')}}" required>
                          </div>
                          <div class="form-group inline">
                            <label for="price_inr" class="control-label">Discount Price (in INR)</label>
                            <input type="number" class="form-control input-sm" id="price_inr" name="discount_price_inr" value="{{old('discount_price_inr',$Products[0]->discount_price_inr??'')}}">
                          </div>
                          <div class="form-group inline">
                            <label for="productSlug" class="control-label">Discount Price (in USD)</label>
                            <input type="number" class="form-control input-sm " id="discount_price_usd" name="discount_price_usd" value="{{old('discount_price_usd',$Products[0]->discount_price_usd??'')}}">
                          </div>
                          <div class="form-group inline">
                            <label for="productSlug" class="control-label">Stock</label>
                            <input type="number" class="form-control input-sm " id="stock" name="stock" value="{{old('stock',$Products[0]->stock??'')}}" required>
                          </div>
                          <div class="form-group margin-top-30">
                            <button type="submit" class="btn btn-brand btn-wide btn-sm">ADD SKU's</button> 
                            <!-- <a href="{{url('admin/products/edit/'.Crypt::encryptString($Products[0]->id))}}" class="btn btn-action-link">Cancel</a> -->
                          </div>
                        </form>