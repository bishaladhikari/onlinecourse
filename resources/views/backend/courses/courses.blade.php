@extends('backend.layout.main')
@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle"
                            data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Courses</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="row ">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel card-default">
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-6 m-b-10">

                                    <small>
                                        <a class="btn addCategoryBtn btn-blue" href="#"
                                           onclick="showAddCategoryInput()">Add
                                            New Category</a>
                                    </small>


                                    <div class="input-group category-input" style="display: none">
                                        <input type="text" class="addCategoryInput form-control "
                                               placeholder="Add New Category" name="addNewCategory"
                                               style="border: solid 1px #35baf6;">
                                        <div class="input-group-btn" style="background: #35baf6;">

                                            <a class="submitCategoryBtn btn btn-default pull-left"
                                               style="color: white;border: solid 1px #35baf6;">ADD
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">

                                    <div class="input-group category-input">
                                        <input type="text" class="form-control" placeholder="Search for courses"
                                               name="search" id="search"
                                               style="border-top: solid 1px #35baf6;border-left: solid 1px #35baf6;border-bottom: solid 1px #35baf6;">
                                        <div class="input-group-btn">
                                            <a class="btn btn-default pull-left"
                                               style="border-top: solid 1px #6c9aed;border-right: solid 1px #6c9aed;border-bottom: solid 1px #6c9aed;">
                                                <i class="fa fa-search "></i></a>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @foreach($categories as $category)
                        <div class="panel card-default ">
                            <div class="panel-heading">
                                {{$category->name}}

                                <a class="pull-right "
                                   style="color: #ccc;vertical-align: middle;text-align: center;cursor: pointer"
                                   onclick="removeCategory(event,{{$category->id}})">

                                    <i class="fa fa-close"></i>
                                </a>
                                <a class="pull-right  m-r-5" data-toggle="modal"
                                   data-target="#editCategoryModal"
                                   style="color: #ccc;vertical-align: middle;text-align: center;cursor: pointer"
                                   onclick="editCategory(event,'{{$category->id}}','{{$category->name}}','{{$category->active}}')">

                                    <i class="fa fa-pencil "></i>
                                </a>

                            </div>
                            <div class="panel-body">
                                <div class="row course-box">
                                    <div class="col-md-4 ">
                                        <div class="panel course-card"  data-toggle="modal" data-target="#addCourseModal" >


                                            {{--<img src="{{asset('admin_assets/img/default_img.jpg')}}" style="height: 100px;width:100%">--}}


                                            <div class="panel-heading">

                                                <a >
                                                    <span class="fa circle-fa" aria-hidden="true">+</span>

                                                    {{----}}
                                                    <span>Add New Courses</span>
                                                </a>


                                            </div>

                                        </div>
                                    </div>

                                    @foreach($category->courses as $course)
                                        <div class="col-md-4 ">
                                            <div class="panel course-card "  style="padding: 0;">


                                                {{--<img src="{{asset('admin_assets/img/default_img.jpg')}}" style="height: 100px;width:100%">--}}
                                                <div class="panel-heading">
                   <span class="fa circle-fa" aria-hidden="true"> {{strtoupper(substr($course->name,0,1))}}</span>
                                                    {{$course->name}}
                                                    <a class="pull-right"
                                                       style="color: #cccccc;vertical-align: middle;text-align: center;padding-top: 8px;cursor: pointer"
                                                       onclick="removeService(event,'{{$course->id}}','{{$category->id}}')">

                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </div>

                                                {{--<div class="panel-body">--}}
                                                {{--{{$course->description}}--}}
                                                {{--</div>--}}

                                            </div>
                                        </div>
                                    @endforeach


                                </div>


                            </div>

                        </div>
                    @endforeach


                </div>
            </div>


        </div>

    </div>
    <!-- Modal -->
    <div class="modal " id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel"
         aria-hidden="true" style="top: 100px">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="addCourseModalLabel">Add New Courses</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="row form-group">
                            <div class="col-sm-3"><label class="control-label">Parent category</label></div>
                            <div class="col-sm-9">
                                <select class="form-control" name="cat_id" id="cat_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3"><label class="control-label">Course Title</label></div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter course name" id="title"
                                       name="title"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3"><label class="control-label">Course description</label></div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter description" id="description"
                                       name="description"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3"><label class="control-label">Upload Image</label></div>
                            <div class="col-sm-9">
                                <img id="courseImage" style="cursor:pointer;border-radius: 5px;object-fit: cover"
                                     src="{{asset('admin_assets/img/browse.jpg')}}" alt="Img"/>
                                <input type='file' id="pic" onchange="readURL(this);" class="form-control"
                                       name="pic"/>
                                <input type="hidden" id="course_image" name="course_image"/>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-success save-course-btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('Courses')}}"></script>
@endsection

