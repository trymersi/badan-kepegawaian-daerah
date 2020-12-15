<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function(){
    
});

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'],function()
{
    Route::get('/', "Backend\DashboardController@index");

    Route::prefix('/bidang')->group(function(){
        Route::resource('/','Backend\BidangController');
        Route::get('/table','Backend\BidangController@table');
        Route::get('/edit/{id}','Backend\BidangController@edit');
        Route::patch('/update/{id}','Backend\BidangController@update');
        Route::delete('/delete/{id}','Backend\BidangController@destroy');
    });

    Route::prefix('/sub-bidang')->group(function(){
        Route::resource('/','Backend\SubBidangController');
        Route::get('/table','Backend\SubBidangController@table');
        Route::get('/edit/{id}','Backend\SubBidangController@edit');
        Route::patch('/update/{id}','Backend\SubBidangController@update');
        Route::delete('/delete/{id}','Backend\SubBidangController@destroy');
    });

    Route::prefix('/unduhan')->group(function(){
        Route::resource('/','Backend\UnduhController');
        Route::get('/table','Backend\UnduhController@table');
        Route::get('/edit/{id}','Backend\UnduhController@edit');
        Route::patch('/update/{id}','Backend\UnduhController@update');
        Route::delete('/delete/{id}','Backend\UnduhController@destroy');
    });

    Route::prefix('/link-terkait')->group(function(){
        Route::resource('/','Backend\LinkTerkaitController');
        Route::get('/table','Backend\LinkTerkaitController@table');
        Route::get('/edit/{id}','Backend\LinkTerkaitController@edit');
        Route::patch('/update/{id}','Backend\LinkTerkaitController@update');
        Route::delete('/delete/{id}','Backend\LinkTerkaitController@destroy');
    });

    Route::prefix('/aplikasi-terkait')->group(function(){
        Route::resource('/','Backend\AplikasiTerkaitController');
        Route::get('/table','Backend\AplikasiTerkaitController@table');
        Route::get('/edit/{id}','Backend\AplikasiTerkaitController@edit');
        Route::patch('/update/{id}','Backend\AplikasiTerkaitController@update');
        Route::delete('/delete/{id}','Backend\AplikasiTerkaitController@destroy');
    });

    Route::prefix('/kategori-berita')->group(function(){
        Route::resource('/','Backend\KategoriBeritaController');
        Route::get('/table','Backend\KategoriBeritaController@table');
        Route::get('/edit/{id}','Backend\KategoriBeritaController@edit');
        Route::patch('/update/{id}','Backend\KategoriBeritaController@update');
        Route::delete('/delete/{id}','Backend\KategoriBeritaController@destroy');
    });
});