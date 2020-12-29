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
use App\Models\Bidang;
use App\Models\SubBidang;
use App\Models\Tupoksi;
use App\Models\Faq;
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
    private $bidangClass;
    private $subBidang;
    private $tupoksiClass;
    private $faqClass;

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
        $this->bidangClass = new Bidang;
        $this->subBidang = new SubBidang;
        $this->tupoksiClass = new Tupoksi;
        $this->faqClass = new Faq;
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
        $this->data['berita_tajuk'] = $this->beritaClass->getDataTajuk();
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
    public function kontak()
    {
        $this->data['category_name'] = 'Kontak BKD Riau';
        $this->data['site_title'] = '✅ Kontak - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.kontak.index',$this->data);
    }

    public function detailBerita($id)
    {
        $berita = $this->beritaClass->getDetail($id);
        if (!isset($_COOKIE['count']))
        {
            $increament = $this->beritaClass->find($berita->id);
            $increament->increment('dilihat',1);
        }

        $this->data['detail_berita'] = $berita;
        $this->data['unduhan'] = $this->unduhClass->where('berita_id',$berita->id)->get();
        $this->data['sebelum'] = $this->beritaClass->getSebelum($berita->id);
        $this->data['sesudah'] = $this->beritaClass->getSesudah($berita->id);
        $this->data['page_name'] = $berita->judul;
        $this->data['category_name'] = $berita->nama_kategori;
        $this->data['kategori_related'] = $this->beritaClass->getListByKatRel($berita->id_kategori,$berita->id);
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

    public function pencarianBerita(Request $request)
    {
        
        $this->data['category_name'] = 'Pencarian';
        $this->data['page_name'] = "Pencarian ". '"'.$request->pencarian.'"';
        $this->data['list_berita'] = $this->beritaClass->getPencarian($request->pencarian);
        $this->data['site_title'] = '✅ ' .$request->pencarian.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.berita.pencarian',$this->data);
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
        $this->data['category_name'] = 'Galeri Gambar';
        $this->data['galeri'] = $this->galeriGambar->getHome();
        $this->data['site_title'] = '✅ Galeri Gambar - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.galeri.index',$this->data);
    }

    public function galeriDetail($id)
    {
        
        $galeri = $this->galeriGambar->where('slug',$id)->first();
        $this->data['category_name'] = 'Detail Galeri Gambar';
        $this->data['page_name'] = 'galeri gambar '.$galeri->nama;
        $this->data['detail_galeri'] = $this->galeriDetail->where('galeri_gambar_id',$galeri->id)->get();
        $this->data['site_title'] = '✅ Galeri Gambar '.$galeri->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.galeri.detail',$this->data);
    }

    public function detailBidang($id)
    {
        $bidang = $this->bidangClass->where('slug',$id)->first();
        $this->data['category_name'] = 'Bidang';
        $this->data['page_name'] = 'Bidang '.$bidang->nama;
        $this->data['data_bidang'] = $bidang;
        $this->data['tupoksi_bidang'] = $this->tupoksiClass->where('bidang_id',$bidang->id)->get();
        $this->data['sub_bidang'] = $this->subBidang->where('bidang_id',$bidang->id)->get();
        $this->data['site_title'] = '✅ Bidang '.$bidang->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.bidang.index',$this->data);
    }

    public function faq()
    {
        $this->data['page_name'] = 'FAQ';
        $this->data['faq'] = $this->faqClass->orderBy('pertanyaan','asc')->get();
        $this->data['site_title'] = 'FAQ - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.faq.index',$this->data);
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
    public function contactSave(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'telpon'=> 'required',
            'judul'=> 'required',
            'pesan'=> 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with('message', 'Terjadi Kesalahan Harap Coba Kembali')->withInput();
        }

        $this->contact->nama = $request->name;
        $this->contact->email = $request->email;
        $this->contact->pertanyaan = $request->comments;
        $this->contact->save();

        return redirect()->back()->with('message', 'Pesan kamu telah dikirim!');
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
