@extends('admin.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            Category Management
            <small>create category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Access</li>
            <li class="active">Course Management</li>
            <li class="active">Create category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                <h3>Create Category</h3>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{route('category.store')}}">
                    <div class="form-group row">

                        <label for="name" class="control-label col-lg-2">Name</label>


                        <div class="col-lg-10">

                            <input type="text" class="form-control" name="name" placeholder="Category Name"
                                   required/>
                        </div>
                    </div>

                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                </form>

            </div>
        </div>


    </section><!-- /.content -->
@endsection