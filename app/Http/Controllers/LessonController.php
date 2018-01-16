<?php

namespace App\Http\Controllers;

use App\Content;
use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($course_slug, $index)
    {

        $course = Course::where('slug', $course_slug)->first();
        $currentLesson = Lesson::where('course_id', $course->id)->skip($index - 1)->first();

        $content = Content::where('lesson_id', $currentLesson->id)->first();
        $allLessons = Lesson::where('course_id', $course->id)->get();
        return view('lesson.show')->with('currentLesson', $currentLesson)
            ->with('course', $course)
            ->with('allLessons', $allLessons)
            ->with('content', $content);

    }
}
