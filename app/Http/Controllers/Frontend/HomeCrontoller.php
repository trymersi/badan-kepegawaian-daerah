<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Berita;
use App\Models\Aplikasi;
use App\Models\LinkTerkait;
use App\Models\GaleriGambar;
use App\Models\DetailGaleri;
use App\Models\GaleriVideo;
use App\Models\Slider;
class HomeCrontoller extends Controller
{
    private $data;
    private $beritaClass;
    private $PengaturanClass;
    private $AplikasiClass;
    private $LinkTerkaitClass;
    private $galeriGambar;
    private $galeriVideo;
    private $sliderClass;
    private $galeriDetail;
    

    public function __construct()
    {
        $this->beritaClass = new Berita;
        $this->PengaturanClass = new Pengaturan;
        $this->AplikasiClass = new Aplikasi;
        $this->LinkTerkaitClass = new LinkTerkait;
        $this->galeriGambar = new GaleriGambar;
        $this->galeriVideo = new GaleriVideo;
        $this->sliderClass = new Slider;
        $this->galeriDetail = new DetailGaleri;

        $this->data = [
            'category_name' => 'Dashboard',
            'main_url' => 'dashboard',
            'title' => '>Badan Kepegawaian Daerah Provinsi Riau - BERSIH - KOMPETEN - DISIPLIN'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['slider'] = $this->sliderClass->orderBy('created_at','desc')->get();
        $this->data['link_terkait'] = $this->LinkTerkaitClass->orderBy('created_at','desc')->get();
        $this->data['aplikasi'] = $this->AplikasiClass->orderBy('created_at','desc')->get();
        $this->data['galeri'] = $this->galeriGambar->getHome();
        $this->data['galeri_seluruh'] = $this->galeriGambar->getHomeSeluruh();
        $this->data['video'] = $this->galeriVideo->orderBy('created_at','asc')->limit(5)->get();
        $this->data['berita'] = $this->beritaClass->getDataHome();
        $this->data['page_name'] = 'tabel data bidang';
        return view('frontend.page.beranda.index',$this->data);
    }
    public function berita()
    {
        $this->data['page_name'] = 'tabel data bidang';
        return view('frontend.page.berita.index',$this->data);
    }

    public function unduhan()
    {
        $this->data['page_name'] = 'tabel data bidang';
        return view('frontend.page.unduhan.index',$this->data);
    }

    public function galeri()
    {
        $this->data['category_name'] = 'data galeri';
        $this->data['galeri'] = $this->galeriGambar->getHome();
        return view('frontend.page.galeri.index',$this->data);
    }

    public function galeriDetail($id)
    {
        
        $galeri = $this->galeriGambar->where('slug',$id)->first();
        $this->data['category_name'] = 'galeri';
        $this->data['page_name'] = 'galeri '.$galeri->nama;
        $this->data['detail_galeri'] = $this->galeriDetail->where('galeri_gambar_id',$galeri->id)->get();
        return view('frontend.page.galeri.detail',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
