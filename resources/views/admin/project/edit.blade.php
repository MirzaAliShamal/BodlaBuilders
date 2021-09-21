@extends('layouts.admin')

@section('title', 'Projects')
@section('nav-title', 'Projects')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.project.save', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Project</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="image">Image</label>
                    				<input type="file" name="image" id="image" class="dropify" data-default-file="{{ asset($project->image) }}">
                    				@error('image')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="name">Name</label>
                    				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $project->name) }}" autocomplete="off">
                    				@error('name')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="city">City</label>
                    				<input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $project->city) }}" autocomplete="off">
                    				@error('city')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="description">Description</label>
                    				<textarea name="description" id="description" rows="5" class="form-control @error('name') is-invalid @enderror" autocomplete="off">{{ old('description', $project->description) }}</textarea>
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
