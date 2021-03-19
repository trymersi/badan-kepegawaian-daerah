<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class SurveyController extends Controller
{
    private $data;
    private $survey;


    public function __construct()
    {
        $this->survey = new Survey;

        $this->data = [
            'category_name' => 'Survey',
            'main_url' => 'survey',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data Survey';
        return view('dashboard.page.survey.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function table(Request $request)
    {   
        
        $data = $this->survey->orderBy('created_at','desc')->get();
            return DataTables::of($data)
            ->addColumn('tanggal', function($data)
            {
                return  tgl_indo($data->created_at);
            })
            ->addColumn('jk', function($data)
            {
                return $data->jk == 1 ? "<span class='label label-primary'>Wanita</span>" : "<span class='label label-success'>Pria</span>";
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','jk'])
            ->make(true);
    }
}
