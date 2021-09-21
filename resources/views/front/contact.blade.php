@extends('layouts.front')

@section('title', 'Contact')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Contact</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                        <div class="card custom-form rounded border-0 shadow p-4">
                            <form method="post" name="myForm" action="{{ route('contact.post') }}">
                                @csrf
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Subject</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="book" class="fea icon-sm icons"></i>
                                                <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Message <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                <textarea name="message" id="message" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="title-heading ms-lg-4">
                            <h4 class="mb-4">Contact Details</h4>

                            <div class="d-flex contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="mail" class="fea icon-m-md text-dark me-3"></i>
                                </div>
                                <div class="flex-1 content">
                                    <h6 class="title fw-bold mb-0">Email</h6>
                                    <a href="mailto:contact@example.com" class="text-primary">contact@example.com</a>
                                </div>
                            </div>

                            <div class="d-flex contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="phone" class="fea icon-m-md text-dark me-3"></i>
                                </div>
                                <div class="flex-1 content">
                                    <h6 class="title fw-bold mb-0">Phone</h6>
                                    <a href="tel:+152534-468-854" class="text-primary">+152 534-468-854</a>
                                </div>
                            </div>

                            <div class="d-flex contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="map-pin" class="fea icon-m-md text-dark me-3"></i>
                                </div>
                                <div class="flex-1 content">
                                    <h6 class="title fw-bold mb-0">Location</h6>
                                    <a href="javascript:void(0);" class="text-primary">Multan, Pakistan</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </section>

@endsection
