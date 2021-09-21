<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <h5 class="text-light footer-head">About Us</h5>
                <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>

            </div><!--end col-->

            <div class="col-lg-5 col-md-5 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Popular Properties</h5>
                <div class="popular-properties mt-4">
                    @foreach (popular() as $item)
                        <div class="d-flex mb-3">
                            <div style="width:150px; height: 100px; border-radius:5px;">
                                <img src="{{ asset($item->image) }}" class="img-fluid" style="border-radius:5px; width:100%; height:100%; object-fit:cover" alt="">
                            </div>
                            <div class="ms-2">
                                <h5>{{ $item->name }}</h5>
                                <p>{{ $item->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Newsletter</h5>
                <p class="mt-4">Sign up and receive the latest tips via email.</p>
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" style="color:#fff !important; order-color: #121312 !important;box-shadow: 0 3px 5px 0 rgb(18 19 18 / 30%);" value="Subscribe">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Bodla Builders. All Rights Reserved</p>
                </div>
            </div><!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <ul class="list-unstyled social-icon foot-social-icon text-sm-end">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul><!--end icon-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
