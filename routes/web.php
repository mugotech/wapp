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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//user dashboard
Route::post('/home/update', 'HomeController@update')->name('home.update');//user post update
Route::get('/admin', 'AdminController@admin')->middleware('admin')->name('admin');//admin dasboard
Route::get('/admin/user/{id}', 'AdminController@user_view')->middleware('admin')->name('admin.user');//admin view of a specific user. Auto login to client profile
Route::post('/admin/post/{id}', 'AdminController@post')->middleware('admin')->name('admin.post');//admin post update
Route::get('/admin/delete/{id}', 'AdminController@delete')->middleware('admin')->name('admin.delete');//admin post update
