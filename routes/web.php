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

Route::get('/add', 'pagesController@addClass')->name('addClass');

Route::get('/remove', 'pagesController@removeClass')->name('removeClass');

Route::post('/submit', 'pagesController@postClasses')->name('submit');

Route::post('/calculateGrades', 'pagesController@calculateGrades')->name('calc');
