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

// Route::get('/', function () {
//     return view('welcome');
// });







Route::get('/', 'TestController@test_request');
Route::post('/pegawai/add', 'TestController@store');
Route::post('/pegawai/post_id', 'TestController@cek_kode');
Route::get('/pegawai/get', 'TestController@tampilData');

Route::get('/pegawai/view/{id}', 'TestController@view');
Route::get('/pegawai/edit/{id}', 'TestController@edit');
Route::post('/pegawai/update/{id}','TestController@update');
Route::get('/pegawai/hapus/{id}', 'TestController@hapus');





