<?php

namespace App\Http\Controllers;

use App\CourseCategories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=CourseCategories::get();
        return view('home')->with('categories',$categories);
    }
}
