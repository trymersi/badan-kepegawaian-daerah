<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriPelayanan;
use App\Models\Pelayanan;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class KategoriPelayananController extends Controller
{
    private $data;
    private $kategoriPelayanan;
    private $PelayananClass;


    public function __construct()
    {
        $this->kategoriPelayanan = new kategoriPelayanan;
        $this->PelayananClass = new Pelayanan;

        $this->data = [
            'category_name' => 'Kategori Pelayanan',
            'main_url' => 'kategori-pelayanan',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data kategori pelayanan';
        return view('dashboard.page.kategori-pelayanan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['kategori_pelayanan'] = $this->kategoriPelayanan->all();
        $this->data['page_name'] = 'tambah data kategori pelayanan';
        return view('dashboard.page.kategori-pelayanan.create',$this->data);
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
            'nama_kategori' => 'required|unique:kategori_pelayanans,nama,NULL,id,deleted_at,NULL',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->kategoriPelayanan->nama = $request->nama_kategori;
        $this->kategoriPelayanan->parent = $request->parent;
        $this->kategoriPelayanan->slug = bersih($request->nama_kategori);
        $this->kategoriPelayanan->save();

        $this->kategoriPelayanan->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-pelayanan');
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
        $this->data['kategori_pelayanan'] = $this->kategoriPelayanan->all();
        $edit = $this->kategoriPelayanan->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data kategori pelayanan';
        return view('dashboard.page.kategori-pelayanan.edit',$this->data);
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
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = KategoriPelayanan::find($id);
        $update->nama = $request->nama_kategori;
        $update->parent = $request->parent;
        $update->slug = bersih($request->nama_kategori);
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-pelayanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->kategoriPelayanan->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->kategoriPelayanan->orderBy('updated_at','DESC')->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/kategori-pelayanan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })
            ->addColumn('jenis', function($data)
            {
                $par = $this->kategoriPelayanan->find($data->parent);
                return $data->parent && isset($par->nama) ? "<span class='badge badge-success'>".$par->nama."</span>" : "-";
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','jenis'])
            ->make(true);
    }
}
