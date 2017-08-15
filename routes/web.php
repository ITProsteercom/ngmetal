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

use Illuminate\Support\Facades\Storage;

Route::get('/', 'AppController@index')->name('home');
Route::post('/', 'ApplicationsController@store');

Auth::routes();

Route::get('/admin', 'ApplicationsController@index')->name('applications.list')->middleware('auth');

Route::get('/admin/reasons', 'ReasonsController@index')->name('reasons.list');
Route::get('/admin/reasons/create', 'ReasonsController@create');
Route::post('/admin/reasons', 'ReasonsController@store');
Route::get('/admin/reasons/{reason}', 'ReasonsController@edit')->name('reasons.edit');
Route::patch('/admin/reasons/{reason}', 'ReasonsController@update');
Route::delete('/admin/reasons/delete/{id}', 'ReasonsController@destroy')->name('reasons.delete');