<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peraturan;
use App\Models\KategoriPeraturan;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class PeraturanController extends Controller
{
    private $data;
    private $kategoriPeraturan;
    private $peraturanClass;


    public function __construct()
    {
        $this->kategoriPeraturan = new kategoriPeraturan;
        $this->peraturanClass = new Peraturan;

        $this->data = [
            'category_name' => 'Peraturan',
            'main_url' => 'peraturan',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data peraturan';
        return view('dashboard.page.peraturan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['kategori'] = $this->kategoriPeraturan->orderBy('nama','asc')->get();
        $this->data['page_name'] = 'tambah data peraturan';
        return view('dashboard.page.peraturan.create',$this->data);
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
            'tentang' => 'required|unique:peraturans,tentang,NULL,id,deleted_at,NULL',
            'file' => 'required|mimes:pdf',
            'kategori_unduh' => 'required', 
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $nama_file = bersih($request->tentang).'-'.date('d-m-Y').'.pdf';
        $file->move(public_path('uploads/peraturan'),$nama_file);

        $this->peraturanClass->tentang = $request->tentang;
        $this->peraturanClass->kategori_peraturan_id = $request->kategori_unduh;
        $this->peraturanClass->slug = bersih($request->tentang);
        $this->peraturanClass->file = $nama_file;
        $this->peraturanClass->tahun = $request->tahun;
        $this->peraturanClass->nomor = $request->nomor;
        $this->peraturanClass->save();

        $this->peraturanClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/peraturan');
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
        $edit = $this->peraturanClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->tentang;
        $this->data['page_name'] = 'ubah data peraturan';
        $this->data['kategori'] = $this->kategoriPeraturan->orderBy('nama','asc')->get();
        return view('dashboard.page.peraturan.edit',$this->data);
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
            'tentang' => 'required',
            'kategori_unduh' => 'required', 
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $old = $this->peraturanClass->find($id);

        if($request->hasFile('file'))
        {
            if(file_exists(public_path('uploads/peraturan/'.$old->file)))
            {
                unlink(public_path('uploads/peraturan/'.$old->file));
            }
            
            $file = $request->file('file');
            $nama_file = bersih($request->tentang).'-'.date('d-m-Y').'.pdf';
            $file->move(public_path('uploads/peraturan'),$nama_file);
        }
        
        $edit = Peraturan::find($id);
        $edit->tentang = $request->tentang;
        $edit->nomor = $request->nomor;
        $edit->tahun = $request->tahun;
        $edit->kategori_peraturan_id = $request->kategori_unduh;
        $edit->slug = bersih($request->tentang);
        if(isset($nama_file)):
            $edit->file = $nama_file;
        endif;
        $edit->save();

        $edit ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/peraturan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->peraturanClass->find($id);
        unlink(public_path('uploads/peraturan/'.$delete->file));
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->peraturanClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/peraturan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('file', function($data)
            {
                return '<a href="'.asset('/uploads/peraturan/'.$data->file).'" target="_blank" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Dokumen</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','file'])
            ->make(true);
    }
}
