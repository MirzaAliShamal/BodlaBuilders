@extends('layouts.front')

@section('title', 'Home')

@section('css')
    <style>
        .team-card img {
            transition: transform .7s;
        }
        .team-card:hover img {
            -ms-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }
    </style>
@endsection

@section('content')
<!-- Hero Start -->
<section class="bg-half-260 d-table w-100" id="home" style="background-image: url({{ asset('front/images/banner1.jpg') }});">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h4 class="display-4 fw-bold text-white title-dark mb-3"><img src="{{ asset('logo.png') }}" width="70px" class="img-fluid" style="margin-top: -10px" alt="Logo"> Bodla Builders</h4>
                </div>
            </div>
            <div class="col-xl-11 col-12 text-center mt-sm-0 pt-sm-0">
                <div class="text-center">
                    <div class="card border-0 transparent-card">
                        <form class="card-body text-start" method="GET" action="">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-sm-0 mb-3">
                                        <div class="position-relative">
                                            <input name="sector" id="sector" type="text" class="form-control" placeholder="Sector" required>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-sm-0 mb-3">
                                        <div class="position-relative">
                                            <input name="plot" id="plot" type="text" class="form-control" placeholder="Plot#" required>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-sm-0 mb-3">
                                        <button type="submit" class="btn btn-primary btn-block w-100">Search</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end teb pane-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 text-center features feature-clean gd-bg-info p-4 rounded">
                    <div class="text-primary text-center mx-auto">
                        <i class="fas fa-home fa-3x"></i>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <a href="javascript:void(0)" class="title h5 text-dark">Twin Tower</a>
                        <p class="text-muted mt-3 mb-0">Twin Tower</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 text-center features feature-clean gd-bg-info p-4 rounded">
                    <div class="text-primary text-center mx-auto">
                        <i class="far fa-building fa-3x"></i>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <a href="javascript:void(0)" class="title h5 text-dark">BHB</a>
                        <p class="text-muted mt-3 mb-0">Business Hub</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 text-center features feature-clean gd-bg-info p-4 rounded">
                    <div class="text-primary text-center mx-auto">
                        <i class="fas fa-home fa-3x"></i>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <a href="javascript:void(0)" class="title h5 text-dark">IMK</a>
                        <p class="text-muted mt-3 mb-0">Imran Housing Scheme</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 text-center features feature-clean gd-bg-info p-4 rounded">
                    <div class="text-primary text-center mx-auto">
                        <i class="far fa-building fa-3x"></i>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <a href="javascript:void(0)" class="title h5 text-dark">Rumanza</a>
                        <p class="text-muted mt-3 mb-0">By DHA</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                <div class="team-card">
                    <a href="{{ route('bodla.pvt') }}"><img src="{{ asset('bodla-builders-pvt.png') }}" class="img-fluid" width="200px" alt="Bodla Builders"></a>
                    <p class="mt-5 mb-0">Lorem Ipsum is simply dummy text</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                <div class="team-card">
                    <a href="{{ route('bodla.developers') }}"><img src="{{ asset('bolda-builders-developers.jpg') }}" class="img-fluid" width="200px"alt="Bodla Builders"></a>
                    <p class="mt-5 mb-0">Lorem Ipsum is simply dummy text</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title mb-4 pb-2 text-center">
                    <h2 class="mb-4"><strong>Projects</strong></h2>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            <div class="col-lg-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="tiny-three-item">
                    @foreach (projects() as $item)
                    <div class="tiny-slide">
                        <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                            <div class="shop-image position-relative overflow-hidden shadow">
                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="javascript:void(0)" class="text-dark product-name h4">{{ $item->name }}</a>
                                <hr>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item"><b>{{ $item->name }} | {{ $item->city }}</b></li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div>
                    @endforeach
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title mb-4 pb-2 text-center">
                    <h2 class="mb-4"><strong>Featured Property</strong></h2>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-12 filters-group-wrap">
                <div class="filters-group">
                    <ul class="container-filter list-inline mb-0 filter-options text-center">
                        @foreach (projects() as $item)
                            <li class="list-inline-item categories-name border text-dark rounded {{ $loop->iteration == 2 ? 'active' : '' }}" data-group="{{ $item->id }}">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div id="grid" class="row">
            @foreach (properties() as $p)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 picture-item" data-groups='["{{ $p->project->id }}"]'>
                <div class="card blog border-0 work-container work-classic shadow rounded-md overflow-hidden">
                    <div class="shop-image"><img src="{{ asset($p->image) }}" class="img-fluid work-image" alt=""></div>
                    <div class="card-body">
                        <div class="content">
                            {{-- <a href="javascript:void(0)" class="badge badge-link bg-primary">Business</a> --}}
                            <h5 class="mt-3 text-dark title">{{ $p->name }}</h5>
                            <p class="text-muted">This is required when, for example, the final text is not yet available.</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<section class="section pt-0 counter-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 text-center left py-5">
                <div class="text-light text-center mx-auto">
                    <i class="fas fa-home fa-3x"></i>
                </div>
                <h1 class="h1 text-light py-3"><strong>38</strong></h1>
                <p class="text-light">Projects</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center right py-5">
                <div class="text-light text-center mx-auto">
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <h1 class="h1 text-light py-3"><strong>39</strong></h1>
                <p class="text-light">Happy Customers</p>
            </div>
        </div>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h2 class="mb-4"><strong>Happy Customer</strong></h2>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row py-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="tiny-single-item">
                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/01.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Thomas Israel </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>

                    </div>

                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/02.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Carl Oliver </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>

                    </div>

                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/03.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Barbara McIntosh </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>

                    </div>

                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/04.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Christa Smith </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>

                    </div>

                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/05.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Dean Tolle </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                    </div>

                    <div class="tiny-slide client-testi text-center">
                        <img src="{{ asset('front/images/client/06.jpg') }}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        <h6 class="text-dark title-dark mt-3"> Jill Webb </h6>
                        <ul class="list-unstyled social-icon foot-social-icon text-center">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                        <p class="text-dark para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                    </div>
                </div><!--end owl carousel-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
@endsection
