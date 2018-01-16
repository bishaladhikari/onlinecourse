
<div class="container-fluid no-padding bg-theme" >
    <div class="col-sm-12">

        <div class="p-10">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{$course->image? asset($course->image):asset('img/default-image.png')}}" class="img-responsive course-img">
                </div>
                <div class="col-sm-6">
                    <label class="control-label big-font" style="color:white">{{$course->title}}<i
                                class="fa fa-pencil p-10"></i> </label>
                </div>
                <div class="col-sm-2">
                    <h4 style="color:white">No of Lessons: 4 </h4>
                    {{--<label class="control-label big-font" style="color:white">No of Lessons: 4 </label>--}}
                </div>
            </div>


        </div>


    </div>
</div>