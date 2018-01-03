@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding" style="background:#00b1b3">
        <div class="col-sm-12">
            <div style="margin: 50px">

                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" style="color:white;font-size: 50px">Author Dashboard</label>
                    </div>

                    <div class="col-md-4">
                        <label class="control-label " style="color:white;">No of courses: 5 |</label>
                        <label class="control-label " style="color:white;">No of students: 5</label>

                    </div>
                </div>

            </div>


        </div>
    </div>


    @include('author._course.includes.author-nav')

    <div class="container m-t-10">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 ">
                        <i class="fa fa-book big-font"></i><span class="big-font">Jump into course creation</span>
                    </div>
                    <div class="col-md-2">
                        <a class="btn theme-btn" href="{{route('author.courses.create')}}">Create New Course</a>

                    </div>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">

                    <div class="col-md-4"><h4>List of all your courses</h4>
                    </div>
                    <div class="col-md-2 pull-right">

                        <select class="form-control">
                            <option>Sort by</option>
                        </select>

                    </div>


                </div>
            </div>
            <div class="panel-body">

                <div class="row">
                    @forelse($courses as $course)
                        <a href="{{route('author.course.manage.info',$course->slug)}}">

                            <div class="col-md-3 " >
                                <div class="panel course-card">

                                    <img src="{{asset('img/default_img.jpg')}}"
                                         style="height: 150px;width:100%">
                                    <div class="panel-heading text-center">

                                        <span>{{$course->title}}</span>
                                    </div>

                                    <div class="panel-body">
                                        <p>{{$course->subtitle}}</p>
                                        <span class="pull-right">Draft</span>
                                    </div>

                                    <div class="text">Manage course <br> {{$course->title}}</div>

                                </div>


                            </div>

                        </a>

                    @empty
                        <div class="panel  course-card  text-center">


                            <div class="panel-body">
                                No courses available.
                            </div>

                        </div>
                    @endforelse
                        <div class="clearfix"></div>
                </div>

            </div>

        </div>


    </div>

@endsection
