<div class="col-md-4 ">
    <div class="panel course-card "  style="padding: 0;">
        {{--<img src="{{asset('admin_assets/img/default_img.jpg')}}" style="height: 100px;width:100%">--}}
        <div class="panel-heading">
            <span class="fa circle-fa" aria-hidden="true"> {{strtoupper(substr($course->name,0,1))}}</span>
            {{$course->name}}
        </div>

        {{--<div class="panel-body">--}}
        {{--{{$_course->description}}--}}
        {{--</div>--}}

    </div>
</div>