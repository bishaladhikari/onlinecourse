@extends('admin.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            Course Management
            <small>Manage all courses created by author</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Course Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                {{--<h3>all active users</h3>--}}
                {{--<a href="{{route('_course.create')}}" class="btn btn-success">Create Category</a>--}}

                <span class="pull-left">
                    {{--<a href="user.create" class="btn btn-success">create user</a>--}}
                    {{--<a href="#" class="btn btn-success">create user</a>--}}
                    <input class="form-control" type="text" placeholder="search"/>
                </span>
                <span class="pull-right">
                    <select class="form-control" name="filter">
                        <option>All Courses</option>
                        <option>Approved</option>
                        <option>Pending Approval</option>
                    </select>
                </span>


            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Published</th>
                            <th>Approved</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->category->name}}</td>
                                <td><span class="bg-green p-5">Free</span></td>
                                <td>yes</td>
                                <td>yes</td>

                                <td>
                                    <i class="btn fa bg-blue fa-eye"><span class="m-l-5">preview</span></i>
                                    {{--<i data-id="{{$category->id}}" class="btn fa fa-pencil bg-blue edit"></i>--}}

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