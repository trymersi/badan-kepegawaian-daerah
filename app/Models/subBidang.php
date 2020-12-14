<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubBidang extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('bidangs','sub_bidangs.bidang_id','bidangs.id')
            ->select(
                'bidangs.nama as nama_bidang',
                'sub_bidangs.nama',
                'sub_bidangs.keterangan',
                'sub_bidangs.created_at',
                'sub_bidangs.updated_at',
                'sub_bidangs.id',
            )
            ->orderBy('sub_bidangs.created_at','asc')
            ->get();
        return $data;
    }
}
