<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function courses()
    {

        $categories= Categories::with('Courses')->get();
        return view('backend.Courses.Courses')->with('categories',$categories);
    }

    public function dashboard()
    {

//        $categories= Categories::with('Courses')->get();
        return view('backend.dashboard');
    }
}
