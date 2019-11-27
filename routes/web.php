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
// нэвтэрсэн үед орох холбоосууд
Route::get('/dashboard', 'HomeController@index')->name('home');
// profile view, update [admin, client, notary]
Route::get('/profile', 'Profile@index');
Route::post('/profile', 'Profile@update');
// Admin user routes
Route::get('/user', 'adminUsers@index');
Route::get('/user/{id}','adminUsers@find');
Route::get('/user/delete/{id}','adminUsers@delete');
Route::post('/user/check/email','adminUsers@check_email');
Route::post('/user/check/registration_number','adminUsers@check_registration_number');

Route::post('/user/add','adminUsers@add');