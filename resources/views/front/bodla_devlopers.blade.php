@extends('layouts.front')

@section('title', 'Bodla Developers')

@section('css')
    <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">
    <style>
        .tf-tree .tf-nc, .tf-tree .tf-node-content{
            border: 0px;
            padding: 0px;
        }
        .card-team {
            border: 0px;
        }
        .card-team .card-image {
            height: 120px;
            width: 120px;
            border-radius: 100%;
            overflow: hidden;
            margin: 0 auto;
        }
        .card-team .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .card-team .card-body {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Bodla Developers</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center m-auto">
                <div class="col-lg-12">
                    <div class="tf-tree tf-gap-lg text-center">
                        <ul>
                            <li>
                                <span class="tf-nc">
                                    <div class="card-team">
                                        <div class="card-image">
                                            <img src="{{ asset($lead->image) }}" class="form-control" alt="">
                                        </div>
                                        <div class="card-body">
                                            <p><strong>{{ $lead->name }}</strong></p>
                                        </div>
                                    </div>
                                </span>
                                <ul>
                                    @foreach ($team as $item)
                                        <li>
                                            <span class="tf-nc">
                                                <div class="card-team">
                                                    <div class="card-image">
                                                        <img src="{{ asset($item->image) }}" class="form-control" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <p><strong>{{ $item->name }}</strong></p>
                                                    </div>
                                                </div>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11 col-12 text-center mt-sm-0 pt-sm-0">
                    <div class="text-center">
                        <div class="card border-0 transparent-card">
                            <form class="card-body text-start" method="GET" action="{{ route('home') }}">
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
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Maps</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center m-auto">
                @foreach ($maps as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <iframe src="https://docs.google.com/gview?url={{ asset($item->path) }}&embedded=true" style="width:100%; height:400px;" frameborder="0"></iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
