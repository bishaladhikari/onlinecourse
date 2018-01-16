@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding bg-theme">
        <div class="col-sm-12">

            <div class="col-md-6 col-md-offset-3 text-center">
                <p class="p-15" style="color:white;font-size: 50px">Browse our course library</p>


            </div>
        </div>


    </div>

    <div class="panel p-5">
        <div class="container">
            <div class="row">

                <div class="col-md-2"><a href="{{route('home')}}"><i class="fa fa-arrow-left m-r-5"></i>Back to home</a>
                </div>
                <div class="col-md-2 pull-right">

                    <select class="form-control">
                        <option>Sort by</option>
                    </select>

                </div>


            </div>

        </div>
    </div>
    <div class="container">
        <div class="row" style="margin: 0">
            <div class="col-md-2">
                <ul class="nav ">
                    <li><h4> All Categories</h4></li>
                    @foreach($categories as $category)

                        <li>{{$category->name}}</li>

                    @endforeach
                </ul>
                <ul class="nav m-t-10">
                    <li><h4>Price</h4></li>
                    <li>All</li>
                    <li>Free courses</li>
                    <li>Paid courses</li>
                </ul>

            </div>
            <div class="col-md-10">


                @foreach($categories as $category)

                    <div class="panel">
                        <div class="panel-heading">
                            <h4>Courses in "{{$category->name}}"</h4>
                        </div>

                        <div class="panel-body">


                            <div class="row">
                                @forelse($category->courses as $course)

                                    <a href="{{route('courses.show',$course->slug)}}">
                                        <div class="col-sm-3 ">

                                            <div class="panel text-center course-card">


                                                <div class="cover__wrap">
                                                    <img src="{{$course->image? asset($course->image):asset('img/default-image.png')}}" class="course-img img-responsive " >
                                                </div>

                                                <div class="panel-heading">

                                                    <p class="subtitle"><b>{{$course->title}}</b><br>
                                                        <span class="message">{{$course->subtitle}}</span>
                                                    </p>


                                                </div>
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
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>

    </div>

@endsection
