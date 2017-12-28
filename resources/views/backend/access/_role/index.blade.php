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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Number of Users</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @forelse($role->perms as $permission)
                                        <span class="p-5">{{$permission->name}}</span><br>
                                        @empty
                                        <span class="p-5 bg-red">none</span><br>
                                    @endforelse
                                </td>
                                <td>1</td>
                                <td>
                                    <i data-id="{{$role->id}}" class="btn fa fa-pencil bg-blue edit"></i>

                                    <i class="btn fa fa-times bg-aqua"></i>
                                </td>
                            </tr>
                            @empty
                            <tr>No roles created yet</tr>
                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
        <!-- Edit Role Modal -->
        <div class="modal " id="edit-role" tabindex="-1" role="dialog" aria-labelledby="edit-roleLabel"
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
                let role_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();


                $.ajax({

                    url: 'role/' + role_id + '/edit',

                    success: function (response) {

                        $('#edit-role .modal-content').html(response);
                        $('#edit-role').modal('toggle');

                    }

                });
            });

        });

    </script>

@endsection