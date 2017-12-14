@extends('admin.layout.main')
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
                                        <a class="btn addCategoryBtn btn-blue" href="#" onclick="showAddCategoryInput()">Add
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
                                        <input type="text" class="form-control" placeholder="Search for courses" name="search" id="search"
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
            
            
         


                                    


        </div>
    </div>

    
    <script src="{{asset('admin_assets/js/courses.js')}}"></script>
@endsection

