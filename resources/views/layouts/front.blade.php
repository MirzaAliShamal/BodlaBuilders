<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | Bodla Builders</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('logo.png') }}">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('front/css/tobii.min.css') }}" type="text/css">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('front/css/materialdesignicons.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('front/css/tiny-slider.css') }}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Main Css -->
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css" id="theme-opt" />
        <link rel="stylesheet" href="{{ asset('front/css/colors/default.css') }}" id="color-opt">
        <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}" id="color-opt">
        <style>
            .blink {
                animation:blinkingWhiteText 1.2s infinite;
            }
            .nav-sticky .blink {
                animation:blinkingBlackText 1.2s infinite;
            }
            .nav-sticky a.btn-primary {
                color: #000 !important;
            }
            @keyframes blinkingWhiteText{
                0%{     color: #fff;    }
                49%{    color: #fff; }
                60%{    color: red }
                99%{    color: red;  }
                100%{   color: #fff;    }
            }
            @keyframes blinkingBlackText{
                0%{     color: #000;    }
                49%{    color: #000; }
                60%{    color: red }
                99%{    color: red;  }
                100%{   color: #000;    }
            }
        </style>
        @yield('css')
    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <!-- Navbar STart -->
        @include('front.components.header')
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        @include('front.components.footer')
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- Account Modal -->
        <div class="modal fade" id="accountModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content rounded shadow border-0">
                    <div class="modal-body p-0">
                        <div class="container-fluid px-0">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-6 col-md-5 text-center">
                                    <img src="{{ asset('logo.png') }}" class="img-fluid" alt="">
                                </div><!--end col-->

                                <div class="col-lg-6 col-md-7">
                                    <div id="status" class="loader" style="display: none;">
                                        <div class="spinner">
                                            <div class="double-bounce1"></div>
                                            <div class="double-bounce2"></div>
                                        </div>
                                    </div>

                                    <form class="login-form p-4 login" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input type="email" class="form-control ps-5" placeholder="Email"
                                                        name="email">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input type="password" class="form-control ps-5" placeholder="Password"
                                                        name="password">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault4">
                                                            <label class="form-check-label" for="flexCheckDefault4">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <p class="forgot-pass mb-0"><a href="javascript:;" class="text-dark fw-bold" onclick="accountsModalHandle('.forget')">Forgot password ?</a></p>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary">Log in</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12 text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.signup')" class="text-dark fw-bold">Sign Up</a></p>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>

                                    <form class="login-form p-4 signup" style="display: none;" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input type="text" class="form-control ps-5" placeholder="Name"
                                                        name="name">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" class="form-control ps-5" placeholder="Email"
                                                        name="email">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input type="password" class="form-control ps-5" placeholder="Password"
                                                        name="password">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                                        <input type="text" class="form-control ps-5" placeholder="Phone"
                                                        name="phone">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary">Sign up</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12 text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.login')" class="text-dark fw-bold">Log in</a></p>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>

                                    <form class="login-form p-4 forget" style="display: none;" action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>
                                                    <strong>Forgot your password?</strong> No problem. Just let us know your email address and we will
                                                    email you a password reset link that will allow you to choose a new one.
                                                </p>
                                            </div>

                                            <div class="col-lg-12 status-message"></div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" class="form-control ps-5" placeholder="Email"
                                                        name="email">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary">Send</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12 text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.login')" class="text-dark fw-bold">Log in</a></p>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Account Modal -->

        <div class="modal fade" id="userMoodal" tabindex="-1" style="margin-top: 80px" role="dialog" aria-labelledby="userMoodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('visitor.details.save') }}" class="visitor" method="GET" id="visitorMainForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">User Detail</h5>
                                <span aria-hidden="true" class="close sess" style="cursor: pointer"  data-bs-dismiss="modal" aria-label="Close">&times;</span>
                        </div>
                        <div class="modal-body blog-details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="visitor_name"> Name *</label>
                                        <input type="text" class="form-control @error('visitor_name') is-invalid @enderror" id="visitor_name" name="visitor_name" >
                                        <span class="visitor_name" style="display: none">
                                            <strong class="text-danger">Name field is required</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="visitor_email"> Email *</label>
                                        <input type="visitor_email" class="form-control @error('visitor_email') is-invalid @enderror" id="visitor_email" name="visitor_email" >
                                        <span class="visitor_email"  style="display: none">
                                            <strong class="text-danger">Email field is required</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="visitor_phone"> Phone *</label>
                                        <input type="number" class="form-control @error('visitor_phone') is-invalid @enderror" id="visitor_phone" name="visitor_phone" >
                                        <span class="visitor_phone"  style="display: none">
                                            <strong class="text-danger">Phone field is required</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  data-bs-dismiss="modal"  class="btn btn-secondary sess">Skip</button>
                            <button type="submit"  class="btn btn-primary visitorSave">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
        <!-- javascript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/js/shuffle.min.js') }}"></script>
        <script src="{{ asset('front/js/tobii.min.js') }}"></script>
        <!-- SLIDER -->
        <script src="{{ asset('front/js/tiny-slider.js') }}"></script>
        <!-- Icons -->
        <script src="{{ asset('front/js/feather.min.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('front/js/plugins.init.js') }}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{ asset('front/js/app.js') }}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

        <script>
            function logout() {
                $('#logout-form').submit();
            }

            function accountsModalHandle(target) {
                $(".login-form").find("span.invalid-feedback").remove();
                $(".login-form").find(".form-control").removeClass('is-invalid');
                $(".login-form").hide();
                $(target).fadeIn();
            }

            function printValidationMessages(errorObj) {
                $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
                $.map(errorObj, function(value, index) {
                    $(document).find('[name="' + index + '"]').closest('div').find('span.invalid-feedback').remove();
                    let appendIn = $(document).find('[name="' + index + '"]').closest('div');
                    if (!$(appendIn).find('span.invalid-feedback').length) {
                        $(document).find('[name="' + index + '"]').addClass('is-invalid');
                        $(appendIn).append('<span class="invalid-feedback"><strong>' + value[0] + '</strong></span>')
                    }
                });
            }
            $(document).on('click', '.visitorSave',function (e) {
                if( $('#visitor_name').val() == '' ){
                    $('.visitor_name').show();
                    return false;
                }

                else if( $('#visitor_email').val() == '' ){
                    $('.visitor_email').show();
                    return false;
                }
                else if( $('#visitor_phone').val() == '' ){
                    $('.visitor_phone').show();
                    return false;
                }
                else{
                    $('#visitorMainForm').submit();
                }
            });

            $(document).ready(function () {
                @if (!session('loaded'))
                    setTimeout(function(){
                        $('#userMoodal').modal('show');
                        @php
                            Session::put('loaded', 'loaded');

                        @endphp
                    },5000)
                @endif
            });


            $(".login-form").submit(function (e) {
                e.preventDefault();
                let elm = $(this);
                let url = elm.attr('action');
                elm.hide();
                $(".loader").show();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: elm.serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response.statusCode == 200) {
                            if (response.reload) {
                                window.location.reload(true);
                            } else {
                                elm.show();
                                $(".loader").hide();
                                $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
                                elm.find(".status-message").html('<div class="alert alert-success">'+response.message+'</div>')
                            }
                        }
                        if (response.statusCode == 400) {
                            if (response.reload) {
                                window.location.reload(true);
                            } else {
                                elm.show();
                                $(".loader").hide();
                                $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
                                elm.find(".status-message").html('<div class="alert alert-danger">'+response.message+'</div>')
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // console.log(xhr);
                        elm.show();
                        if (xhr.status == 422) {
                            let errorObj = xhr.responseJSON.errors;
                            printValidationMessages(errorObj);
                        } else {
                            // toastr.error('Unknown Error!');
                        }
                        $(".loader").hide();
                    }
                });
            });
        </script>
        @yield('js')
    </body>
</html>
