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

Route::get('/', 'pagesController@getIndex')->name('index')->middleware('checkClasses');

Route::get('/ChooseClasses', 'pagesController@getChooseClasses')->name('chooseClasses');

Route::get('/add', 'classesController@addClass')->name('addClass');

Route::get('/remove', 'classesController@removeClass')->name('removeClass');

Route::post('/submit', 'classesController@postClasses')->name('submit');

Route::post('/calculateGrades', 'gpaCalculationController@calculateGrades')->name('calc');

