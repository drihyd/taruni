@extends('frontend.template_v1')
@section('title', "Support")
@section('content')
@php
    $faqs_data=DB::table('f_a_qs')->get();
@endphp
<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                <h2 class="text-dark mb-3">CUSTOMER SUPPORT</h2>
                    
                    <div class="mb-3 support-text">
                        <p>A Taruni customer demands the best products and the best service. We are committed to offering you the best possible online experience and keep improving our services.</p>
                        <p>Click on a topic of your concern to read the FAQ's or fill in the form for any specific questions about your order.</p>
                       
                    </div>
					
					<h2 class="text-dark">FAQs</h2>
					
					  <div class="faq-links ">
                            @foreach($faqs_data as $faq)
                            <a href="{{url('help/'.$faq->slug)}}">{{strtoupper($faq->page_title)??''}}</a>
                            
                            @endforeach
                        </div>
                </div>
                <div class="col-sm-5">
                    <div class="card support-card">
                        <div class="card-body">
                            <div class="support-form-wrapper">
                                <h3 class="mb-4">Have an issue? Register a ticket</h3>
                                <form method="post" action="{{url('help/form/store')}}"  data-parsley-validate id="helpform">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="fullname" id="fullname" required data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" id="email" required data-parsley-type="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="mobile" id="mobile" required>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $faqs_data=DB::table('f_a_qs')->get();
                                    @endphp
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Issue related to</label>
                                            </div>
                                            <div class="col-sm-8">						
                                            
												<select class="form-control" name="issue" id="issue" required>
                                                    <option value="">---- Select ----</option>
                                            @foreach($faqs_data as $faq)
												<option value="{{$faq->page_title}}">{{$faq->page_title}}</option>
                                                @endforeach
                                                <!-- 
												<option value="OPR">Orders & payments related</option>
												<option value="SCDR">Shipping & customs duty related</option>
												<option value="CR">Cancellation & refunds</option>
												<option value="CO">Coupons & offers</option>
												<option value="TI">Technical issues</option>
												<option value="SR">Stores related</option> -->

												
												</select>
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Describe the problem </label>
                                        <textarea cols="5" rows="5" class="form-control" name="message" id="message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-submit btn btn-dark btn-wide"> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
   $('#helpform').parsley();
 </script> 
 @endpush