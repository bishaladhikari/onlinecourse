<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


use Illuminate\Support\Facades\Route;

Auth::routes();
//
Route::get('/', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Frontend', 'middleware' => ['auth']], function () {
//    Route::get('courses', 'CourseController@index')->name('courses');
    Route::resource('courses', 'CourseController');

    Route::group(['prefix' => '/author/', 'namespace' => 'Author'], function () {
        Route::resource('courses'  ,'CourseController',["as"=>"author"]);
//
//        Route::resource('courses', 'CourseController', ['parameters' => [
//            'courses' => 'author_courses'
//        ]]);
//        Route::resource('courses', 'CourseController', ['parameters' => [
//            'courses' => 'admin_user'
//        ]]);
    });

});
Route::group(['prefix' => '/admin/', 'namespace' => 'Backend', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

    Route::group(['prefix' => '/access/', 'namespace' => 'Access'], function () {
        Route::resources(['user' => 'UserController']);
        Route::resources(['role' => 'RoleController']);

    });
    Route::group(['prefix' => '/courses/', 'namespace' => 'Courses'], function () {
        Route::resources(['category' => 'CategoryController']);
        Route::get('/', 'CourseController@index')->name('admin-courses');

    });
});
