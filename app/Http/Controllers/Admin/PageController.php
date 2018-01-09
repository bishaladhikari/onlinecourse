<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function courses()
    {

        $categories= Category::with('Courses')->get();
        return view('backend.Courses.Courses')->with('categories',$categories);
    }

    public function dashboard()
    {

//        $categories= Category::with('Courses')->get();
        return view('admin.dashboard');
    }
}
