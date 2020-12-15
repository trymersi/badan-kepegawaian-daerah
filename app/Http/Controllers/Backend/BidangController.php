<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bidang;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class BidangController extends Controller
{
    private $data;
    private $bidangClass;


    public function __construct()
    {
        $this->bidangClass = new Bidang;

        $this->data = [
            'category_name' => 'Bidang',
            'main_url' => 'bidang',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data bidang';
        return view('dashboard.page.bidang.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data bidang';
        return view('dashboard.page.bidang.create',$this->data);
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
            'nama_bidang' => 'required|unique:bidangs,nama,NULL,id,deleted_at,NULL',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->bidangClass->nama = $request->nama_bidang;
        $this->bidangClass->slug = bersih($request->nama_bidang);
        $this->bidangClass->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $this->bidangClass->save();

        $this->bidangClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/bidang');
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
        $edit = $this->bidangClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data bidang';
        return view('dashboard.page.bidang.edit',$this->data);
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
            'nama_bidang' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = Bidang::find($id);
        $update->nama = $request->nama_bidang;
        $update->slug = bersih($request->nama_bidang);
        $update->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/bidang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->bidangClass->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->bidangClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/bidang/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option'])
            ->make(true);
    }
}
