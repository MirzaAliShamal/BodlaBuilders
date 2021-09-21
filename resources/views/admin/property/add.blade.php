@extends('layouts.admin')

@section('title', 'Property')
@section('nav-title', 'Property')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.property.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Property</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="image">Image</label>
                    				<input type="file" name="image" id="image" class="dropify">
                    				@error('image')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="project_id" class="mb-2">Project</label>
                    				<select name="project_id" id="project_id" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                    				@error('project_id')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="type" class="mb-2">Type</label>
                    				<select name="type" id="type" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>

                                    </select>
                    				@error('type')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="subtype" class="mb-2">Sub Type</label>
                    				<select name="subtype" id="subtype" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>

                                    </select>
                    				@error('type')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="floor" class="mb-2">Floor</label>
                                    <select name="floor" id="floor" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>
                                        @foreach ($floors as $item)
                                            <option value="{{ $item->name }}" data-downpayment="{{ $item->downpayment }}" data-possession="{{ $item->possession }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="downpayment">Downpayment</label>
                                    <input type="text" name="downpayment" id="downpayment" class="form-control @error('downpayment') is-invalid @enderror" value="{{ old('downpayment') }}" autocomplete="off">
                    				@error('downpayment')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="possession">Possession</label>
                                    <input type="text" name="possession" id="possession" class="form-control @error('possession') is-invalid @enderror" value="{{ old('possession') }}" autocomplete="off">
                    				@error('possession')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                                </div>
                            </div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="name">Property</label>
                    				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                    				@error('name')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="amount">Amount</label>
                    				<input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" autocomplete="off">
                    				@error('amount')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="description">Description</label>
                    				<textarea name="description" id="description" rows="5" class="form-control @error('name') is-invalid @enderror" autocomplete="off">{{ old('description') }}</textarea>
                    				@error('description')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-rose">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('description');

        $(document).on("change", "#project_id", function(e) {
            let elm = $(this);
            $.ajax({
                type: "GET",
                url: "{{ route('admin.property.get.types') }}",
                data: {
                    project_id: elm.val(),
                },
                success: function (response) {
                    $("#type").html(response);
                }
            });
        });

        $(document).on("change", "#type", function(e) {
            let elm = $(this);
            let project_id = $("#project_id").val();
            $.ajax({
                type: "GET",
                url: "{{ route('admin.property.get.subtypes') }}",
                data: {
                    type: elm.val(),
                    project_id: project_id,
                },
                success: function (response) {
                    $("#subtype").html(response);
                }
            });
        });

        $(document).on("change", "#floor", function(e) {
            let elm = $(this);
            let poss = elm.find(":selected").data('possession');
            let downp = elm.find(":selected").data('downpayment');

            $("#downpayment").val(downp);
            $("#possession").val(poss);
        });
    </script>
@endsection
