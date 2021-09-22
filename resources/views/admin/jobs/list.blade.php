@extends('layouts.admin')

@section('title', 'Jobs')
@section('nav-title', 'Jobs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Jobs List</h5>
                </div>
                <div class="card-body">
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="toolbar text-right">
			                	<a href="{{route('admin.jobs.add')}}" class="btn btn-rose">+ Add Job</a>
			                </div>
                        </div>
                	</div>
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="80px">Date</th>
                                    <th width='20%'>Title</th>
                                    <th width='40%'>Description</th>
                                    <th>Status</th>
                                    <th class="text-right" width='15%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td width="80px">{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->title }}</td>
                                	<td>{!! $item->description !!}</td>
                                    @if($item->status)
                                	    <td>
                                            <span class="badge badge-pill badge-success">Open</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-pill badge-danger">Close</span>
                                        </td>
                                    @endif
                                	<td class="td-actions text-right">
                                		<a href="{{ route('admin.jobs.edit', $item->id) }}" rel="tooltip" class="btn btn-success btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.jobs.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">delete_outline</i>
                                        </button>
                                        @if($item->status)
                                            <a href="{{ route('admin.jobs.status', $item->id) }}" rel="tooltip" class="btn btn-warning btn-round" data-original-title="Change status" title="Change status to close">
                                                <i class="material-icons">toggle_off</i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.jobs.status', $item->id) }}" rel="tooltip" class="btn btn-info btn-round" data-original-title="Change status" title="Change status to open">
                                                <i class="material-icons">toggle_on</i>
                                            </a>
                                        @endif
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
