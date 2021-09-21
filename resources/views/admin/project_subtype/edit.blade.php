@extends('layouts.admin')

@section('title', 'Project Sub Types')
@section('nav-title', 'Project Sub Types')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.project_subtype.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Project Sub Type</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="project_id" class="mb-2">Project</label>
                    				<select name="project_id" id="project_id" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->id }}" {{ $project_subtype->project_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                    				<label for="type" class="mb-2">Types</label>
                    				<select name="type" id="type" class="form-control position-relative">
                                        <option value="" selected>Nothing Selected</option>
                                        <option value="Plot" {{ $project_subtype->type == "Plot" ? 'selected' : '' }}>Plot</option>
                                        <option value="Residential" {{ $project_subtype->type == "Residential" ? 'selected' : '' }}>Residential</option>
                                        <option value="Commercial" {{ $project_subtype->type == "Commercial" ? 'selected' : '' }}>Commercial</option>
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
                    				<label for="subtype" class="mb-2">Sub type</label>
                    				<input type="text" class="form-control @error('subtype') is-invalid @enderror" id="subtype" name="subtype" placeholder="Sub Type" value="{{ old('subtype', $project_subtype->subtype) }}" autocomplete="off">
                    				@error('subtype')
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
