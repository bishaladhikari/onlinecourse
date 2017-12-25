<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Online course</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="{{asset('admin_assets')}}" rel="stylesheet"/>--}}

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{asset('admin_assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('admin_assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('admin_assets/css/demo.css')}}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('admin_assets/css/toggle.css')}}" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('admin_assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin_assets/css/select2.min.css')}}">
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

    {{--<link rel="stylesheet" href="{{asset('admin_assets/Searchable-FontAwesome-Icon-Picker-jQuery-Simple-Iconpicker/font-awesome.css')}}"/>--}}
    <link rel="stylesheet" href="{{asset('admin_assets/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.css')}}"/>

    <script type="text/javascript" src="{{asset('admin_assets/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js')}}"></script>


{{--@yield('page-css)--}}
<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
@include('backend.layout.partials.side_navigation')

<div class="container-fluid" style="padding: 0; height: 100vh">
    @yield('content')


</div>
{{--<div class="replace"></div>--}}

</body>


{{--<script>--}}

    {{--$(document).ready(function () {--}}
        {{--var md = window.markdownit(); // get a markdown instance--}}



        {{--$('.inputfont').keyup(function () {--}}
            {{--var print=$(this).val();--}}

{{--//            var html = md.render(print); // parse the markdown into html--}}
            {{--;--}}
            {{--$('.live-preview').append(print);--}}
        {{--});--}}


    {{--});--}}
{{--</script>--}}

{{--<script type="text/javascript"--}}
        {{--src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/4.4.0/markdown---}}
{{--it.min.js"></script>--}}
{{--@yield('page-scripts')--}}
<!--   Core JS Files   -->
{{--<script src="{{asset('restaurant_assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('restaurant_assets/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}

{{--<!--  Checkbox, Radio & Switch Plugins -->--}}
{{--<script src="{{asset('restaurant_assets/js/bootstrap-checkbox-radio-switch.js')}}"></script>--}}

{{--<!--  Charts Plugin -->--}}
{{--<script src="{{asset('restaurant_assets/js/chartist.min.js')}}"></script>--}}

{{--<!--  Notifications Plugin    -->--}}
{{--<script src="{{asset('restaurant_assets/js/bootstrap-notify.js')}}"></script>--}}

<!--  Google Maps Plugin    -->
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('admin_assets/js/light-bootstrap-dashboard.js')}}"></script>
@yield('page-script')

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
{{--<script src="{{asset('restaurant_assets/js/demo.js')}}"></script>--}}
{{--<script src="{{asset('restaurant_assets/js/select2.min.js')}}"></script>--}}
<script>
    $(function () {
        $('div.alert').delay(3000).slideUp(300);
    });

</script>
</html>
