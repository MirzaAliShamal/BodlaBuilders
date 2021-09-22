@extends('layouts.admin')

@section('title', 'Applications')
@section('nav-title', 'Applications')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Job Applications List</h5>
                </div>
                <div class="card-body">
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="80px">Date</th>
                                    <th width='20%'>Name</th>
                                    <th width='40%'>Email</th>
                                    <th>Phone</th>
                                    <th class="text-right" width='15%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $loop->iteration }}</td>
                                	<td width="80px">{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->email }}</td>
                                    <td>{{ $item->contact }}</td>
                                	<td class="td-actions text-right">
                                		<a href="{{ asset($item->cv) }}" rel="tooltip" class="btn btn-rose " data-original-title="cv" title="Download Cv">
                                            <i class="material-icons">article</i>
                                        </a>
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
