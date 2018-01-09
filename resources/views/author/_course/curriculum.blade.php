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


                {{--<div class="tab-content" id="tab-content">--}}

                    {{--<manage-section :course="{{$course->id}}" :course_obj="{{$course->toJson()}}" inline-template>--}}


                        {{--<div v-cloak>--}}
                            {{--<div class="tab-content">--}}

                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-offset-6">--}}
                                    {{--<i v-show="loading" class="fa fa-spinner fa-spin big-font "></i>--}}

                                {{--</div>--}}
                                {{--<div class="col-md-10 col-md-offset-1">--}}

                                    {{--<span class="message">@{{ saveStatus }}</span>--}}

                                    {{--<div class="panel panel-card  clearfix" v-for="section, index in sections">--}}
                                        {{--<div class="panel-heading  ">--}}
                                            {{--<div class="row">--}}
                                                {{--<div class="col-md-9">--}}
                                                    {{--@{{ index+1 }}--}}
                                                    {{--: @{{ section.title }}--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-2">--}}
                                                    {{--<a class="btn btn-outlined"><i class="fa fa-plus p-5"></i>Add Lesson</a>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-1">--}}
                                                {{--<a class="btn btn-outlined"><i class="fa fa-caret-down p-5"></i> </a>--}}

                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<!-- Edit section -->--}}
                                            {{--<div class="clearfix">--}}
                                                {{--@include('frontend.author.course.Vue.forms._edit_section')--}}
                                            {{--</div>--}}


                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@include('author._course.vue.forms._create_section')--}}

                                {{--<div v-if="createLesson">--}}

                                    {{--<create-lesson :course="{{$course->id}}" inline-template--}}
                                                   {{--v-on:cancel-create-lesson="cancelLessonCreate">--}}
                                        {{--@include('author._course.vue.forms._create_lesson')--}}
                                    {{--</create-lesson>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-5 col-md-offset-1" v-if="!createLesson && !showCreate">--}}
                                    {{--<a href="#" v-if="!createLesson" @click.prevent="createLesson = !createLesson"--}}
                                       {{--class="btn btn-outlined col-lg-12 p-10"><i class="fa fa-plus p-5"></i>Add New--}}
                                        {{--Lesson</a>--}}

                                {{--</div>--}}
                                {{--<div class="col-md-5" v-if="!createLesson && !showCreate">--}}
                                    {{--<a href="#" v-if="!showCreate" @click.prevent="showCreate = !showCreate"--}}
                                       {{--class="btn btn-outlined col-lg-12 p-10"><i class="fa fa-plus p-5"></i>Add New--}}
                                        {{--Section</a>--}}

                                {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}


                    {{--</manage-section>--}}


                {{--</div>--}}



            </div>

        </div>


    </div>

@endsection
