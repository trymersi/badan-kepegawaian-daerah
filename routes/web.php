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
    Route::prefix('/kontak')->group(function(){
        Route::get('/', "Frontend\HomeController@kontak");
        Route::post('/','Frontend\HomeController@contactSave');
    });

    Route::prefix('/konsultasi')->group(function(){
        Route::get('/', "Frontend\HomeController@konsultasi");
        Route::post('/','Frontend\HomeController@konsultasiSave');
    });

    Route::prefix('/indeks-kepuasan-masyarakat')->group(function(){
        Route::get('/', "Frontend\HomeController@ikmIndex");
        Route::post('/','Frontend\HomeController@ikmSave');
    });
    
    Route::get('/', "Frontend\HomeController@index");   
    Route::get('/berita', "Frontend\HomeController@berita");

    Route::get('/berita/{id}', "Frontend\HomeController@detailBerita");
    
    Route::get('/kategori-berita/{id}', "Frontend\HomeController@kategoriBerita");
    Route::get('/profil/{id}', "Frontend\HomeController@profil");
    Route::get('/galeri', "Frontend\HomeController@galeri");
    Route::get('/galeri-video', "Frontend\HomeController@galeriVideo");   
    Route::get('/galeri/{id}', "Frontend\HomeController@galeriDetail");   
    Route::get('/unduhan', "Frontend\HomeController@unduhan");
    Route::get('/peraturan/{id}', "Frontend\HomeController@peraturan");
    Route::get('/pelayanan/{id}', "Frontend\HomeController@pelayanan");
    Route::get('/unduhan/{id}', "Frontend\HomeController@unduhanDetail");
    Route::get('/unduhan/table/{id}','Frontend\HomeController@tableUnduhan');
    Route::get('/peraturan/table/{id}','Frontend\HomeController@tablePeraturan');
    Route::get('/bidang/{id}', "Frontend\HomeController@detailBidang"); 
    Route::get('/faq', "Frontend\HomeController@faq"); 
    Route::get('/pegawai', "Frontend\HomeController@pegawai"); 
    Route::get('/pegawai/{id}', "Frontend\HomeController@pegawaiDetail"); 
    Route::get('/pencarian-berita', ['as' => 'pencarian', 'uses' => 'Frontend\HomeController@pencarianBerita']);
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
        Route::get('/list-sub-bidang/{id_bidang}','Backend\SubBidangController@listSubBidang');
        
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

    Route::prefix('/berita')->group(function(){
        Route::resource('/','Backend\BeritaController');
        Route::get('/table','Backend\BeritaController@table');
        Route::get('/list','Backend\BeritaController@getUpdate');
        Route::get('/edit/{id}','Backend\BeritaController@edit');
        Route::patch('/update/{id}','Backend\BeritaController@update');
        Route::delete('/delete/{id}','Backend\BeritaController@destroy');
        Route::get('/table-file/{id}','Backend\BeritaController@tableFile');
    });

    Route::prefix('/tupoksi')->group(function(){
        Route::resource('/','Backend\TupoksiController');
        Route::get('/table','Backend\TupoksiController@table');
        Route::get('/edit/{id}','Backend\TupoksiController@edit');
        Route::patch('/update/{id}','Backend\TupoksiController@update');
        Route::delete('/delete/{id}','Backend\TupoksiController@destroy');
    });

    Route::prefix('/pegawai')->group(function(){
        Route::resource('/','Backend\PegawaiController');
        Route::get('/table','Backend\PegawaiController@table');
        Route::get('/edit/{id}','Backend\PegawaiController@edit');
        Route::patch('/update/{id}','Backend\PegawaiController@update');
        Route::delete('/delete/{id}','Backend\PegawaiController@destroy');
    });

    Route::prefix('/galeri-video')->group(function(){
        Route::resource('/','Backend\GaleriVideoController');
        Route::get('/table','Backend\GaleriVideoController@table');
        Route::get('/edit/{id}','Backend\GaleriVideoController@edit');
        Route::patch('/update/{id}','Backend\GaleriVideoController@update');
        Route::delete('/delete/{id}','Backend\GaleriVideoController@destroy');
    });

    Route::prefix('/faq')->group(function(){
        Route::resource('/','Backend\FaqController');
        Route::get('/table','Backend\FaqController@table');
        Route::get('/edit/{id}','Backend\FaqController@edit');
        Route::patch('/update/{id}','Backend\FaqController@update');
        Route::delete('/delete/{id}','Backend\FaqController@destroy');
    });

    Route::prefix('/pertanyaan')->group(function(){
        Route::resource('/','Backend\PertanyaanController');
        Route::get('/table','Backend\PertanyaanController@table');
        Route::get('/edit/{id}','Backend\PertanyaanController@edit');
        Route::patch('/update/{id}','Backend\PertanyaanController@update');
        Route::delete('/delete/{id}','Backend\PertanyaanController@destroy');
        
    });


    Route::prefix('/konsultasi')->group(function(){
        Route::resource('/','Backend\KonsultasiController');
        Route::get('/table','Backend\KonsultasiController@table');
        Route::get('/edit/{id}','Backend\KonsultasiController@edit');
        Route::patch('/update/{id}','Backend\KonsultasiController@update');
        Route::delete('/delete/{id}','Backend\KonsultasiController@destroy');
        Route::get('/cetak/{id}','Backend\KonsultasiController@cetak');
    });

    Route::prefix('/profil')->group(function(){
        Route::resource('/','Backend\ProfilController');
        Route::get('/table','Backend\ProfilController@table');
        Route::get('/edit/{id}','Backend\ProfilController@edit');
        Route::patch('/update/{id}','Backend\ProfilController@update');
        Route::delete('/delete/{id}','Backend\ProfilController@destroy');
    });

    Route::prefix('/pengaturan')->group(function(){
        Route::resource('/','Backend\PengaturanController');
        Route::get('/table','Backend\PengaturanController@table');
        Route::get('/edit/{id}','Backend\PengaturanController@edit');
        Route::patch('/update/{id}','Backend\PengaturanController@update');
        Route::delete('/delete/{id}','Backend\PengaturanController@destroy');
    });

    Route::prefix('/level-user')->group(function(){
        Route::resource('/','Backend\LevelUserController');
        Route::get('/table','Backend\LevelUserController@table');
        Route::get('/edit/{id}','Backend\LevelUserController@edit');
        Route::patch('/update/{id}','Backend\LevelUserController@update');
        Route::delete('/delete/{id}','Backend\LevelUserController@destroy');
    });

    Route::prefix('/user')->group(function(){
        Route::resource('/','Backend\UserController');
        Route::get('/table','Backend\UserController@table');
        Route::get('/edit/{id}','Backend\UserController@edit');
        Route::patch('/update/{id}','Backend\UserController@update');
        Route::delete('/delete/{id}','Backend\UserController@destroy');
    });

    Route::prefix('/galeri-gambar')->group(function(){
        Route::resource('/','Backend\GaleriGambarController');
        Route::get('/table','Backend\GaleriGambarController@table');
        Route::get('/edit/{id}','Backend\GaleriGambarController@edit');
        Route::patch('/update/{id}','Backend\GaleriGambarController@update');
        Route::delete('/delete/{id}','Backend\GaleriGambarController@destroy');
        Route::prefix('/detail')->group(function(){
            Route::get('/{id}','Backend\GaleriGambarController@detail');
            Route::get('/create/{id}','Backend\GaleriGambarController@detailCreate');
            Route::post('/store','Backend\GaleriGambarController@detailStore');
            Route::get('/table/{id}','Backend\GaleriGambarController@detailTable');
            Route::delete('/delete/{id}','Backend\GaleriGambarController@detailDestroy');
        });
    });

    Route::prefix('/kontak')->group(function(){
        Route::resource('/','Backend\KontakController');
        Route::get('/table','Backend\KontakController@table');
        Route::get('/edit/{id}','Backend\KontakController@edit');
    });

    Route::prefix('/slider')->group(function(){
        Route::resource('/','Backend\SliderController');
        Route::get('/table','Backend\SliderController@table');
        Route::get('/edit/{id}','Backend\SliderController@edit');
        Route::patch('/update/{id}','Backend\SliderController@update');
        Route::delete('/delete/{id}','Backend\SliderController@destroy');
    });

    Route::prefix('/kategori-unduhan')->group(function(){
        Route::resource('/','Backend\KategoriUnduhController');
        Route::get('/table','Backend\KategoriUnduhController@table');
        Route::get('/edit/{id}','Backend\KategoriUnduhController@edit');
        Route::patch('/update/{id}','Backend\KategoriUnduhController@update');
        Route::delete('/delete/{id}','Backend\KategoriUnduhController@destroy');
    });

    Route::prefix('/kategori-peraturan')->group(function(){
        Route::resource('/','Backend\KategoriPeraturanController');
        Route::get('/table','Backend\KategoriPeraturanController@table');
        Route::get('/edit/{id}','Backend\KategoriPeraturanController@edit');
        Route::patch('/update/{id}','Backend\KategoriPeraturanController@update');
        Route::delete('/delete/{id}','Backend\KategoriPeraturanController@destroy');
    });

    Route::prefix('/peraturan')->group(function(){
        Route::resource('/','Backend\PeraturanController');
        Route::get('/table','Backend\PeraturanController@table');
        Route::get('/edit/{id}','Backend\PeraturanController@edit');
        Route::patch('/update/{id}','Backend\PeraturanController@update');
        Route::delete('/delete/{id}','Backend\PeraturanController@destroy');
    });

    Route::prefix('/kategori-pelayanan')->group(function(){
        Route::resource('/','Backend\KategoriPelayananController');
        Route::get('/table','Backend\KategoriPelayananController@table');
        Route::get('/edit/{id}','Backend\KategoriPelayananController@edit');
        Route::patch('/update/{id}','Backend\KategoriPelayananController@update');
        Route::delete('/delete/{id}','Backend\KategoriPelayananController@destroy');
    });

    Route::prefix('/pelayanan')->group(function(){
        Route::resource('/','Backend\PelayananController');
        Route::get('/table','Backend\PelayananController@table');
        Route::get('/edit/{id}','Backend\PelayananController@edit');
        Route::patch('/update/{id}','Backend\PelayananController@update');
        Route::delete('/delete/{id}','Backend\PelayananController@destroy');
    });

    Route::prefix('/pertanyaan-ikm')->group(function(){
        Route::resource('/','Backend\PertanyaanIkmController');
        Route::get('/table','Backend\PertanyaanIkmController@table');
        Route::get('/edit/{id}','Backend\PertanyaanIkmController@edit');
        Route::patch('/update/{id}','Backend\PertanyaanIkmController@update');
        Route::delete('/delete/{id}','Backend\PertanyaanIkmController@destroy');
        
    });

    Route::prefix('/survey')->group(function(){
        Route::resource('/','Backend\SurveyController');
        Route::get('/table','Backend\SurveyController@table');
    });
});