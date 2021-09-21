@extends('layouts.admin')

@section('title', 'Vlogs')
@section('nav-title', 'Vlogs')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.vlog.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Edit Vlog</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="video">Video</label>
                    				<input type="file" name="video" id="video" class="dropify" data-default-file={{ asset($vlog->video) }}>
                    				@error('video')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="title">Title</label>
                    				<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $vlog->title) }}" autocomplete="off">
                    				@error('title')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="content">Content</label>
                    				<textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content', $vlog->content) }}</textarea>
                    				@error('content')
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
        CKEDITOR.replace('content');
    </script>
@endsection
