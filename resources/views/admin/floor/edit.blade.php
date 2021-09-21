@extends('layouts.admin')

@section('title', 'Floors')
@section('nav-title', 'Floors')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.floor.save', $floor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Edit Floor</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="name" class="mb-2">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $floor->name) }}" autocomplete="off">
                    				@error('name')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="downpayment" class="mb-2">Downpayment</label>
                                    <input type="text" class="form-control @error('downpayment') is-invalid @enderror" name="downpayment" id="downpayment" value="{{ old('downpayment', $floor->downpayment) }}" autocomplete="off">
                    				@error('downpayment')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="possession" class="mb-2">Possession</label>
                                    <input type="text" class="form-control @error('possession') is-invalid @enderror" name="possession" id="possession" value="{{ old('possession', $floor->possession) }}" autocomplete="off">
                    				@error('possession')
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
