@extends('backend.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            Role Management
            <small>manage roles</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Access</li>
            <li class="active">Role management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="panel">
            <div class="panel-heading">

                <a href="{{route('role.create')}}" class="btn btn-success">create role</a>

            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Number of Users</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Administrator</td>
                        <td ><span class="bg-green p-5">View backend</span></td>
                        <td>1</td>
                        <td>
                            <i class="btn fa fa-pencil bg-blue"></i>
                            <i class="btn fa fa-times bg-aqua"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td ><span class="p-5">Manage courses</span></td>
                        <td>1</td>
                        <td>
                            <i class="btn fa fa-pencil bg-blue"></i>
                            <i class="btn fa fa-times bg-aqua"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td ><span class="bg-red p-5">None</span></td>
                        <td>1</td>
                        <td>
                            <i class="btn fa fa-pencil bg-blue"></i>
                            <i class="btn fa fa-times bg-aqua"></i>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>


    </section><!-- /.content -->
@endsection