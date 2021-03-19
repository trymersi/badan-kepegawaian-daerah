<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use App\Models\GaleriVideo;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Berita;
use App\Models\Aplikasi;
use App\Models\LinkTerkait;
use App\Models\GaleriGambar;
use App\Models\DetailGaleri;
use App\Models\Slider;
use App\Models\Unduh;
use App\Models\Peraturan;
use App\Models\Pelayanan;
use App\Models\kategoriUnduhan;
use App\Models\kategoriPeraturan;
use App\Models\KategoriBerita;
use App\Models\Profil;
use App\Models\Bidang;
use App\Models\SubBidang;
use App\Models\Tupoksi;
use App\Models\Faq;
use App\Models\Pegawai;
use App\Models\kontak;
use App\Models\Konsultasi;
use App\Models\Pertanyaan;
use App\Models\PertanyaanIkm;
use App\Models\Survey;
use DataTables;
use Carbon\Carbon;



class HomeController extends Controller
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
    private $pegawaiClass;
    private $contact;
    private $konsultasi;
    private $pertanyaan;
    private $pertanyaanIkm;
    private $kategoriPeraturan;
    private $peraturanClass;

    public function __construct()
    {
        $this->contact = new kontak;
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
        $this->pegawaiClass = new Pegawai;
        $this->konsultasi = new Konsultasi;
        $this->pertanyaan = new Pertanyaan;
        $this->kategoriPeraturan = new kategoriPeraturan;
        $this->peraturanClass = new Peraturan;
        $this->pelayananClass = new Pelayanan;
        $this->pertanyaanIkm = new PertanyaanIkm;

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
            $cookie = 1;
            setcookie("count", $cookie,time()+86400);
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

    public function peraturan($id)
    {
        $data = $this->kategoriPeraturan->where('slug','LIKE','%'.$id.'%')->first();
        if($data)
        {
            $this->data['category_name'] = $data->nama;
            $this->data['id_peraturan'] = $data->id;
            $this->data['site_title'] = '✅ Peraturan - '.$data->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
            return view('frontend.page.peraturan.index',$this->data);
        }
        
    }

    public function pelayanan($id)
    {
        $data = $this->pelayananClass->where('slug','LIKE','%'.$id.'%')->first();
        
        if($data)
        {
            if (!isset($_COOKIE['count']))
            {
                $increament = $this->pelayananClass->find($data->id);
                $increament->increment('dilihat',1);
                $cookie = 1;
                setcookie("count", $cookie,time()+86400);
            }

            $this->data['detail'] = $this->pelayananClass->getSingle($data->id);
            $this->data['category_name'] = $data->nama;
            $this->data['id_peraturan'] = $data->id;
            $this->data['site_title'] = '✅ Peraturan - '.$data->nama.' - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
            return view('frontend.page.pelayanan.detail',$this->data);
        }
        
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
        $this->data['galeri'] = $this->galeriGambar->getAll();
        $this->data['site_title'] = '✅ Galeri Gambar - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.galeri.index',$this->data);
    }

    public function galeriVideo()
    {
        $this->data['category_name'] = 'Galeri Video';
        $this->data['galeri'] = $this->galeriVideo->all();
        $this->data['site_title'] = '✅ Galeri Video - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.video.index',$this->data);
    }

    public function galeriDetail($id)
    {
        
        $galeri = $this->galeriGambar->where('slug',$id)->first();
        $this->data['data_galeri'] = $galeri;
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

    public function tablePeraturan($id)
    {
        $data = $this->peraturanClass->where('kategori_peraturan_id',$id)->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                
                return '<a href="'.asset('/uploads/peraturan/'.$data->file).'" target="_blank" class=""><i class="fa fa-download" aria-hidden="true"></i> Unduh</a>';
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
            return Redirect::back()->with('gagal', 'Terjadi Kesalahan Harap Coba Kembali')->withInput();
        }

        $this->contact->nama = $request->nama;
        $this->contact->email = $request->email;
        $this->contact->telpon = $request->telpon;
        $this->contact->judul = $request->judul;
        $this->contact->pesan = $request->pesan;
        $this->contact->save();

        return redirect()->back()->with('sukses', 'Pesan kamu telah dikirim!');
    }

    public function pegawai()
    {
        $this->data['category_name'] = 'Pegawai dan Staff';
        $this->data['site_title'] = '✅ Pegawai dan Staff - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        $this->data['kepala_dinas'] = $this->pegawaiClass->where('jabatan',1)->first();
        $this->data['sekretaris'] = $this->pegawaiClass->where('jabatan',2)->first();
        $this->data['kabid'] = $this->pegawaiClass->getKabid();
        $this->data['subid'] = $this->pegawaiClass->getSubid();
        return view('frontend.page.pegawai.index',$this->data);
    }

    public function pegawaiDetail($id)
    {
        $this->data['category_name'] = 'Pegawai dan Staff';
        $this->data['site_title'] = '✅ Pegawai dan Staff - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        $this->data['pegawai'] = $this->pegawaiClass->getPegawai($id);
        return view('frontend.page.pegawai.detail',$this->data);
    }

    public function konsultasi()
    {
        $this->data['category_name'] = 'Konsultasi BKD Riau';
        $this->data['pertanyaan'] = $this->pertanyaan->orderBy('nama','asc')->get();
        $this->data['site_title'] = '✅ Konsultasi - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.konsultasi.index',$this->data);
    }

    public function konsultasiSave(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'telpon'=> 'required',
            'pertanyaan'=> 'required',
            'pesan'=> 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with('gagal', 'Terjadi Kesalahan Harap Coba Kembali')->withInput();
        }

        $this->konsultasi->nama = $request->nama;
        $this->konsultasi->email = $request->email;
        $this->konsultasi->nope = $request->telpon;
        $this->konsultasi->pertanyaan_id = $request->pertanyaan;
        $this->konsultasi->keterangan = $request->pesan;
        $this->konsultasi->status = 1;
        $this->konsultasi->save();

        return redirect()->back()->with('sukses', 'Pesan kamu telah dikirim!');
    }

    public function ikmIndex()
    {
        $this->data['page_name'] = 'IKM BKD Riau';
        $this->data['pertanyaan'] = $this->pertanyaanIkm->orderBy('urutan','asc')->where('status',1)->limit(7)->get();
        $this->data['site_title'] = '✅ IKM - Badan Kepegawaian Daerah Provinsi Riau | Bahagia Berkarya';
        return view('frontend.page.ikm.index',$this->data);
    }

    public function ikmSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'umur'=> 'required',
            'kelamin'=> 'required',
            'no1'=> 'required',
            'no2'=> 'required',
            'no3'=> 'required',
            'no4'=> 'required',
            'no5'=> 'required',
            'no6'=> 'required',
            'no7'=> 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with('gagal', 'Terjadi Kesalahan Harap Coba Kembali')->withInput();
        }


        $save = new Survey;
        $save->nama = $request->nama;
        $save->email = $request->email;
        $save->umur = $request->umur;
        $save->jk = $request->kelamin;
        $save->jawaban1 = $request->no1;
        $save->jawaban2 = $request->no2;
        $save->jawaban3 = $request->no3;
        $save->jawaban4 = $request->no4;
        $save->jawaban5 = $request->no5;
        $save->jawaban6 = $request->no6;
        $save->jawaban7 = $request->no7;
        $save->masukan = $request->masukan;
        $save->save();

        return redirect()->back()->with('sukses', 'Survey kamu sudah dikirim, Terimakasih!');
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
