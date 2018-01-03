<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/_user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix'=>'author', 'namespace' => 'Author'],function (){
    Route::get('{course_id}/sections','SectionController@getSections');
    Route::post('section','SectionController@store');
});