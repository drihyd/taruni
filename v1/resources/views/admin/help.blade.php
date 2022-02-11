@extends('frontend.template_v1')
@section('title', "Support")
@section('content')
<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                <h2 class="text-dark mb-3">CUSTOMER SUPPORT</h2>
                    
                    <div class="mb-3 support-text">
                        <p>A Taruni customer demands the best products and the best service. We are committed to offering you the best possible online experience and keep improving our services.</p>
                        <p>Click on a topic of your concern to read the FAQ's or fill in the form for any specific questions about your order.</p>
                        <div class="faq-links mt-5">
                            <a href="#">PRODUCTS RELATED</a>
                            <a href="#">ORDERS & PAYMENTS RELATED</a>
                            <a href="#">SHIPPING & CUSTOMS DUTY RELATED</a>
                            <a href="#">CANCELLATION & REFUNDS</a>
                            <a href="#">COUPONS & OFFERS</a>
                            <a href="#">TECHNICAL ISSUES</a>
                            <a href="#">STORES RELATED </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card support-card">
                        <div class="card-body">
                            <div class="support-form-wrapper">
                                <h3 class="mb-4">Have an issue? Register a ticket</h3>
                                <form>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="fullname" id="fullname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" id="email" required>
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Issue related to</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="issue" id="issue" required>
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