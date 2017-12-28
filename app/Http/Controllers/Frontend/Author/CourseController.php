<?php

namespace App\Http\Controllers\Frontend\Author;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses=Course::with('category')->where('user_id',Auth::id())->get();
        return view('frontend.author._course.index')->with('courses',$courses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //

        $categories=Category::all();
        return view('frontend.author._course.create')->with('categories',$categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:50',
//            'subtitle' => 'required|max:120',
            'category' => 'required',
//            'slug' => 'required|unique:courses,slug'
        ]);

        Course::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'user_id'=>Auth::id(),
            'category_id'=>$request->category,
            'slug'=>$request->slug,
            'price'=>'0',
            'description'=>$request->description,

        ]);
        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
