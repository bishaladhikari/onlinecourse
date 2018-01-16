<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Course;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  $categories;
    private $destinationPath = 'img/uploads/';
    private $siteUrl="http://localhost:8000/img/uploads/";

    public function index()
    {

        $courses = Course::with('category')->where('user_id', Auth::id())->get();
        return view('author._course.index')->with('courses', $courses);

    }

    public function __construct()
    {
        $this->categories=Category::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //

        return view('author._course.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        //
//        $this->validate($request, [
//            'title' => 'required|max:50',
////            'subtitle' => 'required|max:120',
//            'category' => 'required',
////            'slug' => 'required|unique:courses,slug'
//        ]);

        $course = Course::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'user_id' => Auth::id(),
            'category_id' => $request->category,
            'price' => '0',
            'description' => $request->description,
        ]);
        $slug = Str::slug($request->slug);
        if (Course::where('slug', $slug)->first()) {
            $slug = Str::slug($slug) . '-' . $course->id;


        }
        Course::where('id', $course->id)->update(['slug' => $slug]);

        $request->session()->flash('status', 'Course Added');
        return redirect()->route('author.courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function info($slug)
    {
        $course = Course::where('slug', $slug)->with('category')->first();

        return view('author._course.info')->withCourse($course)
            ->withCategories($this->categories);

    }

    public function updateInfo(Request $request)
    {

         Course::where('id', $request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'user_id' => Auth::id(),
            'category_id' => $request->category,
            'price' => '0',
             'description' => $request->description,
             'level' => $request->level,
        ]);

        $slug = Str::slug($request->slug);
        if (Course::where('id','!=',$request->id)->where('slug', $slug)->first()) {
            $slug = Str::slug($slug) . '-' . $request->id;


        }
        Course::where('id', $request->id)->update(['slug' => $slug]);
        $course=Course::where('id',$request->id)->first();
        Session::flash('message', 'Your changes have been saved successfully.');
        return redirect()->route('author.course.manage.info',$slug)->withCourse($course)->withCategories($this->categories);

    }
    public function updateImage(Request $request){
        $fileName='';
        if ($request->hasFile('course-img')) {

            $extension = Input::file('course-img')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renaming image
            Input::file('course-img')->move($this->destinationPath, $fileName); // uploading file to given path
//            Image::make($this->destinationPath.$fileName)->resize(200, 200)->save($this->destinationPath.$fileName);
        }
        Course::where('slug',$request->course_slug)->update(['image'=>$this->destinationPath.$fileName]);
        return redirect()->route('author.course.manage.info',$request->course_slug);
    }

    public function goals($slug)
    {
        $course = Course::where('slug', $slug)->with('category')->first();
        return view('author._course.goals')->withCourse($course)
            ->withCategories($this->categories);

    }

    public function curriculum($slug)
    {
        $course = Course::where('slug', $slug)->with('category')->first();
        return view('author._course.curriculum')->withCourse($course)
            ->withCategories($this->categories);


    }
}
