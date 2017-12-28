@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding">
        <div class="col-sm-12" style="background:#00b1b3">

            <div  style="margin: 100px">
                <label class="control-label" style="color:white;font-size: 50px">Author Dashboard</label>
            </div>


        </div>
    </div>


    <div class="container m-t-10">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 " >
                       <i class="fa fa-book big-font"></i><span class="big-font">Jump into course creation</span>
                    </div>
                    <div class="col-md-2">
                        <a class="btn theme-btn" href="{{route('courses.create')}}">Create New Course</a>

                    </div>
                </div>
            </div>
        </div>



            <div class="panel">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        @forelse($courses as $course)
                            <div class="col-md-4 ">

                                <div class="panel course-card  text-center">


                                    <img src="{{asset('admin_assets/img/default_img.jpg')}}"
                                         style="height: 150px;width:100%">
                                    <div class="panel-heading">

                                        <h5>{{$course->title}}</h5>
                                    </div>

                                    <div class="panel-body">
                                        {{$course->description}}
                                    </div>

                                </div>


                            </div>

                        @empty
                            <div class="panel  course-card  text-center">


                                <div class="panel-body">
                                    No courses available.
                                </div>

                            </div>
                        @endforelse
                    </div>

                </div>

            </div>



    </div>

@endsection
