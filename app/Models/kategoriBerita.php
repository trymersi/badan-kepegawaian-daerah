<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class KategoriBerita extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('beritas','beritas.kategori_berita_id','kategori_beritas.id')
            ->select(
                DB::RAW('count(beritas.id) as total_berita'),
                'kategori_beritas.id',
                'kategori_beritas.nama',
                'kategori_beritas.updated_at',
                'kategori_beritas.slug',
            )
            ->orderBy('kategori_beritas.created_at','desc')
            ->groupBy('kategori_beritas.id')
            ->get();
        return $data;
    }
}
