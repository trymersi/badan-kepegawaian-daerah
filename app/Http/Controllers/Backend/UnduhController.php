<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unduh;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class UnduhController extends Controller
{
    private $data;
    private $bidangClass;


    public function __construct()
    {
        $this->unduhClass = new Unduh;

        $this->data = [
            'category_name' => 'Unduhan',
            'main_url' => 'unduhan',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data unduhan';
        return view('dashboard.page.unduhan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data unduhan';
        return view('dashboard.page.unduhan.create',$this->data);
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
            'nama_file' => 'required|unique:unduhs,nama,NULL,id,deleted_at,NULL',
            'file' => 'required|mimes:pdf',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $nama_file = bersih($request->nama_file).'-'.date('d-m-Y').'.pdf';
        $file->move(public_path('uploads/unduhan'),$nama_file);

        $this->unduhClass->nama = $request->nama_file;
        $this->unduhClass->slug = bersih($request->nama_file);
        $this->unduhClass->file = $nama_file;
        $this->unduhClass->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $this->unduhClass->save();

        $this->unduhClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/unduhan');
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
        $edit = $this->unduhClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data unduhan';
        return view('dashboard.page.unduhan.edit',$this->data);
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
            'nama_file' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $old = $this->unduhClass->find($id);

        if($request->hasFile('file'))
        {
            unlink(public_path('uploads/unduhan/'.$old->file));
            $file = $request->file('file');
            $nama_file = bersih($request->nama_file).'-'.date('d-m-Y').'.pdf';
            $file->move(public_path('uploads/unduhan'),$nama_file);
        }
        
        $edit = Unduh::find($id);
        $edit->nama = $request->nama_file;
        $edit->slug = bersih($request->nama_file);
        if(isset($nama_file)):
            $edit->file = $nama_file;
        endif;
        $edit->keterangan = ($request->keterangan) ? $request->keterangan : '-';
        $edit->save();

        $edit ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/unduhan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->unduhClass->find($id);
        unlink(public_path('uploads/unduhan/'.$delete->file));
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->unduhClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/unduhan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('file', function($data)
            {
                return '<a href="'.asset('/uploads/unduhan/'.$data->file).'" target="_blank" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Dokumen</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','file'])
            ->make(true);
    }
}
