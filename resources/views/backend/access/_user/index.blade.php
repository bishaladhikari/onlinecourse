@extends('backend.layout.master')
@section('content')
    <section class="content-header">
        <h1>
            User Management
            <small>Active Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Access</li>
            <li class="active">User Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel">
            <div class="panel-heading">
                {{--<h3>all active users</h3>--}}
                <a href="{{route('user.create')}}" class="btn btn-success">create user</a>

                <span class="pull-right">
                    {{--<a href="user.create" class="btn btn-success">create user</a>--}}
                    {{--<a href="#" class="btn btn-success">create user</a>--}}
                    <input class="form-control" type="text" placeholder="search"/>
                </span>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->name}}
                                    @endforeach
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <i data-id="{{$user->id}}" class="btn fa fa-pencil bg-blue edit"></i>

                                    <i class="btn fa fa-times bg-aqua"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal " id="edit-user" tabindex="-1" role="dialog" aria-labelledby="edit-userLabel"
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
                let user_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();


                $.ajax({

                    url: 'user/' + user_id + '/edit',

                    success: function (response) {

                        $('#edit-user .modal-content').html(response);
                        $('#edit-user').modal('toggle');

                    }

                });
            });

        });

    </script>

@endsection