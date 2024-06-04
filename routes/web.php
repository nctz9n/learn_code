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
//User Routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();



//Admin Routes
Route::group(['middleware' => ['auth' ,'admin']], function () {
    Route::get('admin' ,function(){
        return redirect('admin/dashboard');
    });
    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('home');

	Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);
    Route::resource('admin/admins', 'App\Http\Controllers\Admin\AdminController', ['except' => ['show']]);
    Route::resource('admin/tracks', 'App\Http\Controllers\Admin\TrackController');


	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
});

