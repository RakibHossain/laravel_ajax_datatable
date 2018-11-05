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

Route::group(['prefix'=>'/'], function() {
    Route::get('/','StudentController@index');
    Route::post('/store','StudentController@store');
    Route::post('/view','StudentController@view');
    Route::post('/edit','StudentController@edit');
    Route::post('/update','StudentController@update');
    Route::post('/delete','StudentController@delete');
    Route::get('/chart','StudentController@view_bar_chart');
});
