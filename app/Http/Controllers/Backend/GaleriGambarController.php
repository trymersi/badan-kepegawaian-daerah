<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GaleriGambar;
use App\Models\DetailGaleri;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class GaleriGambarController extends Controller
{
    private $data;
    private $galeriGambar;
    private $detailGambar;


    public function __construct()
    {
        $this->galeriGambar = new GaleriGambar;
        $this->detailGambar = new DetailGaleri;

        $this->data = [
            'category_name' => 'Galeri Gambar',
            'main_url' => 'galeri-gambar',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel Galeri Gambar';
        return view('dashboard.page.galeri-gambar.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah Galeri Gambar';
        return view('dashboard.page.galeri-gambar.create',$this->data);
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
            'nama_galeri' => 'required',
            'gambar' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $nama_bersih = bersih($request->nama_galeri,'-');
        $gambar = $request->file('gambar');
        $ext = $gambar->getClientOriginalExtension();
        $destination = public_path('uploads/images/gambar-galeri');
        $filename_header = $nama_bersih.rand().".".$ext;
        $gambar->move($destination, $filename_header);

        $this->galeriGambar->nama = $request->nama_galeri;
        $this->galeriGambar->slug = bersih($request->nama_galeri);
        $this->galeriGambar->alt_gambar = $request->nama_galeri;
        $this->galeriGambar->gambar = $filename_header;
        $this->galeriGambar->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $this->galeriGambar->save();

        $this->galeriGambar->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/galeri-gambar');
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
        $edit = $this->galeriGambar->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah Galeri Gambar';
        return view('dashboard.page.galeri-gambar.edit',$this->data);
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
            'nama_galeri' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = GaleriGambar::find($id);
        if($request->hasFile('gambar'))
        {
            unlink(public_path('uploads/images/gambar-galeri/'.$update->gambar));
            $nama_bersih = bersih($request->nama_galeri,'-');
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/gambar-galeri');
            $filename_header = $nama_bersih.rand().".".$ext;
            $gambar->move($destination, $filename_header);
        }
        
        $update->nama = $request->nama_galeri;
        $update->slug = bersih($request->nama_galeri);
        $update->alt_gambar = $request->nama_galeri;
        if(isset($filename_header)):
        $update->gambar = $filename_header;
        endif;
        $update->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/galeri-gambar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->galeriGambar->find($id);
        unlink(public_path('uploads/images/gambar-galeri/'.$delete->gambar));
        $gambar = $this->detailGambar->where('galeri_gambar_id',$id)->get();
        foreach($gambar as $gam)
        {
            unlink(public_path('uploads/images/detail-galeri/'.$gam->gambar));
            $delGambar = DetailGambar::find($id);
            $delGambar->delete();
        }
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->galeriGambar->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/galeri-gambar/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('gambar', function($data)
            {
                $gambar = '<figure class="img-hov-zoomin"><img width="80px" src="'.asset("uploads/images/gambar-galeri/".$data->gambar).'" alt="'.$data->gambar.'"></figure>';
                return  $gambar;
            })

            ->addColumn('total_gambar', function($data)
            {

                $button = '<a href="'.url('dashboard/galeri-gambar/detail/'.$data->id).'" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Gambar</a>';
                return  $data->total_gambar.' Gambar '.$button;
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','gambar','total_gambar'])
            ->make(true);
    }

    public function detail($id)
    {
        $galeri = $this->galeriGambar->find($id);
        $this->data['galeri'] = $galeri;
        $this->data['page_name'] = 'tabel Gambar Galeri '.$galeri->nama;
        return view('dashboard.page.detail-galeri.index',$this->data);
    }

    public function detailCreate($id)
    {   
        $galeri = $this->galeriGambar->find($id);
        $this->data['galeri'] = $galeri;
        $this->data['page_name'] = 'tambah gambar dari Galeri '.$galeri->nama;
        return view('dashboard.page.detail-galeri.create',$this->data);
    }

    public function detailStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_gambar' => 'required',
            'gambar' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $nama_bersih = bersih($request->nama_gambar,'-');
        $gambar = $request->file('gambar');
        $ext = $gambar->getClientOriginalExtension();
        $destination = public_path('uploads/images/detail-galeri');
        $filename_header = $nama_bersih.rand().".".$ext;
        $gambar->move($destination, $filename_header);

        $this->detailGambar->galeri_gambar_id = $request->galeri_gambar_id;
        $this->detailGambar->nama = $request->nama_gambar;
        $this->detailGambar->gambar = $filename_header;
        $this->detailGambar->save();

        $this->detailGambar->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/galeri-gambar/detail/'.$request->galeri_gambar_id);
    }


    public function detailTable($id)
    {
        $data = $this->detailGambar->where('galeri_gambar_id',$id)->orderBy('created_at')->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('gambar', function($data)
            {
                $gambar = '<figure class="img-hov-zoomin"><img width="80px" src="'.asset("uploads/images/detail-galeri/".$data->gambar).'" alt="'.$data->gambar.'"></figure>';
                return  $gambar;
            })


            ->addIndexColumn()
            ->rawColumns(['tanggal','option','gambar','total_gambar'])
            ->make(true);
    }

    public function detailDestroy($id)
    {
        $delete = $this->detailGambar->find($id);
        unlink(public_path('uploads/images/detail-galeri/'.$delete->gambar));
        $delete->delete();
        return $delete ? 1 : 0;
    }
}

