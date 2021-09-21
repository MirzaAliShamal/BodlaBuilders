@extends('layouts.admin')

@section('title', 'Project Types')
@section('nav-title', 'Project Types')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.project_type.save', $project_type->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Project Type</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="project_id" class="mb-2">Project</label>
                    				<select name="project_id" id="project_id" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->id }}" {{ $project_type->project_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                        <option value="Plot" {{ $project_type->type == "Plot" ? 'selected' : '' }}>Plot</option>
                                        <option value="Residential" {{ $project_type->type == "Residential" ? 'selected' : '' }}>Residential</option>
                                        <option value="Commercial" {{ $project_type->type == "Commercial" ? 'selected' : '' }}>Commercial</option>
                                    </select>
                    				@error('type')
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
