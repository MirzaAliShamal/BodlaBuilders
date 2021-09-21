@extends('layouts.front')

@section('title', 'DHA')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>DHA</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card rounded border-0 shadow">
                        <div class="card-body">
                            <h2 class="title h2 text-dark text-center"><i class="fas fa-home"></i> Bodla Builders</h2>
                            @if (is_null($property))
                                <h3 class="mt-5 text-center">No Record Found</h3>
                            @else
                                <div class="row mt-5">
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Sector:</strong> {{ $property->sector }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Plot#:</strong> {{ $property->plot }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Charges:</strong> {{ $property->charges }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Name:</strong> {{ $property->name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Contact:</strong> {{ $property->contact }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Demand:</strong> Rs {{ number_format($property->demand) }}</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <p><strong>Description:</strong></p>
                                        {!! $property->description !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
