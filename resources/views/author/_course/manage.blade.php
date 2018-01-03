@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding" style="background:#00b1b3">
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



    @include('frontend.author._course.includes.author-nav')
    <div class="container m-t-10">
        <h4>Course Management</h4>
        <div class="panel">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li role="presentation" id="list" class="active">
                        <a style="color: gray"  href="info">Basic Info</a>

                    </li>
                    <li role="presentation">

                        <a style="color: gray" href="goals"
                           onclick="tab_content('goals')">Goals</a>
                    </li>
                    <li role="presentation">
                        <a style="color: gray"  href="curriculum" >Curriculum</a>
                    </li>
                    <li role="presentation">
                        <a style="color: gray"  href="announcement" >Announcements</a>
                    </li>
                    <li role="presentation">
                        <a style="color: gray"  href="message" >Welcome Message</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content" id="tab-content">


                </div>

            </div>

        </div>


    </div>

@endsection
<script >
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
