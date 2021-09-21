@extends('layouts.admin')

@section('title', 'Registered Users')
@section('nav-title', 'Registered Users')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Registered Users</h5>
                </div>
                <div class="card-body">
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="80px">Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($users as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td width="80px">{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->email }}</td>
                                	<td>{{ $item->phone }}</td>
                                	<td class="td-actions text-right">
                                        <button type="button" onclick="deleteAlert('{{ route('admin.registered.user.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
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
