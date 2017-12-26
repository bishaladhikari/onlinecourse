@extends('backend.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            Role Management
            <small> create role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Access</li>
            <li class="active">Role management</li>
            <li class="active">create role</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                <h3>Create Role</h3>


            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{route('role.store')}}">
                    <div class="form-group row">

                        <label for="name" class="control-label col-lg-2">Name</label>


                        <div class="col-lg-10">

                            <input type="text" class="form-control" name="name" placeholder="Name of a role"
                                   required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2">Associated Permissions</label>
                        <div class="col-lg-10">

                            @foreach($permissions as $permission)
                                <input type="checkbox" name="permissions[]"  value="{{$permission->id}}"/>
                                <label>{{$permission->name}}</label>
                                <br>
                            @endforeach

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                    {{csrf_field()}}
                </form>

            </div>
        </div>


    </section><!-- /.content -->
@endsection