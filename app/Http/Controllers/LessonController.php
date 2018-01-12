<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($course_slug,$id){
        $course=Course::where('slug',$course_slug)->first();
        $lessons=Lesson::where('course_id',$course->id)->with('course')->get();
//        dd($lessons);
        return view('lesson.show')->with('lessons',$lessons);
    }
}
