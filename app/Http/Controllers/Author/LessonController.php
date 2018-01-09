<?php

namespace App\Http\Controllers\Author;

use App\Lesson;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons=Lesson::where('course_id',$request->course_id)->get();
        return response()->json($lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => 'required|max:500'
        ]);

        $maxSort = Lesson::where('course_id', $request->course_id)->max('sortOrder');

//        $maxSort = Lesson::where('course_id', $request->course_id)->orderBy('sortOrder', 'DESC')->first();
        $lesson=Lesson::create([
            'title'=>$request->title,
            'course_id'=>$request->course_id,
            'description'=>$request->description,
            'lesson_type'=>'lecture',
            'uid'=>random_int(100, 20000) + random_int(99, 2000),
            'preview'=>$request->has('preview')?true:false,
            'sortOrder'=>$maxSort+1,

        ]);


        return response()->json($lesson, 200);

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
        Lesson::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
//        $lesson = Lesson::find($id);
//        return response()->json($lesson, 200);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where('id',$id)->delete();
        return response()->json(['message' => 'Lesson deleted'], 200);

    }
}
