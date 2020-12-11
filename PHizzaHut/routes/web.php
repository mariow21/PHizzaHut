<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//untuk redirect ke home
Route::get('/', 'PizzaController@index')
->name('home');
Route::get('/search', 'PizzaController@show6')
->name('search');

//untuk redirect ke all user pada admin
Route::get('/au', 'PizzaController@index1')
->name('au');

Route::get('/history','PizzaController@index2')
->name('history');

Route::get('/tdetail/{menu}','PizzaController@index3')
->name('tdetail');

Route::get('/vaut','PizzaController@index4')
->name('vaut');

//untuk redirect ke guest
Route::get('/detail/{menu}','PizzaController@show')
->name('detail');

//untuk redirect ke detail admin
Route::get('/detaila/{menu}','PizzaController@show1')
->name('detaila');

//untuk redirect ke detail admin dan memasukan data ke table cart
Route::get('/detailm','PizzaController@create2')
->name('detailm');
Route::post('/detailm/{menu}', 'PizzaController@store2')
->name('detailm');
Route::get('/detailm/{menu}','PizzaController@show2')
->name('detailm');

//untuk redirect ke cart
// Route::get('/cart','PizzaController@show5')
// ->name('cart');
Route::get('/cart','PizzaController@edit1')
->name('cart');
Route::patch('/cart/{menu}','PizzaController@update1');
Route::delete('/cart/{menu}', 'PizzaController@destroy1');
Route::post('/passingTransaction','PizzaController@passingTransaction')
->name('passingTransaction');


//untuk redirect ke add pizza dan menyimpan data ke add pizza
Route::get('/apizza', 'PizzaController@create')
->name('apizza');
Route::post('/apizza', 'PizzaController@store');

//untuk redirect ke delete page dan menghapus datanya
Route::get('/delete/{menu}', 'PizzaController@show3')
->name('delete');
Route::delete('/delete/{menu}', 'PizzaController@destroy');

// mengedit table pizza
Route::get('/epizza/{menu}', 'PizzaController@edit')
->name('epizza');
Route::patch('/epizza/{menu}', 'PizzaController@update');





