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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'api/v1'], function (){

    Route::get('lessons/{id}/tags', 'LessonsApi\TagsController@index');

    Route::resource('lessons', 'LessonsApi\LessonsController');

    Route::resource('tags', 'LessonsApi\TagsController', ['only' => [
                        'index', 'show'
                    ]]);


    // Route::resource('lessons.tags', 'LessonTagsController');
});

Auth::routes();

