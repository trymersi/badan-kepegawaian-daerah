<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.main-1','frontend.include.sidebar'],function($view)
        {
            $view->with('berita',\App\Models\Berita::leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->select(
                'kategori_beritas.nama as nama_kategori',
                'kategori_beritas.slug as slug_kategori',
                'beritas.id',
                'beritas.judul',
                'beritas.meta_deskripsi',
                'beritas.thumbnail',
                'beritas.updated_at',
                'beritas.slug',
            )
            ->orderBy('beritas.created_at','desc')
            ->groupBy('beritas.id')
            ->limit(6)
            ->get());
            $view->with('kategori_unduhan',\App\Models\KategoriUnduhan::orderBy('nama','asc')->get());
            $view->with('profil',\App\Models\Profil::orderBy('nama','asc')->get());
            $view->with('aplikasi',\App\Models\Aplikasi::orderBy('nama','asc')->get());
            $view->with('link_terkait',\App\Models\LinkTerkait::orderBy('nama','asc')->get());
            $view->with('kategori_berita_menu',\App\Models\KategoriBerita::orderBy('nama','asc')->get());
            $view->with('pengaturan_website',\App\Models\Pengaturan::first());
            $view->with('kategori_unduhan_footer',\App\Models\KategoriUnduhan::orderBy('nama','asc')->limit(10)->get());
        });

        // view()->composer('',function($view)
        // {
        //     $view->with('profil',\App\Models\Profil::orderBy('nama','asc')->get());
        // });

        
    }
}
