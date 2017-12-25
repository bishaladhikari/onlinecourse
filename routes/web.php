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

Auth::routes();
//
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/manage-categories', 'Backend\PageController@Courses')->name('manage-categories');
//Route::resources([
//    'category' => 'Backend\CategoryController',
//    'course' => 'Backend\CourseController'
//
//]);

Route::group(['prefix' => '/admin/', 'namespace' => 'Backend', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

    Route::group(['prefix' => '/access/', 'namespace' => 'Access'], function () {
        Route::resources(['user'=>'UserController']);
        Route::resources(['role'=>'RoleController']);

    });
    Route::group(['prefix' => '/courses/', 'namespace' => 'Courses'], function () {
        Route::resources(['category'=>'CategoryController']);
        Route::resources(['course'=>'CourseController']);

    });
});
