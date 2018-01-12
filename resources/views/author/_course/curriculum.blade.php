@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding  bg-theme">
        <div class="col-sm-12">

            <div style="margin: 50px">
                <div class="row">
                    <div class="col-sm-2">

                        <img src="{{asset('img/default_img.jpg')}}"
                             style="height: 150px;width:100%">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label big-font" style="color:white">{{$course->title}}<i
                                    class="fa fa-pencil p-10"></i> </label>
                    </div>
                </div>


            </div>



        </div>
    </div>



    @include('author._course.includes.author-nav')
    <div class="container m-t-10">
        <div class="row">
            <div class="col-md-8">
                <h4>Course Management</h4>

            </div>
            <div class="col-md-4">
                <a href="{{route('courses.show',$course->slug)}}" class="pull-right" style="text-decoration: none"
                   target="_blank"><h4><i class="fa fa-eye p-5"></i> Preview this course</h4></a>

            </div>
        </div>
        @include('author._course.includes.tabs')


        <div class="panel">
            <div class="panel-body">
                <lessons :course_id="{{$course->id}}"></lessons>
            </div>

        </div>


    </div>

@endsection
