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


//use Illuminate\Support\Facades\Route;

//use Illuminate\Routing\Route;

Auth::routes();
//
Route::get('/', 'HomeController@index')->name('home');
Route::get('/landing', 'LandingController@index');
Route::group([ 'middleware' => ['auth']], function () {
//    Route::resource('courses', 'CourseController', ['except' => ['show']]);
    Route::resource('courses', 'CourseController');
    Route::get('courses/{course_slug}/lesson/{sort_id}', 'LessonController@show')->name('lesson.show');

//    Route::get('courses/{slug}/{course_id}','CourseController@show')->name("courses.show");
    Route::group(['prefix' => '/author/', 'namespace' => 'Author'], function () {
        Route::resource('courses', 'CourseController', ["as" => "author"]);
        Route::group(['prefix' => '/courses/{slug}/manage/'], function () {
            Route::get('info','CourseController@info')->name('author.course.manage.info');
            Route::post('info/update','CourseController@updateInfo');
            Route::post('info/updateImage', 'CourseController@updateImage');


            Route::get('goals','CourseController@goals');
            Route::get('curriculum','CourseController@curriculum');
            Route::get('announcement','CourseController@announcement');

//            Route::get('goals','CourseController@goals')->name('goals');
//            Route::get('curriculum','CourseController@curriculum');

        });
//    Route::get('courses/{slug}/manage','CourseController@manage')->name('course.manage');


    });

});
Route::group(['prefix' => '/admin/', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {return view('admin.dashboard.index');})->name('dashboard');
    Route::group(['prefix' => '/access/', 'namespace' => 'Access'], function () {
        Route::resources([
            'user' => 'UserController',
            'role' => 'RoleController']);

    });
    Route::group(['prefix' => '/courses/', 'namespace' => 'Courses'], function () {
        Route::resource('category', 'CategoryController');
        Route::get('/', 'CourseController@index')->name('admin-courses');

    });
});
