@extends('Layouts.AdminLayout')
@section('title', 'All Users')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Active Packages</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">All Active Packages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap align-middle mb-0" id="userTable">
                                <thead>
                                    <tr>
                                        <th scope="col">User ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">User Phone</th>
                                        <th scope="col">Joining Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <a href="#" class="fw-medium link-primary">{{ $user->id }}</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img src="{{ asset('assets/images/default.png') }}" alt="" class="avatar-xs rounded-circle shadow" />
                                                </div>
                                                <div class="flex-grow-1">{{ $user->name }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a  href="{{ URL::to('profile/'.$user->id) }}" class="btn btn-success btn-sm">View Profile</a>
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
</div>
@endsection
@section('script')
    <script>
        $(function(){
            $("#userTable").DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
@endsection