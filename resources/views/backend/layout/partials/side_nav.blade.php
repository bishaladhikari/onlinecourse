<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Side_useruser panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/img/avatar3.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        {{--<!-- search form -->--}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
                {{--<span class="input-group-btn">--}}
                                {{--<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
                            {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- /.search form -->--}}
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Access Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.index')}}"><i class="fa fa-angle-double-right"></i> User Management</a></li>
                    <li><a href="{{route('role.index')}}"><i class="fa fa-angle-double-right"></i> Role Management</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Course Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-angle-double-right"></i>Manage Categories</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> List courses</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Enviroment Variables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
