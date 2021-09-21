@extends('layouts.admin')

@section('title', 'DHA')
@section('nav-title', 'DHA')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.dha.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add DHA Project</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="sector" class="mb-2">Sector</label>
                                    <input type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" id="sector" value="{{ old('sector') }}" autocomplete="off">
                    				@error('sector')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="plot" class="mb-2">Plot#</label>
                                    <input type="text" class="form-control @error('plot') is-invalid @enderror" name="plot" id="plot" value="{{ old('plot') }}" autocomplete="off">
                    				@error('plot')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="charges" class="mb-2">Development Charges</label>
                                    <input type="text" class="form-control @error('charges') is-invalid @enderror" name="charges" id="charges" value="{{ old('charges') }}" autocomplete="off">
                    				@error('charges')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                    			<div class="form-group">
                    				<label for="name" class="mb-2">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autocomplete="off">
                    				@error('name')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                    			<div class="form-group">
                    				<label for="contact" class="mb-2">Contact</label>
                                    <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" value="{{ old('contact') }}" autocomplete="off">
                    				@error('contact')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                    			<div class="form-group">
                    				<label for="demand" class="mb-2">Demand</label>
                                    <input type="text" class="form-control @error('demand') is-invalid @enderror" name="demand" id="demand" value="{{ old('demand') }}" autocomplete="off">
                    				@error('demand')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="description" class="mb-2">Description</label>
                                    <textarea name="description" id="description" class="description"></textarea>
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
    </script>
@endsection
