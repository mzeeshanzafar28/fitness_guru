@extends('Layouts.AdminLayout')
@section('title', 'Setting')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Setting</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Update Your Password</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible shadow fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ URL::to('admin/update-password') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6 form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button class="btn btn-success">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection