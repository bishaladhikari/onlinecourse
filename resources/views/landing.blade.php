@extends('layouts.app')

@section('content')
    <style>
        body{
            background: white;
        }
        .btn{
            padding:8px;
        }
    </style>
<div class="container">
    <div class="col-md-10 col-md-offset-1 m-t-40">
        <h1 data-wow-duration="2s" class="title is-1 wow fadeIn" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
            Ready to Dive Into an <strong>Interesting</strong> Learning Platform?

        </h1>

        <p class="message text-center">An opportunity to grow your skills</p>
        <div class="text-center" style="padding:10px;">
            <a href="#" class="btn bg-theme2 m-r-10">GET STARTED</a>
            <a href="#" class="btn btn-outlined">BROWSE NOW</a>

        </div>

    </div>
</div>
@endsection
