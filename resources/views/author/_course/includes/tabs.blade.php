<ul class="nav nav-tabs">

    <li  class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/info' ? 'active' : ''  }}">

<a style="color: gray" href="info">

    {{--<span class="fa-stack fa-lg">--}}
      {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
      {{--<i class="fa fa-inverse fa-stack-1x">1</i>--}}

    {{--</span>--}}
    Basic Info
</a>

    </li>
    <li class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/goals' ? 'active' : ''  }}">

        <a style="color: gray" href="goals">

            Goals
        </a>
    </li>
    <li class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/curriculum' ? 'active' : ''  }}">
        <a style="color: gray" href="curriculum">


            Curriculum
        </a>
    </li>
    <li class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/announcements' ? 'active' : ''  }}">
        <a style="color: gray" href="announcement">Announcements</a>
    </li>
    <li class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/message' ? 'active' : ''  }}">
        <a style="color: gray" href="message">Welcome Message</a>
    </li>
    <li class="{{ Request::path() == 'author/courses/'.$course->slug.'/manage/admin-review' ? 'active' : ''  }}">
        <a style="color: gray" href="message">Admin Review</a>
    </li>
</ul>
