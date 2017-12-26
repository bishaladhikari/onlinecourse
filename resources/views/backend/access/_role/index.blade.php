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
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>
                                @foreach($role->perms as $permission)
                                    <span class="bg-green p-5">{{$permission->name}}</span>
                                @endforeach
                            </td>
                            <td>1</td>
                            <td>
                                <i class="btn fa fa-pencil bg-blue"></i>
                                <i class="btn fa fa-times bg-aqua"></i>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>


    </section><!-- /.content -->
@endsection