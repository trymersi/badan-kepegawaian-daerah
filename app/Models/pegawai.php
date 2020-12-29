<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('bidangs','bidangs.id','pegawais.bidang_id')
            ->leftJoin('sub_bidangs','sub_bidangs.id','pegawais.sub_bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'sub_bidangs.nama as nama_sub_bidang',
                'pegawais.id',
                'pegawais.nama',
                'pegawais.foto',
                'pegawais.pendidikan',
                'pegawais.jabatan',
                'pegawais.updated_at',
            )
            ->orderBy('pegawais.created_at','desc')
            ->groupBy('pegawais.id')
            ->get();
        return $data;
    }

    public function getKabid()
    {
        $data = $this->leftJoin('bidangs','bidangs.id','pegawais.bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'pegawais.id',
                'pegawais.nama',
                'pegawais.foto',
                'pegawais.pendidikan',
                'pegawais.jabatan',
                'pegawais.updated_at',
            )
            ->orderBy('pegawais.created_at','desc')
            ->groupBy('pegawais.id')
            ->where('pegawais.jabatan',3)
            ->get();
        return $data;
    }

    public function getSubid()
    {
        $data = $this->leftJoin('bidangs','bidangs.id','pegawais.bidang_id')
            ->leftJoin('sub_bidangs','sub_bidangs.id','pegawais.sub_bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'bidangs.id as bidang_id',
                'sub_bidangs.nama as nama_sub_bidang',
                'pegawais.id',
                'pegawais.nama',
                'pegawais.foto',
                'pegawais.pendidikan',
                'pegawais.jabatan',
                'pegawais.updated_at',
            )
            ->orderBy('pegawais.bidang_id','desc')
            ->groupBy('pegawais.id')
            ->where('pegawais.jabatan',4)
            ->get();
        return $data;
    }

    public function getPegawai($id)
    {
        $data = $this->leftJoin('bidangs','bidangs.id','pegawais.bidang_id')
            ->leftJoin('sub_bidangs','sub_bidangs.id','pegawais.sub_bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'bidangs.id as bidang_id',
                'sub_bidangs.nama as nama_sub_bidang',
                'pegawais.id',
                'pegawais.nama',
                'pegawais.foto',
                'pegawais.pendidikan',
                'pegawais.jabatan',
                'pegawais.updated_at',
            )
            ->orderBy('pegawais.bidang_id','desc')
            ->groupBy('pegawais.id')
            ->where('pegawais.id',$id)
            ->first();
        return $data;
    }
}
