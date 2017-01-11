<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'student','middleware'=>['auth','student']], function () {
    Route::get('home','Student\HomeController@index');

    Route::get('activity/{id}/homework/{id2}','Student\ActivitiesController@show');
    Route::resource('activities','Student\ActivitiesController');
    Route::get('myteacher','Student\HomeController@myteacher');
    Route::get('information/{id}/edit','Student\HomeController@information');
    Route::patch('information/{id}',[
      'as'=>'edit.student',
      'uses'=> 'Student\HomeController@updateStudent',
    ]);
});

Route::group(['prefix' => 'teacher','middleware'=>['auth','teacher']], function () {
    Route::get('home','Teacher\HomeController@index');
    //Route::get('group/pdf/{id}','TestController@Makepdf');
    Route::get('group/{id}/pdf','Teacher\PdfsController@makepdf');
    Route::get('student/{id}/homeworks','Teacher\ActivitiesController@homeworks');//--------pendiente

    Route::get('group/{id_group}/activity/{id_activity}','Teacher\GroupsController@show_activity');

    Route::get('group/{id}/activities/{semester}','Teacher\GroupsController@show');
    Route::get('group/{id}/students','Teacher\GroupsController@showStudents');
    Route::get('groups','Teacher\GroupsController@index');

    Route::resource('activities','Teacher\ActivitiesController');

    Route::get('information/{id}/edit','Teacher\HomeController@informationTeacher');
    Route::patch('information/{id}',[
      'as'=>'edit.teacher',
      'uses'=> 'Teacher\HomeController@updateTeacher',
    ]);
    //Route::resourc('groups','Teacher\ActivitiesController');

});

Route::get('/home', 'HomeController@index');
