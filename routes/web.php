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

Route::get('/Home', 'HomeController@index');
Route::get('/Home/{name}', 'HomeController@show');
Route::post('/Kategori/store','KategoriController@store')->name('KategoriStore');
Route::delete('/Kategori/destroy/{id}', 'KategoriController@destroy')->name('KategoriDelete');
Route::get('/Kategori/index', 'KategoriController@index')->name('Kategori');

Route::get('/Produk/index', 'ProdukController@index')->name('Produk');
Route::get('/Produk/create', 'ProdukController@create')->name('Tambah');
Route::post('/Produk/store', 'ProdukController@store')->name('ProdukStore');
Route::delete('/Produk/destroy/{id}', 'ProdukController@destroy')->name('ProdukDelete');
Route::get('/Produk/edit/{id}', 'ProdukController@edit')->name('ProdukEdit');
Route::put('/Produk/update/{id}', 'ProdukController@update')->name('ProdukUpdate');

