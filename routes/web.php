<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('/covid')->group(function () {

    Route::Post('/nextQuestion', 'CovidController@nextQuestion')->name("nextQuestion");

    Route::Post('/new_startQuestion', 'CovidController@new_startQuestion')->name("new_startQuestion");

    Route::Post('/preQuestion', 'CovidController@preQuestion')->name("preQuestion");

    Route::Post('/endQuestion', 'CovidController@endQuestion')->name("endQuestion");

    Route::Post('/patientProfile', 'CovidController@patientProfile');

    Route::get("/excel", "QuestionController@import");

    Route::Post('/selfManage', 'CovidController@selfManage');

    Route::Post('/patientProfile', 'CovidController@patientProfile');

    /*for test*/
    Route::get("/test/", "CovidController@test");
    Route::get("/test/{topicRecord}/{topic}", "CovidController@forward2Hosp");
});

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/topic', "TopicController@index")->name('topics.index');

    Route::get('/questions/{topic}', 'QuestionController@index')->name('questions.index');

    Route::Post("/insertQuestion", "QuestionController@store")->name('questions.insert');

    Route::Post("/updateQuestion", "QuestionController@update")->name('questions.update');

    Route::Post('/getQuestionContent', "QuestionController@getContent")->name('questions.getContent');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
