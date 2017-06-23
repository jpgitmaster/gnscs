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

Auth::routes();

Route::get('{name?}', 'WebController@home')->where('name', 'home');
Route::get('about', 'WebController@about');
Route::get('services', 'WebController@services');
Route::get('contacts', 'WebController@contactus');

Route::prefix('careers')->group(function () {
	Route::get('/', 'WebController@careers');
    Route::get('resume_tpl', 'WebController@user_resume');
	Route::post('user_apply', 'UserController@userApply');
});

Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'AdminController@dashboard');
    Route::get('applicants', 'AdminController@applicants');
    Route::get('get_applicants', 'AdminController@get_applicants');
	Route::get('jobs', 'AdminController@jobs');
});