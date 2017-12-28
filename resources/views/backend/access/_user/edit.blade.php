<div class="modal-header">
    <span class="modal-title" >Edit User</span>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="form-horizontal edit-user-form" method="POST" action="{{route('user.update',$user)}} ">

        <div class="row form-group">
            <div class="col-sm-3"><label class="control-label">Full Name</label></div>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Enter role name" id="name"
                       name="name" value="{{$user->name}}" required/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3"><label class="control-label">Email</label></div>
            <div class="col-sm-9">
                <input type="email" class="form-control" placeholder="Enter role name" id="email"
                       name="email" value="{{$user->email}}"  required/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"><label class="control-label">Associated Roles:</label></div>

            <div class="col-sm-9">

                @foreach($roles as $role)
                    <input type="checkbox" name="roles[]" @if($user->roles->contains($role)) checked @endif  value="{{$role->id}}"/>
                    <label>{{$role->name}}</label>
                    <br>
                @endforeach

            </div>
        </div>
        {{ method_field('PATCH') }}
        {{csrf_field()}}
    </form>

</div>
<div class="modal-footer">
    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    <button type="button" id="edit-user-submit" class="btn btn-success save-course-btn">Save changes</button>
</div>

<script>
    $(document).ready(function(){
        $('#edit-user-submit').click(function(){
            $('.edit-user-form').submit();
        });
    });
</script>