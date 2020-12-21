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
use App\Models\Unduh;
use App\Models\kategoriUnduhan;
use App\Models\KategoriBerita;
use App\Models\Profil;
use DataTables;
use Carbon\Carbon;

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
    private $unduhClass;
    private $kategoriUnduh;
    private $kategoriBerita;
    private $Profil;

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
        $this->unduhClass = new Unduh;
        $this->kategoriUnduh = new kategoriUnduhan;
        $this->kategoriBerita = new KategoriBerita;
        $this->Profil = new Profil;

        $this->data = [
            'category_name' => 'Dashboard',
            'main_url' => 'dashboard',
            'site_title' => '✅ Badan Kepegawaian Daerah Provinsi Riau - BERSIH - KOMPETEN - DISIPLIN'
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
        $this->data['category_name'] = 'Seluruh berita';
        $this->data['list_berita'] = $this->beritaClass->getList();
        $this->data['site_title'] = '✅ Seluruh Berita - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.berita.index',$this->data);
    }

    public function detailBerita($id)
    {
        $berita = $this->beritaClass->getDetail($id);
        $this->data['detail_berita'] = $berita;
        $this->data['sebelum'] = $this->beritaClass->getSebelum($berita->id);
        $this->data['sesudah'] = $this->beritaClass->getSesudah($berita->id);
        $this->data['page_name'] = $berita->judul;
        $this->data['category_name'] = $berita->nama_kategori;
        $this->data['kategori_related'] = $this->beritaClass->getListByKatRel($berita->id_kategori);
        $this->data['berita_related'] = $this->beritaClass->getRelated($berita->id);
        $this->data['site_title'] = '✅ ' .$berita->judul.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.berita.detail',$this->data);
    }

    public function kategoriBerita($id)
    {
        $kategori = $this->kategoriBerita->where('slug',$id)->first();
        $this->data['category_name'] = 'Kategori Berita';
        $this->data['page_name'] = $kategori->nama;
        $this->data['list_berita'] = $this->beritaClass->getListByKat($kategori->id);
        $this->data['site_title'] = '✅ ' .$kategori->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.berita.kategori',$this->data);
    }

    public function profil($id)
    {
        $profil = $this->Profil->where('slug',$id)->first();
        $this->data['category_name'] = 'Profil';
        $this->data['sidebar_name'] = 'Profil Kami';
        $this->data['page_name'] = $profil->nama;
        $this->data['isi'] = $profil->isi;
        $this->data['updated_at'] = Carbon::parse($profil->updated_at)->diffForHumans() ;
        $this->data['site_title'] = '✅ ' .$profil->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.profil.index',$this->data);
    }

    public function unduhan()
    {
        $this->data['category_name'] = 'list seluruh unduhan';
        $this->data['site_title'] = '✅ Seluruh Unduhan - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.unduhan.index',$this->data);
    }

    public function unduhanDetail($id)
    {
        $kategori = $this->kategoriUnduh->where('slug',$id)->first();
        $this->data['unduhan'] = $this->unduhClass->where('kategori_unduhan_id',$kategori->id)->orderBy('updated_at','asc')->get();
        $this->data['page_name'] = $kategori->nama;
        $this->data['category_name'] = 'list seluruh unduhan';
        $this->data['id_kategori_unduhan'] = $kategori->id;
        $this->data['site_title'] = '✅ ' .$kategori->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.unduhan.detail',$this->data);
    }

    public function galeri()
    {
        $this->data['category_name'] = 'data galeri';
        $this->data['galeri'] = $this->galeriGambar->getHome();
        $this->data['site_title'] = '✅ Galeri - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.galeri.index',$this->data);
    }

    public function galeriDetail($id)
    {
        
        $galeri = $this->galeriGambar->where('slug',$id)->first();
        $this->data['category_name'] = 'galeri';
        $this->data['page_name'] = 'galeri '.$galeri->nama;
        $this->data['detail_galeri'] = $this->galeriDetail->where('galeri_gambar_id',$galeri->id)->get();
        $this->data['site_title'] = '✅ Galeri '.$galeri->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.galeri.detail',$this->data);
    }

    public function tableUnduhan($id)
    {
        $data = (isset($id) && $id !="seluruh") ? $this->unduhClass->getDataByKat($id) : $this->unduhClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                
                return '<a href="'.asset('/uploads/unduhan/'.$data->file).'" target="_blank" class=""><i class="fa fa-download" aria-hidden="true"></i> Unduh</a>';
            })


            ->addIndexColumn()
            ->rawColumns(['tanggal','option','isi'])
            ->make(true);
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
