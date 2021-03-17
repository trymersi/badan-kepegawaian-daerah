<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriPeraturan;
use App\Models\Peraturan;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class KategoriPeraturanController extends Controller
{
    private $data;
    private $kategoriPeraturan;
    private $peraturanClass;


    public function __construct()
    {
        $this->kategoriPeraturan = new kategoriPeraturan;
        $this->peraturanClass = new Peraturan;

        $this->data = [
            'category_name' => 'Kategori Peraturan',
            'main_url' => 'kategori-peraturan',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data Kategori Peraturan';
        return view('dashboard.page.kategori-peraturan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data Kategori Peraturan';
        return view('dashboard.page.kategori-peraturan.create',$this->data);
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
            'nama_kategori' => 'required|unique:bidangs,nama,NULL,id,deleted_at,NULL',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->kategoriPeraturan->nama = $request->nama_kategori;
        $this->kategoriPeraturan->slug = bersih($request->nama_kategori);
        $this->kategoriPeraturan->save();

        $this->kategoriPeraturan->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-peraturan');
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
        $edit = $this->kategoriPeraturan->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data Kategori Peraturan';
        return view('dashboard.page.kategori-peraturan.edit',$this->data);
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

        $update = KategoriPeraturan::find($id);
        $update->nama = $request->nama_kategori;
        $update->slug = bersih($request->nama_kategori);
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-peraturan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->kategoriPeraturan->find($id);
        
        $unduhan = $this->peraturanClass->where('kategori_peraturan_id',$id)->get();
        foreach($unduhan as $file)
        {
            if(file_exists(public_path('uploads/peraturan/'.$file->file)))
            {
                unlink(public_path('uploads/peraturan/'.$file->file));
            }
            $delFile = Unduh::find($file->id);
            $delFile->delete();
        }
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->kategoriPeraturan->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/kategori-peraturan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })
            

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','jenis'])
            ->make(true);
    }
}
