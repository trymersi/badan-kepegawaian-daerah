<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('bidangs','bidangs.id','tupoksis.bidang_id')
            ->leftJoin('sub_bidangs','sub_bidangs.id','tupoksis.sub_bidang_id')
            ->select(
                'bidangs.nama as nama_bidang',
                'sub_bidangs.nama as nama_sub_bidang',
                'tupoksis.id',
                'tupoksis.nama',
                'tupoksis.keterangan',
                'tupoksis.updated_at',
            )
            ->orderBy('tupoksis.created_at','desc')
            ->groupBy('tupoksis.id')
            ->get();
        return $data;

    }
}
