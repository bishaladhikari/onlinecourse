<?php

namespace App\Http\Controllers\Author;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
   public function uploadVideo(Request $request){
       $validator = Validator::make($request->all(), [
           'file' => 'max:500000',
       ]);
//       $file = $request->file('file');
//
//
//       $originalFileName = $file->getClientOriginalName();
//       $ext = $file->extension();
   }
    public function embedVideo(Request $request){


       Content::create([
           'lesson_id'=>$request->lesson_id,
           'video_src' => 'embed',
           'content_type' => 'video',
           'video_path' => $request->videoLink
       ]);

    }
}
