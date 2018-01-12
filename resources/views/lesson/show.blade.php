<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/lesson.css')}}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="http://vjs.zencdn.net/6.6.0/video-js.css" rel="stylesheet">--}}

    {{--<!-- If you'd like to support IE8 -->--}}
    {{--<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>--}}

    {{--<!-- Scripts -->--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>--}}
    <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand" >
                    <a href="#">
                        {{$lessons->first()->course->title}}
                    </a>
                </li>
                @foreach($lessons as $index=>$lesson)
                    <li>
                        <div class="panel panel-card">
                            <div class="panel-body">
                                <b> <i class="fa fa-play-circle m-r-10"></i><span class="m-r-10">{{$index+1}} . </span>{{$lesson->title}}</b>
                            </div>
                        </div>
                    </li>

                @endforeach


            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->


        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">



                <div class="row">

                    <div class="col-lg-10 col-lg-offset-1">
                        {{--<preview-video></preview-video>--}}
                <video>
                    <source src="https://www.youtube.com/watch?v=GTWqwSNQCcg">
                </video>


                        <h1>Course Content appears here.</h1>
                        <p>Bacon ipsum dolor sit amet tri-tip shoulder tenderloin shankle. Bresaola tail pancetta ball tip
                            doner meatloaf corned beef. Kevin pastrami tri-tip prosciutto ham hock pork belly bacon pork
                            loin salami pork chop shank corned beef tenderloin meatball cow. Pork bresaola meatloaf tongue,
                            landjaeger tail andouille strip steak tenderloin sausage chicken tri-tip. Pastrami tri-tip
                            kielbasa sausage porchetta pig sirloin boudin rump meatball andouille chuck tenderloin biltong
                            shank </p>
                        <p>Pig meatloaf bresaola, spare ribs venison short loin rump pork loin drumstick jowl meatball
                            brisket. Landjaeger chicken fatback pork loin doner sirloin cow short ribs hamburger shoulder
                            salami pastrami. Pork swine beef ribs t-bone flank filet mignon, ground round tongue. Tri-tip
                            cow turducken shank beef shoulder bresaola tongue flank leberkas ball tip.</p>
                        <p>Filet mignon brisket pancetta fatback short ribs short loin prosciutto jowl turducken biltong
                            kevin pork chop pork beef ribs bresaola. Tongue beef ribs pastrami boudin. Chicken bresaola
                            kielbasa strip steak biltong. Corned beef pork loin cow pig short ribs boudin bacon pork belly
                            chicken andouille. Filet mignon flank turkey tongue. Turkey ball tip kielbasa pastrami flank
                            tri-tip t-bone kevin landjaeger capicola tail fatback pork loin beef jerky.</p>
                        <p>Chicken ham hock shankle, strip steak ground round meatball pork belly jowl pancetta sausage
                            spare ribs. Pork loin cow salami pork belly. Tri-tip pork loin sausage jerky prosciutto t-bone
                            bresaola frankfurter sirloin pork chop ribeye corned beef chuck. Short loin hamburger
                            tenderloin, landjaeger venison porchetta strip steak turducken pancetta beef cow leberkas
                            sausage beef ribs. Shoulder ham jerky kielbasa. Pig doner short loin pork chop. Short ribs
                            frankfurter rump meatloaf.</p>
                        <p>Filet mignon biltong chuck pork belly, corned beef ground round ribeye short loin rump swine.
                            Hamburger drumstick turkey, shank rump biltong pork loin jowl sausage chicken. Rump pork belly
                            fatback ball tip swine doner pig. Salami jerky cow, boudin pork chop sausage tongue andouille
                            turkey.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.4.1/Youtube.js"></script>--}}