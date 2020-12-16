<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class GaleriGambar extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('detail_galeris','detail_galeris.galeri_gambar_id','galeri_gambars.id')
            ->select(
                DB::RAW('count(detail_galeris.id) as total_gambar'),
                'galeri_gambars.id',
                'galeri_gambars.nama',
                'galeri_gambars.keterangan',
                'galeri_gambars.gambar',
                'galeri_gambars.updated_at',
            )
            ->orderBy('galeri_gambars.created_at','desc')
            ->groupBy('galeri_gambars.id')
            ->get();
        return $data;
    }
}
