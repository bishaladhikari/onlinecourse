<?php

namespace App\Http\Controllers\admin;

use App\CourseCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function courses()
    {
        //
        $categories= CourseCategories::with('courses')->get();
        return view('admin.courses.courses')->with('categories',$categories);
    }
}
