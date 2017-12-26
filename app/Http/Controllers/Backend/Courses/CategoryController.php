<?php

namespace App\Http\Controllers\Backend\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
//        $categories= Categories::get();

        return view('backend.courses._category.index')
            ->with('categories',Categories::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses._category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        //
//        $request->validate([
//
//            'category_name' => 'required|max:50',
//
//        ]);
        
       $category= Categories::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('category.index');

//       return view('backend.Courses.ajax-course-category')->with('category',$category);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category=Categories::where('id',$id)->first();
        return view('backend.courses._category.edit')->with('category',$category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {


        Categories::where('id',$id)->update([
            'name'=>$request->name
        ]);
//        Session::flash('message', 'Successfully updated category!');
        return redirect()->route('category.index');


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
