<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Unduh;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class BeritaController extends Controller
{
    private $data;
    private $beritaClass;
    private $kategoriBerita;
    private $unduhClass;

    public function __construct()
    {
        $this->beritaClass = new Berita;
        $this->kategoriBerita = new KategoriBerita;
        $this->unduhClass = new Unduh;

        $this->data = [
            'category_name' => 'Berita',
            'main_url' => 'berita',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data berita';
        return view('dashboard.page.berita.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['kategori'] = $this->kategoriBerita->orderBy('nama','asc')->get();
        $this->data['page_name'] = 'tambah data berita';
        return view('dashboard.page.berita.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'kategori_berita' => 'required',
            'isi_berita' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $nama_bersih = bersih($request->judul_berita,'-');

        $content = $request->isi_berita;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $hitungGambar = 1;
        $images = $dom->getElementsByTagName('img');
        foreach($images as $img)
        {
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src))
            {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = $nama_bersih.'_'.rand();
                $filepath = public_path('uploads/images/gambar-berita').'/'.$filename.'.'.$mimetype;
                $nama = $filename.'.'.$mimetype;
                $image = Image::make($src)
                        ->encode($mimetype, 75)
                        ->save($filepath);
                $truepath = asset('uploads/images/gambar-berita').'/'.$filename.'.'.$mimetype;
                $new_src =$truepath;
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }
            if($hitungGambar == 1)
            {
                $thumbnail = $nama;
            }
            $hitungGambar++;
        }
        
        $thumb = isset($thumbnail) ? $thumbnail : 'default.jpg';

        $this->beritaClass->kategori_berita_id = $request->kategori_berita;
        $this->beritaClass->slug = $nama_bersih;
        $this->beritaClass->user_id = Auth::user()->id;
        $this->beritaClass->judul = $request->judul_berita;
        $this->beritaClass->konten = $dom->saveHTML();
        $this->beritaClass->thumbnail = $thumb;
        $this->beritaClass->tajuk = ($request->tajuk_berita) ? 1:0;
        $this->beritaClass->meta_deskripsi = meta_description($content);
        $this->beritaClass->meta_keyword = meta_keywords($request->judul_berita);    
        $this->beritaClass->save();
        
       
        $hitungFile = count($request->nama_file);
       
        $id_berita = $this->beritaClass->id;
        if($hitungFile >= 1 && $request->nama_file[0] != '')
        {
            for($i=0;$i<$hitungFile;$i++)
            {
                $file = $request->file('file')[$i];
                $nama_file = bersih($request->nama_file[$i]).'-'.date('d-m-Y-H-i-s').'.pdf';
                $file->move(public_path('uploads/unduhan'),$nama_file);

                $saveFile = new Unduh;
                $saveFile->berita_id = $id_berita;
                $saveFile->nama = $request->nama_file[$i];
                $saveFile->slug = bersih($request->nama_file[$i]);
                $saveFile->file = $nama_file;
                $saveFile->keterangan = ($request->keterangan[$i]) ? $request->keterangan[$i] : '-';
                $saveFile->save();
            }
        }

        $this->beritaClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->beritaClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->judul;
        $this->data['page_name'] = 'ubah data berita';
        $this->data['kategori'] = $this->kategoriBerita->orderBy('nama','asc')->get();
        return view('dashboard.page.berita.edit',$this->data);
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
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'kategori_berita' => 'required',
            'isi_berita' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $edit = Berita::find($id);

        $nama_bersih = bersih($request->judul_berita,'-');

        $content = $request->isi_berita;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $hitungGambar = 1;
        $images = $dom->getElementsByTagName('img');
        foreach($images as $img)
        {
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src))
            {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = $nama_bersih.'_'.rand();
                $filepath = public_path('uploads/images/gambar-berita').'/'.$filename.'.'.$mimetype;
                $nama = $filename.'.'.$mimetype;
                $image = Image::make($src)
                        ->encode($mimetype, 75)
                        ->save($filepath);
                $truepath = asset('uploads/images/gambar-berita').'/'.$filename.'.'.$mimetype;
                $new_src =$truepath;
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                if($hitungGambar == 1)
                {
                    $thumbnail = $nama;
                }
            }
            
            $hitungGambar++;
        }
        
        $thumb = isset($thumbnail) ? $thumbnail : 'default.jpg';

        
        $edit->kategori_berita_id = $request->kategori_berita;
        $edit->slug = $nama_bersih;
        $edit->user_id = Auth::user()->id;
        $edit->judul = $request->judul_berita;
        $edit->konten = $dom->saveHTML();
        $edit->tajuk = ($request->tajuk_berita) ? 1:0;
        if($edit->thumbnail == '' || $edit->thumbnail == 'default.jpg'):
        $edit->thumbnail = $thumb;
        endif;
        $edit->meta_deskripsi = meta_description($content);
        $edit->meta_keyword = meta_keywords($request->judul_berita);    
        $edit->save();

       
        $hitungFile = count($request->nama_file);
        
        $id_berita = $id;
        if($hitungFile >= 1 && $request->nama_file[0] != '')
        {
            for($i=0;$i<$hitungFile;$i++)
            {
                $file = $request->file('file')[$i];
                $nama_file = bersih($request->nama_file[$i]).'-'.date('d-m-Y-H-i-s').'.pdf';
                $file->move(public_path('uploads/unduhan'),$nama_file);

                $saveFile = new Unduh;
                $saveFile->berita_id = $id_berita;
                $saveFile->nama = $request->nama_file[$i];
                $saveFile->slug = bersih($request->nama_file[$i]);
                $saveFile->file = $nama_file;
                $saveFile->keterangan = ($request->keterangan[$i]) ? $request->keterangan[$i] : '-';
                $saveFile->save();
            }
        }
        
        $edit ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = $this->BeritaClass->find($id);
        if($data->thumbnail != "default.jpg")
        {
            /* DELETE DATA GAMBAR KETERANGAN*/
            $path_keterangan = public_path('uploads/images/gambar-berita');
            $content = $data->isi;
            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $img)
            {
                $src = $img->getAttribute('src');
                File::delete($path_keterangan.'/'.basename($src));
            }
        }
        
        $file = $this->unduhClass->where('berita_id',$id)->get();
        foreach($file as $key)
        {
            unlink(public_path('uploads/unduhan/'.$key->file));
            $del = $this->unduhClass->find($key->id);
            $del->delet();
        }
        

        $data->delete();
        return $data ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->beritaClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/berita/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->judul.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('thumbnail', function($data)
            {
            return  "<image src='".asset('uploads/images/gambar-berita/'.$data->thumbnail)."' width='200px' height='200px'>";
            })

            ->addColumn('judul', function($data)
            {
            return  $data->judul.' <a href="'.url('berita/'.$data->slug).'" target="_blank" class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','thumbnail','judul'])
            ->make(true);
    }

    public function tableFile(Request $request,$id)
    {   
        
        $data = $this->unduhClass->where('berita_id',$id)->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></a>';
                return  $button;
            })

            ->addColumn('file', function($data)
            {
                return '<a href="'.asset('/uploads/unduhan/'.$data->file).'" target="_blank" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Dokumen</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','file'])
            ->make(true);
    }
}
