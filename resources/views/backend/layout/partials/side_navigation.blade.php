<div class="sidebar"
     {{--data-image="assets/img/sidebar-5.jpg"--}}
>

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
 

    <div class="sidebar-wrapper" style="  box-shadow: 0 0 10px 5px #e7e7e7;
">
        <div class="logo">
            <a href="#" class="simple-text">
                Online Course
            </a>
        </div>

        <ul class="nav">
            <li >
                <a href="#">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::path() == 'Courses' ? 'active' : '' }}">
                <a href="{{route('Courses')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Courses</p>
                </a>

            </li>
            <!-- <li >
                <a href="#">
                    <i class="pe-7s-map-marker"></i>
                    <p>Location</p>
                </a>

            </li> -->
            <!-- <li >
                <a href="#">
                    <i class="pe-7s-info"></i>
                    <p>Business</p>
                </a>
            </li> -->
           <li class="">
                <a href="#">
                    <i class="pe-7s-users"></i>
                    <p>Access Management</p>
               </a>
               <ul class="nav child_menu">
                   <li><a href="index.html">Dashboard</a></li>
                   <li><a href="index2.html">Dashboard2</a></li>
               </ul>
            </li>

            <li >
                <a href="#">
                    <i class="pe-7s-timer"></i>
                    <p>Appearances</p>
                </a>
            </li>

        </ul>
    </div>
</div>
