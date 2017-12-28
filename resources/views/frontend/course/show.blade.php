@extends('layouts.app')

@section('content')
    <div class="container-fluid no-padding">
        <div class="col-sm-12" style="background:#00b1b3">

            <div style="margin: 100px">
                <label class="control-label" style="color:white;font-size: 50px">Author Dashboard</label>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{route('courses.store')}}">
                            <div class="form-group row">

                                <label for="name" class="control-label col-lg-2">Course title</label>


                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="title"
                                           placeholder="Course name or title"
                                           required/>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course subtitle</label>


                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="subtitle"
                                           placeholder="Course subtitle"
                                           required/>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Category</label>


                                <div class="col-lg-10">



                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Permalink/slug</label>
                                <div class="col-lg-10">

                                    <input type="text" class="form-control" name="slug"
                                           placeholder="permalink for your course"
                                           required/>

                                </div>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Description</label>
                                <div class="col-lg-10">

                                    <textarea rows="4" class="form-control" name="description"
                                              placeholder="small description of your course"></textarea>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="control-label col-lg-2">Course Tags</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="tags"
                                           placeholder=""/>
                                </div>
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-success pull-right">Create</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
