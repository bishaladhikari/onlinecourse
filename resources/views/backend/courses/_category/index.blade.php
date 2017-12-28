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
                <a href="{{route('category.create')}}" class="btn btn-success">Create Category</a>

                <span class="pull-right">
                    {{--<a href="user.create" class="btn btn-success">create user</a>--}}
                    {{--<a href="#" class="btn btn-success">create user</a>--}}
                    <input class="form-control" type="text" placeholder="search"/>
                </span>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
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
                                    <i data-id="{{$category->id}}" class="btn fa fa-pencil bg-blue edit"></i>

                                    <i class="btn fa fa-times bg-aqua"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        <!-- Edit Category Modal -->
        <div class="modal " id="edit-category" tabindex="-1" role="dialog" aria-labelledby="edit-categoryLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>


    </section><!-- /.content -->
    <script>

        $(document).ready(function (e) {


            $('body').on("click", '.edit', function (e) {
                let category_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();


                $.ajax({

                    url: 'category/' + category_id + '/edit',

                    success: function (response) {

                        $('#edit-category .modal-content').html(response);
                        $('#edit-category').modal('toggle');

                    }

                });
            });

        });

    </script>
@endsection