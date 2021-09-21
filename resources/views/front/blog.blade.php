@extends('layouts.front')

@section('title', 'Blogs')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Blogs</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach ($blogs as $item)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="card blog rounded border-0 shadow">
                            <div class="shop-image position-relative">
                                <img src="{{ $item->image }}" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="{{ route('blogs', $item->slug) }}" class="card-title title text-dark">{{ Str::limit($item->title, 60, '...') }}</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <a href="{{ route('blogs', $item->slug) }}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> {{ $item->user->name }}</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> {{ $item->created_at->format('d M, Y') }}</small>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-5 mb-5">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
