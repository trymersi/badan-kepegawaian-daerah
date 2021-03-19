<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanIkm;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class PertanyaanIkmController extends Controller
{
    private $data;
    private $pertanyaan;


    public function __construct()
    {
        $this->pertanyaan = new PertanyaanIkm;

        $this->data = [
            'category_name' => 'Pertanyaan Survey',
            'main_url' => 'pertanyaan-ikm',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data Pertanyaan IKM';
        return view('dashboard.page.pertanyaan-ikm.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->pertanyaan->orderBy('urutan','desc')->first();
        isset($data->urutan) ? $urutan = $data->urutan + 1: $urutan = 1;
        $this->data['urutan'] = $urutan;
        $this->data['page_name'] = 'tambah data Pertanyaan IKM';
        return view('dashboard.page.pertanyaan-ikm.create',$this->data);
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
            'status' => 'required',
            'urutan' => 'required',
            'jawaban1' => 'required',
            'jawaban2' => 'required',
            'jawaban3' => 'required',
            'jawaban4' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->pertanyaan->pertanyaan = $request->pertanyaan;
        $this->pertanyaan->urutan = $request->urutan;
        $this->pertanyaan->status = $request->status;
        $this->pertanyaan->jawaban1 = $request->jawaban1;
        $this->pertanyaan->jawaban2 = $request->jawaban2;
        $this->pertanyaan->jawaban3 = $request->jawaban3;
        $this->pertanyaan->jawaban4 = $request->jawaban4;
        $this->pertanyaan->save();

        $this->pertanyaan->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pertanyaan-ikm');
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
        $edit = $this->pertanyaan->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data Pertanyaan IKM';
        return view('dashboard.page.pertanyaan-ikm.edit',$this->data);
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
            'pertanyaan' => 'required',
            'status' => 'required',
            'urutan' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = PertanyaanIkm::find($id);
        $update->pertanyaan = $request->pertanyaan;
        $update->status = $request->status;
        $update->urutan = $request->urutan;
        $update->jawaban1 = $request->jawaban1;
        $update->jawaban2 = $request->jawaban2;
        $update->jawaban3 = $request->jawaban3;
        $update->jawaban4 = $request->jawaban4;
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pertanyaan-ikm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->pertanyaan->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->pertanyaan->orderBy('urutan','asc')->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/pertanyaan-ikm/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->pertanyaan.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('status', function($data)
            {
                return $data->status == 1 ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>Tidak Aktif</span>";
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','status'])
            ->make(true);
    }
}
