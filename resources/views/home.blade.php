@extends('layouts.app')

@section('content')
    <div class="text-center" style="background-image:url({{asset('img/front-banner.jpeg')}}); background-size: cover;background-repeat: no-repeat; height:500px;margin-bottom:10px;width: 100%;opacity: 0.8">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3"  style="margin-top: 250px">
                <label class="control-label" style="color:white;">What do you want to learn? </label>
                <input type="text" class="form-control front-search" placeholder="Search for courses" style="height: 50px;"/>

            </div>
        </div>

    </div>
    <div class="container">

        {{--<div class="row">--}}
            {{--<div class="panel">--}}


            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            @foreach($categories as $category)

                <div class="panel ">
                    <div class="panel-heading">Courses in "{{$category->name}}"</div>

                    <div class="panel-body" >
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach($category->courses as $course)
                                <div class="col-md-3 ">
                                    <div class="panel card-default  text-center">


                                        <img src="{{asset('admin_assets/img/default_img.jpg')}}" style="height: 150px;width:100%">
                                        <div class="panel-heading">

                                            {{$course->name}}</div>

                                        <div class="panel-body">
                                            {{$course->description}}
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
