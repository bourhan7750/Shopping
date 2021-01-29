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

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin/item',
    'namespace' => 'Admin',
    'as' => 'admin.item.',
], function () {
    Route::get('/', 'ItemController@index')->name('index');
    Route::get('create/', 'ItemController@create')->name('create');
    Route::post('add/', 'ItemController@add')->name('add');
    Route::get('edit/{id}', 'ItemController@edit')->name('edit');
    Route::post('update/{id}', 'ItemController@update')->name('update');
});
