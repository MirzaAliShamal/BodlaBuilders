@extends('layouts.front')

@section('title', 'Jobs')

@section('content')
<!-- Hero Start -->
<section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});">
</section>
<!--end section-->
<!-- Hero End -->
@section('css')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@endsection
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h2 class="mb-4"><strong>Jobs</strong></h2>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <form action="{{ route('application.save') }}" method="POST" class="applicationForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-header bg-primary text-white">

                            <h5 class="card-title text-center">Application form</h5>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="mb-2">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" required autocomplete="off">
                                        @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" required id="email" value="{{ old('email') }}" autocomplete="off">
                                        @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact" class="mb-2">Contact</label>
                                        <input type="number" class="form-control @error('contact') is-invalid @enderror"
                                            name="contact" required id="contact" value="{{ old('contact') }}" autocomplete="off">
                                        @error('contact')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="file" name="cv" id="cv" hidden>
                                    <label for="cv">
                                      <b class="btn btn-info">Upload CV</b>
                                    </label>
                                    <div id="msg" class="col-12 mt-1" style="display: none">
                                        <b class="text-danger">Please upload your CV!</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  mt-2">
                            <button type="submit" class="btn btn-primary" style="margin-left: 86%">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script>
        $(document).on('submit', '.applicationForm',function () {
            if( $('#cv').val() == ''){
                $('#msg').show();
                return false;
            }
        });
    </script>
@endsection

