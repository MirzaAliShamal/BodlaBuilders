@extends('layouts.admin')

@section('title', 'Vlogs')
@section('nav-title', 'Vlogs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Vlogs List</h5>
                </div>
                <div class="card-body">
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="toolbar text-right">
			                	<a href="{{route('admin.vlog.add')}}" class="btn btn-rose">+ Add Vlog</a>
			                </div>
                        </div>
                	</div>
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="80px">Date</th>
                                    <th>Title</th>
                                    <th>Video</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td width="80px">{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->title }}</td>
                                    <th><b><a href="{{ asset($item->video) }}" target="_blank">Watch Video</a></b></th>
                                	<td class="td-actions text-right">
                                		<a href="{{ route('admin.vlog.edit', $item->id) }}" rel="tooltip" class="btn btn-success btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.vlog.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">delete_outline</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
