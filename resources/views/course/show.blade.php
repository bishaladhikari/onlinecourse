@extends('layouts.app')

@section('content')
    <div class="container-fluid  bg-theme">

        <div class="col-sm-12 p-10">
            <div class="row">
                <div class="col-sm-4">

                        <img src="{{$course->image? asset($course->image):asset('img/default-image.png')}}" class="course-img img-responsive img-thumbnail " >
                </div>
                <div class="col-sm-8" >
                    <span class="control-label btn-secondary p-5"
                          style="color:white;">{{$course->category->name}}</span>
                    <br>

                    <h3 style="color:white;">{{$course->title}}</h3>
                    <span class="p-5" style="color:white;">
                        {{--<span--}}
                                {{--class="big-font">|</span>--}}
                        {{$course->subtitle}}</span><br>
                    <a href="{{route('lesson.show',['slug'=>$course->slug,'index'=>1])}}" class="btn p-10 m-t-10" style="background: #00b2b2;color: white">Start Lessons</a>

                </div>

            </div>


        </div>
    </div>

    {{--@include('course.includes.navigation')--}}

    <div style="background: white; ">
        <ul class="nav nav-tabs container" style="border-bottom: 0">
            <li id="list" class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
            <li id="add"><a data-toggle="tab" href="#course-content">Course Content</a></li>
            <li id="add"><a data-toggle="tab" href="#announcements">Announcements</a></li>
            <li id="add"><a data-toggle="tab" href="#reviews">Reviews</a></li>

        </ul>
    </div>

    <div class="tab-content p-10 container">
        <!--1st tab overview-->

        <div id="overview" class="tab-pane fade in active">
           {{--<h4> Course Overview</h4>--}}
            <div class="row ">
                <div class="col-sm-3">
                    <div class="panel panel-card" style="height:200px;">
                        <div class="panel-body">
                            <b class="lightseagreen">Course Info</b>
                            <p>{{$course->level}} level</p>
                        </div>
                    </div>
                    <div class="panel panel-card" style="height:300px;">
                        <div class="panel-body">
                            <b class="lightseagreen">Instructor Information</b>

                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <b class="lightseagreen">Course Description</b>
                    <p>{{$course->description}}</p>
                </div>
            </div>

        </div>
        <!--2nd tab course content-->
        <div id="course-content" class="tab-pane fade in ">
            @forelse($course->lesson as $index=>$lesson)

                <div class="panel panel-card">
                    {{--@if($index==0)--}}
                        {{--<div class="panel-heading no-padding">--}}
                            {{--<span class="bg-theme p-5" style="border-radius:2px">Free preview</span>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    <div class="panel-body">
                        <div class="row ">
                            <a href="{{route('lesson.show',['slug'=>$course->slug,'index'=>$index+1])}}">
                                <div class="col-xs-2 text-center"><h3><i class="fa fa-play-circle"
                                                                         style="font-size: 80px;"></i></h3></div>
                            </a>
                            <div class="col-xs-10">
                                <p class="message">Lesson {{ $index+1 }}</p>

                                <a href="{{route('lesson.show',['slug'=>$course->slug,'index'=>$index+1])}}" style="font-size: 16px"><b class="lightseagreen">{{$lesson->title}}</b></a><br>
                                <b class="message">{{$lesson->description}}</b>
                            </div>
                        </div>

                    </div>
                </div>

            @empty
                <div class="panel panel-card">
                    <div class="panel-body">
                        No lessons Available
                    </div>
                </div>
            @endforelse

        </div>
        <!--3rd tab announcements-->
        <div id="announcements" class="tab-pane fade in ">

            <div class="panel panel-card">
                <div class="panel-body">
                    announcements
                </div>
            </div>
        </div>
        <!--4th tab reviews-->
        <div id="reviews" class="tab-pane fade in">

            <div class="panel panel-card">
                <div class="panel-body">
                    reviews
                </div>
            </div>
        </div>

    </div>

    <script>
        //showing url with #
        $(function () {
            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function (e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop() || $('html').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        });
    </script>

@endsection
