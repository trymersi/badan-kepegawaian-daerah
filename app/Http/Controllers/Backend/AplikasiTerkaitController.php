<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class AplikasiTerkaitController extends Controller
{
    
    private $data;
    private $AplikasiClass;

    public function __construct()
    {
        $this->AplikasiClass = new Aplikasi;

        $this->data = [
            'category_name' => 'Aplikasi Terkait',
            'main_url' => 'aplikasi-terkait',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data aplikasi terkait';
        return view('dashboard.page.aplikasiterkait.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data aplikasi terkait';
        return view('dashboard.page.aplikasiterkait.create',$this->data);
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
            'nama' => 'required|unique:aplikasis,nama,NULL,id,deleted_at,NULL',
            'link' => 'required|unique:aplikasis,link,NULL,id,deleted_at,NULL',
            'gambar' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $nama_bersih = bersih($request->nama,'-');

        if($request->file('gambar'))
        {
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/aplikasi-terkait');
            $filename_header = $nama_bersih.".".$ext;
            $gambar->move($destination, $filename_header);
        }
        

        $this->AplikasiClass->nama = $request->nama;
        $this->AplikasiClass->link = $request->link;
        $this->AplikasiClass->gambar = $filename_header ; 
        $this->AplikasiClass->save();

        $this->AplikasiClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/aplikasi-terkait');
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
        $edit = $this->AplikasiClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data link terkait';
        return view('dashboard.page.aplikasiterkait.edit',$this->data);
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
            'nama' => 'required',
            'link' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $nama_bersih = bersih($request->nama,'-');

        if($request->file('gambar'))
        {
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/aplikasi-terkait');
            $filename_header = $nama_bersih.".".$ext;
            $gambar->move($destination, $filename_header);
        }
        $update = Aplikasi::find($id);
        $update->nama = $request->nama;
        $update->link = $request->link;
        if(isset($filename_header)):
            $update->gambar = $filename_header;
        endif;  
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/aplikasi-terkait');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->AplikasiClass->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->AplikasiClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/aplikasi-terkait/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('link_terkait', function($data)
            {
                $link = '<a target="_blank" href="'.$data->link.'" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-link" aria-hidden="true"></i></a><a target="_blank" href="'.$data->link.'" >'.$data->link.'</a>';
                return  $link;
            })

            ->addColumn('gambar', function($data)
            {
                $gambar = '<figure class="img-hov-zoomin"><img src="'.asset("uploads/images/aplikasi-terkait/".$data->gambar).'" alt="'.$data->gambar.'"></figure>';
                return  $gambar;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','link_terkait','gambar'])
            ->make(true);
    }
}
