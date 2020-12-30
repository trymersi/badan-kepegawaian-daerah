<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Bidang;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;
use PDF;

class KonsultasiController extends Controller
{
    private $data;
    private $konsultasi;
    private $bidang;


    public function __construct()
    {
        $this->konsultasi = new Konsultasi;
        $this->bidang = new Bidang;

        $this->data = [
            'category_name' => 'Konsultasi',
            'main_url' => 'Konsultasi',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data Konsultasi';
        return view('dashboard.page.konsultasi.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data Konsultasi';
        return view('dashboard.page.konsultasi.create',$this->data);
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->konsultasi->pertanyaan = $request->pertanyaan;
        $this->konsultasi->jawaban = $request->jawaban;
        $this->konsultasi->save();

        $this->konsultasi->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/faq');
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

    public function cetak($id)
    {
        $data = $this->konsultasi->getEdit($id);
        $this->data['konsultasi'] = $data;
        $this->data['title'] = "Pertanyaan";
        $pdf =  PDF::loadView('dashboard.page.konsultasi.cetak',$this->data);
        return $pdf->stream('pertanyaan.pdf'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->konsultasi->getEdit($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['bidang'] = $this->bidang->orderBy('nama','asc')->get();
        $this->data['page_name'] = 'ubah data Konsultasi';
        return view('dashboard.page.konsultasi.edit',$this->data);
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

        
        $update = Konsultasi::find($id);
        if($update->bidang_id == Null):
        $update->bidang_id = $request->nama_bidang;
        $update->status = 2;

        else:
        $update->status = $request->status;
        endif;

        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/konsultasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->konsultasi->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->konsultasi->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/konsultasi/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                $button .= '<a target="_blank" href="'.url('dashboard/konsultasi/cetak/'.$data->id).'" class="btn btn-success mb-2 mr-2 btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>';
                
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('status', function($data)
            {
            return  status($data->status);
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','status'])
            ->make(true);
    }
}
