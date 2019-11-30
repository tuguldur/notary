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
// Notary
Route::get("/confirm",'notaryConfirm@index');
Route::post("/confirm",'notaryConfirm@confirm');
// Admin get confirmations
Route::get("/request",'notaryConfirm@all');
Route::get("/request/delete",'notaryConfirm@delete');
Route::post("/request",'notaryConfirm@switch');
Route::get("/request/{id}",'notaryConfirm@find');
// contract
Route::get("/contract","contractController@index");
// create a contract
Route::get("/create/accreditation","contractController@accreditation");
Route::get("/create/loan","contractController@loan");
Route::post("/create/accreditation","contractController@save_accreditation");
Route::post("/create/loan","contractController@save_loan");
// delete a contract
Route::get("/delete/accreditation/{id}","contractController@delete_accreditation");

