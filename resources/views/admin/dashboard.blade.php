@extends('layouts.admin')

@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="#">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon"><i class="material-icons">category</i></div>
                        <p class="card-category">Projects</p>
                        <h3 class="card-title">{{ projectCount() }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">category</i> Total # of Projects</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="#">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">fact_check</i></div>
                        <p class="card-category">Properties</p>
                        <h3 class="card-title">{{ propertiesCount() }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">fact_check</i> Total # of Properties</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="#">
                <div class="card card-stats">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon"><i class="material-icons">done_outline</i></div>
                        <p class="card-category">DHA Properties</p>
                        <h3 class="card-title">{{ dhaCount() }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">done_outline</i> Total # of DHA Properties</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="#">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon"><i class="material-icons">hide_source</i></div>
                        <p class="card-category">Users</p>
                        <h3 class="card-title">{{ usersCount() }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">hide_source</i> Total # of Registered Users</div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3><strong>Recent Registered Users</strong></h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->created_at->format('d M, Y') }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
