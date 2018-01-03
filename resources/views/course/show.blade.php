@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding">
        <div class="col-sm-12" style="background:#00b1b3">

            <div style="margin: 100px">
                <span class="control-label btn-secondary p-5" style="color:white;">{{$course->category->name}}</span>
                <br>

                <label class="control-label" style="color:white;font-size: 50px">{{$course->title}}</label>
                <span class="p-5" style="color:white;"><span style="font-size: 50px;">|</span> {{$course->subtitle}}</span>

            </div>


        </div>
    </div>


    <div class="container m-t-10" >
        <div class="row " style="margin: 0">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>course content</h3>
                    </div>
                    <div class="panel-body">

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
