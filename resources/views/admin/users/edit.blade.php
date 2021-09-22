@extends("layouts.admin")

@section("title", "Users")

@section("nav-title", "Users")

@section('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.user.save',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">edit</i>
                        </div>
                        <h5 class="card-title">Edit User</h5>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="first_name"> Name *</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name',$user->name) }}">
                                    @error('first_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email"> Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email )}}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="phone"> Phone *</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password"> Password *</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <select name="role" id="role" class="form-control">
                                        <option value="" selected disabled>Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}"{{ $user->roles[0]->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-rose">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
