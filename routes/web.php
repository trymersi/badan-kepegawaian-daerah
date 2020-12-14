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
});