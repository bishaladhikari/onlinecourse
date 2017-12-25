@extends('backend.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            Category Management
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                {{--<h3>all active users</h3>--}}
                <a href="{{route('category.create')}}" class="btn btn-success">create category</a>

                <span class="pull-right">
                    {{--<a href="user.create" class="btn btn-success">create user</a>--}}
                    {{--<a href="#" class="btn btn-success">create user</a>--}}
                    <input class="form-control" type="text" placeholder="search"/>
                </span>

            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Number of courses</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>0</td>

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