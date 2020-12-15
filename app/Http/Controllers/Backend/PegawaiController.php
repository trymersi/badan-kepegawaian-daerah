<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubBidang;
use App\Models\Bidang;
use App\Models\Pegawai;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class PegawaiController extends Controller
{
    private $data;
    private $bidangClass;
    private $pegawaiClass;
    private $subBidangClass;


    public function __construct()
    {
        $this->bidangClass = new Bidang;
        $this->pegawaiClass = new Pegawai;
        $this->subBidangClass = new SubBidang;

        $this->data = [
            'category_name' => 'Pegawai',
            'main_url' => 'pegawai',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data pegawai';
        return view('dashboard.page.pegawai.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['bidang'] = $this->bidangClass->orderBy('nama','asc')->get();
        $this->data['sub_bidang'] = $this->subBidangClass->orderBy('nama','asc')->get();
        $this->data['page_name'] = 'tambah data pegawai';
        return view('dashboard.page.pegawai.create',$this->data);
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
            'jabatan' => 'required',
            'nama_pegawai' => 'required',
            'pendidikan' => 'required',
            'foto' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $nama_bersih = bersih($request->nama,'-');
        if($request->file('foto'))
        {
            $gambar = $request->file('foto');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/foto-pegawai');
            $filename_header = $nama_bersih.rand().".".$ext;
            $gambar->move($destination, $filename_header);
        }

        $this->pegawaiClass->jabatan = $request->jabatan;
        $this->pegawaiClass->bidang_id = $request->nama_bidang;
        $this->pegawaiClass->sub_bidang_id = $request->nama_sub_bidang;
        $this->pegawaiClass->nama = $request->nama_pegawai;
        $this->pegawaiClass->pendidikan = ($request->pendidikan) ? $request->pendidikan : '-';
        $this->pegawaiClass->foto = $filename_header;
        $this->pegawaiClass->save();

        $this->pegawaiClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pegawai');
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
        $edit = $this->pegawaiClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data pegawai';
        $this->data['bidang'] = $this->bidangClass->orderBy('nama','asc')->get();
        return view('dashboard.page.pegawai.edit',$this->data);
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
            'jabatan' => 'required',
            'nama_pegawai' => 'required',
            'pendidikan' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = Pegawai::find($id);
        $nama_bersih = bersih($request->nama,'-');
        if($request->file('foto'))
        {
            unlink(public_path('uploads/images/foto-pegawai/'.$update->foto));
            $gambar = $request->file('foto');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/foto-pegawai');
            $filename_header = $nama_bersih.rand().".".$ext;
            $gambar->move($destination, $filename_header);
        }

        
        $update->jabatan = $request->jabatan;
        $update->bidang_id = $request->nama_bidang;
        $update->sub_bidang_id = $request->nama_sub_bidang;
        $update->nama = $request->nama_pegawai;
        $update->pendidikan = ($request->pendidikan) ? $request->pendidikan : '-';
        if(isset($filename_header)):
        $update->foto = $filename_header;
        endif;
        $update->save();

        $update ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->pegawaiClass->find($id);
        unlink(public_path('uploads/images/foto-pegawai/'.$delete->foto));
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->pegawaiClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/pegawai/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('jabatan', function($data)
            {
            return  getJabatan($data->jabatan);
            })

            ->addColumn('foto', function($data)
            {
                $gambar = '<figure class="img-hov-zoomin"><img width="80px" src="'.asset("uploads/images/foto-pegawai/".$data->foto).'" alt="'.$data->foto.'"></figure>';
                return  $gambar;
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','jabatan','foto'])
            ->make(true);
    }
}
