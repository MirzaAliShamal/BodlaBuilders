@extends('layouts.front')

@section('title', 'Gallery')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Gallery</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                @foreach ($gallery as $item)
                    <div class="col-lg-3 col-md-6 col-12 spacing mt-3 picture-item">
                        <div class="card border-0 work-container work-grid position-relative d-block overflow-hidden rounded">
                            <div class="card-body p-0">
                                <a href="{{ asset($item->path) }}" class="lightbox gallery-image d-inline-block" title="">
                                    <img src="{{ asset($item->path) }}" class="img-fluid" alt="work-image">
                                </a>
                                <div class="content bg-white p-3">
                                    <h5 class="mb-0 text-dark title">{{ $item->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-5 mb-5">
                    {{ $gallery->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
