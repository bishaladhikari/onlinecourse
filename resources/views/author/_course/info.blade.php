@extends('layouts.app')

@section('content')
    @include('author._course.includes.banner')
    @include('author._course.includes.author-nav')
    <div class="container m-t-10 ">

        <div class="row course-management">
            <div class="col-md-8">
                <h4>Course Management</h4>

            </div>
            <div class="col-md-4">
                <a href="{{route('courses.show',$course->slug)}}" class="pull-right" style="text-decoration: none"
                   target="_blank"><h4><i class="fa fa-eye p-5"></i> Preview this course</h4></a>

            </div>
        </div>
        <div class="row">
            @include('author._course.includes.tabs')
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content p-10" id="tab-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Course Info</h3>
                                <p>This is something your student see when they find your course.</p>
                            </div>
                            <div class="col-md-4">


                            </div>
                        </div>

                        <form class="form-horizontal" role="form" method="POST"
                              action="info/update">
                            <input type="hidden" name="id" value="{{$course->id}}">
                            <div class="form-group row">

                                <label for="name" class="control-label col-lg-2">Course title</label>


                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="title"
                                           placeholder="Course name or title" id="title" value="{{$course->title}}"
                                           required/>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course subtitle</label>


                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="subtitle" id="subtitle"
                                           placeholder="Course subtitle" value="{{$course->subtitle}}"
                                    />

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Category</label>
                                <div class="col-md-8">

                                </div>

                                <div class="col-lg-10">

                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option {{$course->category->name==$category->name?
                                          'selected' :""}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Description</label>
                                <div class="col-lg-10">

                                    <textarea rows="4" class="form-control" name="description"
                                              placeholder="small description of your course">{{$course->description}}
                                    </textarea>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Permalink/slug</label>
                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="slug" id="slug"
                                           placeholder="permalink for your course" value="{{$course->slug}}"
                                           required/>
                                    <small class="p-5 slug-message" style="visibility: hidden">Please keep in mind that
                                        changing slug may make your previous sharing unuseful. Unless you are absolutely
                                        sure we recommend you not to make any changes.
                                    </small>

                                </div>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Tags</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="tags"
                                           placeholder=""/>
                                </div>
                                <label class="control-label col-lg-2">Course Level</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="level">
                                        <option {{$course->level=='all'?
                                          'selected' :""}} value="all">All
                                        </option>
                                        <option {{$course->level=='beginner'?
                                          'selected' :""}} value="beginner">Beginner
                                        </option>
                                        <option {{$course->level=='intermediate'?
                                          'selected' :""}} value="intermediate">Intermediate
                                        </option>
                                        <option {{$course->level=='advanced'?
                                          'selected' :""}} value="advanced">Advanced
                                        </option>
                                    </select>
                                </div>
                            </div>


                            {{csrf_field()}}
                            {{--{{ method_field('PATCH') }}--}}
                            <button type="submit" class="btn theme-btn pull-right">Update Basic Info</button>
                        </form>
                        <br>

                        {{--course image--}}

                        <div class="row m-t-40">
                            <form id="logo-form" action="info/updateImage" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="course_slug" value="{{$course->slug}}">
                                <h4>Course Image</h4>


                                <div class="col-xs-4 course-card">
                                    <img src="{{$course->image? asset($course->image):'http://via.placeholder.com/400x200'}}" class="img-responsive course-img">
                                    <div class="text" onclick="$('.course-img').click()"><i class="fa fa-upload m-r-10"></i>Upload Image</div>
                                    <input class="course-img" type="file" style="display:none" name="course-img" onchange="logoReadURL(this)">
                                    <div>
                                        <a class="btn theme-btn logo-save-btn" onclick="$('#logo-form').submit()"><i
                                                    class="fa fa-check"></i> Save Logo</a>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <label class="control-label">Image Specifications</label><br>
                                    <p>Provide image that will stand out among the courses.<br>
                                        Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif, or .png.
                                    </p>
                                </div>
                            </form>

                        </div>

                    </div>


                </div>

            </div>
        </div>



    </div>
    <script>
        function logoReadURL(input,course_id) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('.course-img')
                        .attr('src', e.target.result);

                    $('.logo-save-btn').attr('style', 'visibility:visible');
//                    $('.text').attr('style', 'visibility:hidden');

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let slug = $('#slug');
            slug.on('focus', function () {
                $('.slug-message').attr('style', 'visibility:visible;background: #fe7886;color:white;');
            });
//            slug.on('focusout',function () {
//                $('.slug-message').attr('style','visibility:hidden');
//            });

        });
    </script>
@endsection

