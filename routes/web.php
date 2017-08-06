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
    return view('index');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/admin/reasons', 'ReasonsController@index');
Route::get('/admin/reasons/create', 'ReasonsController@create');
Route::post('/admin/reasons', 'ReasonsController@store');
Route::get('/admin/reasons/{reason}', array('uses' => 'ReasonsController@edit', 'as' => 'reasons.edit'));
Route::patch('/admin/reasons/{reason}', 'ReasonsController@update');
Route::delete('/admin/reasons/delete/{id}',array('uses' => 'ReasonsController@destroy', 'as' => 'reasons.delete'));