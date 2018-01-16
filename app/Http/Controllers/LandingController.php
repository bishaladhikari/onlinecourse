<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        return view('landing')->with('categories',$categories);
    }
}
