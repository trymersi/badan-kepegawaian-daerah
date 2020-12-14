<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class Bidang extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('sub_bidangs','sub_bidangs.bidang_id','bidangs.id')
            ->select(
                DB::RAW('count(sub_bidangs.id) as total_sub_bidang'),
                'bidangs.nama',
                'bidangs.keterangan',
                'bidangs.updated_at',
                'bidangs.id'
            )
            ->orderBy('bidangs.created_at','desc')
            ->groupBy('bidangs.id')
            ->get();
        return $data;
    }
}
