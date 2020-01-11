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
    return view('index');
});
Route::get('/cart/id/{id}', 'cartcontroller@store');
Route::get('/removeproductfromcart/id/{id}', 'cartcontroller@removeProduct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('product','Productcontroller');
Route::get('/carts', 'cartcontroller@fetchCartItems');
?>
