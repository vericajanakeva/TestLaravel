<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
//these are the routes i created for the application
Route::get('users/login', 'App\Http\Controllers\UsersController@login')->name('users.login');
Route::get('users/login1', 'App\Http\Controllers\UsersController@login1')->name('users.login1');
Route::post('users/login1', 'App\Http\Controllers\UsersController@login1')->name('users.login1');
Route::post('users/validate', 'App\Http\Controllers\UsersController@validatelogin')->name('users.validate');
Route::post('users/redirect', 'App\Http\Controllers\UsersController@validate_redirect')->name('users.validate1');
Route::get('users/authenticated', 'App\Http\Controllers\UsersController@authenticatedview')->name('users.authenticated');
Route::get('logout','App\Http\Controllers\UsersController@logout')->name('logout');
Route::post('users/result', 'App\Http\Controllers\UsersController@result')->name('users.result');
Route::post('users/{user}', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy');


Route::resource('users','App\Http\Controllers\UsersController');

