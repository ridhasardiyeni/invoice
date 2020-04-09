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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['middleware' =>'auth'], function(){
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('product','ProductController');
Route::resource('customer','CustomerController');
Route::resource('invoice','InvoiceController');
Route::get('/{id}/print', 'InvoiceController@generateInvoice')->name('invoice.print');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
