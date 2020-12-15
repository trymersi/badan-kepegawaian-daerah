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
}
