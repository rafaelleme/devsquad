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

Route::get('/','HomeController@index');

Route::get('/product/{product}','ProductController@list');

// Routes Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('/','Admin\HomeController@index')->name('admin');

	Route::resource('products', 'ProductController');

	Route::post('products/upload','ProductController@upload')->name('product-upload');
	Route::post('products/upload-csv','ProductController@uploadCsv')->name('product-upload-csv');
});