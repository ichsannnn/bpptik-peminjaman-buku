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

Route::get('/', 'DashboardController@if_index');
Route::get('order', 'DashboardController@if_createOrder');
Route::post('order', 'DashboardController@if_storeOrder');
Route::get('lihat-transaksi', 'DashboardController@if_viewOrder');
Route::get('transaksi', 'DashboardController@if_showOrder');
Route::get('transaksi/{kode}', 'DashboardController@if_fullOrder');



Route::get('login', 'Auth\LoginController@getLogin')->name('login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout');

Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'AdminController@if_index');
  Route::get('transaksi', 'AdminController@if_transaksi');

  Route::group(['prefix' => 'buku'], function() {
    Route::get('/', 'BookController@if_index');
    Route::get('tambah', 'BookController@if_create');
    Route::post('tambah', 'BookController@if_store');
    Route::get('ubah/{id}', 'BookController@if_edit');
    Route::post('ubah', 'BookController@if_update');
    Route::get('hapus/{id}', 'BookController@if_delete');
  });

  Route::group(['prefix' => 'transaksi'], function() {
    Route::get('/', 'OrderController@if_index');
    Route::get('{kode}', 'OrderController@if_viewOrder');
    Route::get('ubah/{id}', 'OrderController@if_editOrder');
    Route::post('ubah', 'OrderController@if_updateOrder');
    Route::get('hapus/{id}', 'OrderController@if_deleteOrder');
    Route::get('done/{id}', 'OrderController@if_doneOrder');
    Route::get('cancel/{id}', 'OrderController@if_cancelOrder');
  });
});
