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
Route::resource('category','categoryController');

Route::resource('product','productController');
Auth::routes();
Route::get('admin','categoryController@index');

Route::post('change','productController@index');
Route::post('change1','productController@create');
Route::get('sort','productController@display');


Route::get('fry','HomeController@shop');

Route::get('/home', 'HomeController@index')->name('home');
