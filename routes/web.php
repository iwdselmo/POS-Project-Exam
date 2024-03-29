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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('coupons', 'CouponController');
Route::resource('pos', 'OrderController');

Route::get('/check-code', 'OrderController@check');
