<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubBidang;
use App\Models\Bidang;
use App\Models\Tupoksi;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class TupoksiController extends Controller
{
    private $data;
    private $bidangClass;
    private $tupoksiClass;
    private $subBidangClass;


    public function __construct()
    {
        $this->bidangClass = new Bidang;
        $this->tupoksiClass = new Tupoksi;
        $this->subBidangClass = new SubBidang;

        $this->data = [
            'category_name' => 'Tupoksi',
            'main_url' => 'tupoksi',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data tugas pokok dan fungsi';
        return view('dashboard.page.tupoksi.index',$this->data);
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
        $this->data['page_name'] = 'tambah data tugas pokok dan fungsi';
        return view('dashboard.page.tupoksi.create',$this->data);
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
            'nama_bidang' => 'required',
            'nama_tupoksi' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->tupoksiClass->bidang_id = $request->nama_bidang;
        $this->tupoksiClass->sub_bidang_id = $request->nama_sub_bidang;
        $this->tupoksiClass->nama = $request->nama_tupoksi;
        $this->tupoksiClass->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $this->tupoksiClass->save();

        $this->tupoksiClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/tupoksi');
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
        $edit = $this->tupoksiClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data tugas pokok dan fungsi';
        $this->data['bidang'] = $this->bidangClass->orderBy('nama','asc')->get();
        return view('dashboard.page.tupoksi.edit',$this->data);
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
            'nama_tupoksi' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = Tupoksi::find($id);
        $update->bidang_id = $request->nama_bidang;
        $update->sub_bidang_id = $request->nama_sub_bidang;
        $update->nama = $request->nama_tupoksi;
        $update->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $update->save();

        $update ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/tupoksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->tupoksiClass->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->tupoksiClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/tupoksi/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
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
