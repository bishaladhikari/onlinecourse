@extends('admin.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            User Management
            <small>create user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Access</li>
            <li class="active">User Management</li>
            <li class="active">Create user</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                <h3>Create User</h3>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{route('user.store')}}">
                    <div class="form-group row">

                        <label for="name" class="control-label col-lg-2">Name</label>


                        <div class="col-lg-10">

                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2">Confirm Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="confirm password" placeholder="Confirm Password"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2">Associated role</label>
                        <div class="col-lg-10">
                            @foreach($roles as $role)
                                <input type="checkbox" name="roles[]"  value="{{$role->id}}"/>
                                <label>{{$role->name}}</label>
                                <br>
                            @endforeach

                        </div>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                </form>

            </div>
        </div>


    </section><!-- /.content -->
@endsection