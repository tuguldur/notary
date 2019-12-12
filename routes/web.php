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
    return redirect('/dashboard');
});
Auth::routes();
// нэвтэрсэн үед орох холбоосууд
Route::get('/dashboard', 'HomeController@index');
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
// маягт үүсгэх
Route::get("/create/accreditation","contractController@accreditation");
Route::get("/create/loan","contractController@loan");
Route::post("/create/accreditation","contractController@save_accreditation");
Route::post("/create/loan","contractController@save_loan");
// маягт устгах
Route::get("/delete/accreditation/{id}","contractController@delete_accreditation");
Route::get("/delete/loan/{id}","contractController@delete_loan");
// view 
Route::get("/view/accreditation/{id}","contractController@view_accreditation");
Route::get("/view/loan/{id}","contractController@view_loan");
// маягтын төлөв өөрчөх
Route::get('/status/accreditation/{id}','contractController@status_accreditation');
Route::get('/status/loan/{id}','contractController@status_loan');
// Маягтыг хэрэгэгчийн бүртгэлд хавсаргах
Route::post('/contract/accreditation/user','contractController@accreditation_user');
Route::post('/contract/loan/user','contractController@loan_user');
// Хайлт, шүүлт
Route::post('/contract/search','search@contract');
Route::post('/request/search','search@request');
Route::post('/user/search','search@user');
// Тайлан
Route::get('/report','report@index');
