<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Konsultasi extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('pertanyaans','pertanyaans.id','konsultasis.pertanyaan_id')
            ->leftJoin('bidangs','bidangs.id','konsultasis.bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'pertanyaans.nama as pertanyaan',
                'konsultasis.id',
                'konsultasis.nama',
                'konsultasis.email',
                'konsultasis.nope',
                'konsultasis.keterangan',
                'konsultasis.status',
            );
            if(Auth::user()->bidang_id != null):
            $data = $data->where('bidang_id',Auth::user()->bidang_id);
            endif;
            $data = $data->orderBy('konsultasis.created_at','desc')
            ->get();
        return $data;
    }

    public function getEdit($id)
    {
        $data = $this->leftJoin('pertanyaans','pertanyaans.id','konsultasis.pertanyaan_id')
            ->leftJoin('bidangs','bidangs.id','konsultasis.bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'pertanyaans.nama as pertanyaan',
                'konsultasis.id',
                'konsultasis.nama',
                'konsultasis.email',
                'konsultasis.nope',
                'konsultasis.keterangan',
                'konsultasis.status',
            )
            ->orderBy('konsultasis.created_at','desc')
            ->where('konsultasis.id',$id)
            ->first();
        return $data;
    }
}
