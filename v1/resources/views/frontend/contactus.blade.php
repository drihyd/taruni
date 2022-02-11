@extends('frontend.template_v1')
@section('title', "Contact Us")
@section('content')
<section>
        <div class="container pl-sm-0">
		 {{ Breadcrumbs::render('contactus', 'Contact Us') }}
		
		
            <h2 class="text-center text-dark mb-5">Got Feedback or Queries ?</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card alert alert-info p-0 mb-3">
                        <div class="card-body p-4">
                            <p class="text-center contact-text mb-0">
            					<span class="fa fa-phone-alt"></span> &nbsp; <strong>Call us:</strong> +91 9492021805 (Online support - Monday to Saturday, 11am to 6pm IST)
            				</p>
                        </div>
                    </div>
                    <div class="card alert alert-success p-0 mb-3">
                        <div class="card-body p-4">
                            <p class="text-center contact-text mb-0">
            					<span class="fas fa-envelope"></span>&nbsp; <strong>Email us:</strong> <a href="mailto:nchary.taruni@gmail.com">nchary.taruni@gmail.com</a>
            				</p>
                        </div>
                    </div>
                    <!-- <div class="text-center mb-3">
                        <p>OR</p>
                        <p>Send us your feedback and complaints, and our team will get in touch with you immediately.</p>
                    </div> -->
                    <div class="card">
                        <div class="card-body p-3">
                            <h3>Address: </h3>
                            <p class="mb-0">TARUNI CLOTHING PVT. LTD.</p>
                            <p class="mb-0">MALANI EXCEL,</p>
                            <p class="mb-0">10-3-150 & 151, 4th floor, St. John's Road,</p>
                            <p class="mb-0">Beside Ratnadeep Supermarket,</p>
                            <p class="mb-0">East Marredpally,</p>
                            <p class="mb-0">Secunderabad - 500026,</p>
                            <p class="mb-0">Telangana, India.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                        <h3 class="pb-2"><b>Contact Us</b></h3>
                    <div class="contact-form-wrapper">
                        <form method="post" action="{{url('contact-us/store')}}" id="contactform"  data-parsley-validate>
                            @csrf
                            <div class="form-wrap">
                            <div class="form-group">
                                <label>NAME <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="fullname" required data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" required data-parsley-type="email">
                            </div>
                            <div class="form-group">
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" required>
                            </div>
                            <div class="form-group">
                                <label>Message <span class="text-danger">*</span></label>
                                <textarea cols="5" rows="3" class="form-control" name="message" id="message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-submit btn btn-brand"> Submit</button>
                            </div>
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
   $('#contactform').parsley();
 </script> 
 @endpush