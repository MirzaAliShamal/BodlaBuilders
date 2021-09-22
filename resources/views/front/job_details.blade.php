@extends('layouts.front')

@section('title', $job->title)

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>{{ $job->title }}</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <ul class="list-unstyled d-flex justify-content-between mt-4">
                                {{-- <li class="list-inline-item user me-2"><a href="javascript:void(0)" class="text-muted"><i class="uil uil-user text-dark"></i> Calvin Carlo</a></li> --}}
                                <li class="list-inline-item date text-muted"><i class="uil uil-calendar-alt text-dark"></i> {{ $job->created_at->format('d M, Y') }}</li>
                            </ul>

                            <img src="{{ asset('news/job.jpg') }}" class="img-fluid rounded-md shadow" alt="">

                            <div class="mt-3 mb-5">
                                {!! $job->description !!}
                            </div>
                            <div class="container" style="margin-left: 62%; margin-bottom: 20px">
                                <a href="{{ route('apply') }}" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

@endsection
