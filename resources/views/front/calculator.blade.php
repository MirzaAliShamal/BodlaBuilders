@extends('layouts.front')

@section('title', 'Calculator')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100" id="pages" style="background-image: url({{ asset('front/images/banner1.jpg') }});"></section><!--end section-->
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h2 class="mb-4"><strong>Calculator</strong></h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card rounded border-0 shadow">
                        <div class="card-body">
                            <h2 class="title h2 text-dark text-center"><i class="fas fa-home"></i> Bodla Builders</h2>

                            <form action="" method="POST" class="calculator">
                                @csrf
                                <input type="hidden" name="possession" id="possession" value="">
                                <input type="hidden" name="downpayment" id="downpayment" value="">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Project</span>
                                    </div>
                                    <select name="project" id="project" class="form-control">
                                        <option value="" selected>Nothing Selected</option>
                                        @foreach (projects() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Floor</span>
                                    </div>
                                    <select name="floor" id="floor" class="form-control">
                                        <option value="" selected>Nothing Selected</option>
                                    </select>
                                </div>

                                <input type="hidden" class="form-control" name="amount" id="amount" autocomplete="off">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Sq/Feet</span>
                                    </div>
                                    <select name="feet" id="feet" class="form-control">
                                        <option value="" selected>Nothing Selected</option>
                                        <option value="200">200 Sq/Feet</option>
                                        <option value="250">250 Sq/Feet</option>
                                        <option value="270">270 Sq/Feet</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Installment Type</span>
                                    </div>
                                    <select name="incentive" id="incentive" class="form-control">
                                        <option value="" selected>Nothing Selected</option>
                                        <option value="12">Monthly (12m / 1 year)</option>
                                        <option value="4">Quaterly (4m / 1 year)</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">No. of Years</span>
                                    </div>
                                    <select name="year" id="year" class="form-control">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-primary text-center mt-4" onclick="calc()">Calculate</button>
                                </div>
                            </form>

                            <div class="append-results mt-5" style="display: none;">
                                <p><strong>Total Amount:</strong> <span class="total-append"></span></p>
                                <p><strong>Downpayment:</strong> <span class="downpayment-append"></span></p>
                                <p><strong>Possession:</strong> <span class="possession-append"></span></p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th>Year</th>
                                                <th>Installment</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-append">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $(document).on("change", "#project", function(e) {
            e.preventDefault();
            let elm = $(this);

            $.ajax({
                type: "GET",
                url: "{{ route('get.project.floors') }}",
                data: {
                    project_id : elm.val(),
                },
                success: function (response) {
                    $("#floor").html(response);
                }
            });
        });

        $(document).on("change", "#floor", function(e) {
            e.preventDefault();
            let elm = $(this);
            let project_id = $("#project").val();

            $("#downpayment").val(elm.find(":selected").data('downpayment'));
            $("#possession").val(elm.find(":selected").data('possession'));

            $.ajax({
                type: "GET",
                url: "{{ route('get.project.amount') }}",
                data: {
                    floor : elm.val(),
                    project_id : project_id,
                },
                success: function (response) {
                    $("#amount").val(response);
                }
            });
        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        function calc() {
            if ($("#project").val() == "" || $("#floor").val() == "" || $("#amount").val() == "" || $("#feet").val() == "" || $("#incentive").val() == "" ) {
                alert('Please fillout all the fields');
            } else {
                let possession_per = parseInt($("#possession").val()) / 100;
                let downpayment_per = parseInt($("#downpayment").val()) / 100;
                let amount = parseInt($("#amount").val());
                let incentive = parseInt($("#incentive").val());
                let year = parseInt($("#year").val());

                let possession = amount * possession_per;
                let downpayment = amount * downpayment_per;
                let installemts = amount - (possession + downpayment);
                let duration = 0;

                if (incentive == 12) {
                    duration = year * incentive;
                }
                if (incentive == 4) {
                    duration = year * (12/incentive);
                }

                let per_installment = installemts/duration;
                // let times_installment = installemts/per_installment;

                $(".total-append").html("Rs "+addCommas(amount));
                $(".downpayment-append").html("Rs "+addCommas(downpayment));
                $(".possession-append").html("Rs "+addCommas(possession));
                // console.log(times_installment);

                let html = '';
                for (let index = 1; index <= duration; index++) {
                    html += '<tr>'+
                                '<td>'+index+'</td>'+
                                '<td>Rs '+addCommas(Math.round(per_installment))+'</td>'+
                            '</tr>';
                }

                $(".tbody-append").html(html);
                $(".append-results").show();
            }
        }
    </script>
@endsection
