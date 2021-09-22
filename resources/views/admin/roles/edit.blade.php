@extends('layouts.admin')

@section('title', 'Role')
@section('nav-title', 'Role')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.role.save', $list->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">edit</i>
                        </div>
                        <h5 class="card-title">Edit Role</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="name" class="mb-2">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $list->name) }}" autocomplete="off">
                    				@error('name')
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

