<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriUnduhan;
use App\Models\Unduh;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class KategoriUnduhController extends Controller
{
    private $data;
    private $kategoriUnduh;
    private $unduhClass;


    public function __construct()
    {
        $this->kategoriUnduh = new kategoriUnduhan;
        $this->unduhClass = new Unduh;

        $this->data = [
            'category_name' => 'Kategori Unduh',
            'main_url' => 'kategori-unduhan',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data kategori unduhan';
        return view('dashboard.page.kategori-unduhan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data kategori unduhan';
        return view('dashboard.page.kategori-unduhan.create',$this->data);
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

        $this->kategoriUnduh->nama = $request->nama_kategori;
        $this->kategoriUnduh->jenis = $request->jenis;
        $this->kategoriUnduh->slug = bersih($request->nama_kategori);
        $this->kategoriUnduh->save();

        $this->kategoriUnduh->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-unduhan');
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
        $edit = $this->kategoriUnduh->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data kategori unduhan';
        return view('dashboard.page.kategori-unduhan.edit',$this->data);
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

        $update = KategoriUnduhan::find($id);
        $update->nama = $request->nama_kategori;
        $update->jenis = $request->jenis;
        $update->slug = bersih($request->nama_kategori);
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/kategori-unduhan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->kategoriUnduh->find($id);
        
        $unduhan = $this->unduhClass->where('kategori_unduhan_id',$id)->get();
        foreach($unduhan as $file)
        {
            if(file_exists(public_path('uploads/unduhan/'.$file->file)))
            {
                unlink(public_path('uploads/unduhan/'.$file->file));
            }
            $delFile = Unduh::find($file->id);
            $delFile->delete();
        }
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->kategoriUnduh->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/kategori-unduhan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })
            ->addColumn('jenis', function($data)
            {
                return ($data->jenis == "1") ? "<span class='badge badge-success'>Umum</span>" : "<span class='badge badge-info'>Informasi Public</span>";
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','jenis'])
            ->make(true);
    }
}
