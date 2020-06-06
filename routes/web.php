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

Route::group(['prefix' => 'salesman', 'namespace' => 'Salesman', 'middleware' => ['auth', 'salesman'], 'as' => 'salesman.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('pos', 'PosController@index')->name('pos');

    // Drug Form
    Route::get('drug/form/create', 'DrugFormController@create')->name('drugs.forms.create');
    Route::post('drug/form/create', 'DrugFormController@store')->name('drugs.forms.store');
    Route::get('drug/form/{id}', 'DrugFormController@show')->name('drugs.forms.show');
    Route::get('drug/form/{id}/edit', 'DrugFormController@edit')->name('drugs.forms.edit');
    Route::post('drug/form/{id}/edit', 'DrugFormController@update')->name('drugs.forms.update');
    Route::delete('drug/form/{id}/delete', 'DrugFormController@update')->name('drugs.forms.destroy');
    Route::get('drug/forms', 'DrugFormController@index')->name('drugs.forms.index');

    // Drug
    Route::get('drug/create', 'DrugController@create')->name('drugs.create');
    Route::post('drug/create', 'DrugController@store')->name('drugs.store');
    Route::get('drug/{id}', 'DrugController@show')->name('drugs.show');
    Route::get('drug/{id}/edit', 'DrugController@edit')->name('drugs.edit');
    Route::post('drug/{id}/edit', 'DrugController@update')->name('drugs.update');
    Route::get('drug/{id}/delete', 'DrugController@destroy')->name('drugs.destroy');
    Route::get('drugs', 'DrugController@index')->name('drugs.index');
});

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => ['auth', 'manager'], 'as' => 'manager.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
