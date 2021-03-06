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

use Intervention\Image\Image;

Route::get('/', 'AppController@index')->name('home');
Route::post('/', 'ApplicationsController@store');

Auth::routes();

Route::get('/admin', 'ApplicationsController@index')->name('applications.list')->middleware('auth');
Route::delete('/admin/applications/delete/{id}', 'ApplicationsController@destroy')->name('applications.delete');

Route::get('/admin/reasons', 'ReasonsController@index')->name('reasons.list');
Route::get('/admin/reasons/create', 'ReasonsController@create');
Route::post('/admin/reasons', 'ReasonsController@store');
Route::get('/admin/reasons/{reason}', 'ReasonsController@edit')->name('reasons.edit');
Route::patch('/admin/reasons/{reason}', 'ReasonsController@update');
Route::delete('/admin/reasons/delete/{id}', 'ReasonsController@destroy')->name('reasons.delete');

Route::get('/admin/settings', 'SettingsController@index')->name('admin.settings');
Route::patch('/admin/settings/{id}', 'SettingsController@update')->name('admin.settings.update');

Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});
Route::post('/fileupload', 'PhotoController@store');
Route::post('/fileremove/{id}', 'PhotoController@destroy');

