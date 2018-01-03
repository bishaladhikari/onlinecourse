@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding">
        <div class="col-sm-12 text-center " style="background-image:url({{asset('img/front-banner.jpeg')}}); background-size: cover;background-repeat: no-repeat; height:500px;margin-bottom:10px;width: 100%;opacity: 0.8">
            <div class="row ">
                <div class="col-md-6 col-md-offset-3" style="margin-top: 250px">
                    <label class="control-label" style="color:white;">What do you want to learn? </label>
                    <input type="text" class="form-control front-search" placeholder="Search for courses"
                           style="height: 50px;"/>

                </div>
            </div>
        </div>
    </div>

    <div class="container m-b-10">

        {{--<div class="row">--}}
        {{--<div class="panel">--}}


        {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            @foreach($categories as $category)

                <div class="panel">
                    <div class="panel-heading">
                        <h4>Courses in "{{$category->name}}"</h4>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach($category->courses as $course)
                                <a href="{{route('courses.show',$course->slug)}}">
                                <div class="col-md-3 ">

                                    <div class="panel  course-card  text-center">


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
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
