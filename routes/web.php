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


Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|supporter|subscriber')->group(function() {
    Route::get('/', 'ManageController@index')->name('manage.index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    
    Route::resource('/user', 'UserController');
    Route::resource('/permission', 'PermissionController', ['except' => 'destroy']);
    Route::resource('/role', 'RoleController', ['except' => 'destroy']);
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoriesController');

    Route::post('ckeditor/image_upload', 'CkeditorController@upload')->name('upload');
});


Route::get('/home', 'HomeController@index')->name('home');