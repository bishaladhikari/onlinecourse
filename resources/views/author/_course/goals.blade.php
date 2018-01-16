@extends('layouts.app')

@section('content')
    @include('author._course.includes.banner')

    @include('author._course.includes.author-nav')
    <div class="container m-t-10">
        <div class="row">
            <div class="col-md-8">
                <h4>Course Management</h4>

            </div>
            <div class="col-md-4">
                <a href="{{route('courses.show',$course->slug)}}" class="pull-right" style="text-decoration: none" target="_blank"><h4><i class="fa fa-eye p-5"></i> Preview this course</h4></a>

            </div>
        </div>
        @include('author._course.includes.tabs')


        <div class="panel">
            <div class="panel-body">
                <div class="tab-content" id="tab-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Course Goals</h3>
                            <p>Set some goals for the course.</p>
                        </div>
                        <div class="col-md-4">


                        </div>
                    </div>

                    Course goal management

                </div>

            </div>

        </div>


    </div>

@endsection
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
