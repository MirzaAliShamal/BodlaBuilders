@extends('layouts.front')

@section('title', 'Vlogs')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Vlogs</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach ($vlogs as $item)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="card blog rounded border-0 shadow">
                            <div class="shop-video position-relative">
                                <video src="{{ $item->video }}" type="video/mp4" controls></video>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">{{ Str::limit($item->title, 60, '...') }}</a></h5>
                                <hr>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    {{ $item->created_at->format('d M, Y') }}
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-5 mb-5">
                    {{ $vlogs->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
