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
Route::get('/Kategori/index', 'KategoriController@index')->name('Kategori');
Route::get('/Produk/index', 'ProdukController@index')->name('Produk');
Route::get('/Produk/create', 'ProdukController@create')->name('Tambah');