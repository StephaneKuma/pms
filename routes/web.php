<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'salesman', 'namesapce' => 'Salesman', 'middleware' => ['auth', 'salesman'], 'as' => 'salesman.'], function () {

});

Route::group(['prefix' => 'manager', 'namesapce' => 'Manager', 'middleware' => ['auth', 'manager'], 'as' => 'manager.'], function () {

});

Route::group(['prefix' => 'admin', 'namesapce' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {

});
