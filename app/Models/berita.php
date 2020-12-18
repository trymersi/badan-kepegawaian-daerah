<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class Berita extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('unduhs','unduhs.berita_id','beritas.id')
            ->select(
                DB::RAW('count(unduhs.id) as total_file'),
                'kategori_beritas.nama as nama_kategori',
                'beritas.id',
                'beritas.judul',
                'beritas.meta_deskripsi',
                'beritas.thumbnail',
                'beritas.updated_at',
                'beritas.slug',
            )
            ->orderBy('beritas.created_at','desc')
            ->groupBy('beritas.id')
            ->get();
        return $data;
    }

    public function getDataHome()
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->select(
                'kategori_beritas.nama as nama_kategori',
                'kategori_beritas.slug as slug_kategori',
                'beritas.id',
                'beritas.judul',
                'beritas.meta_deskripsi',
                'beritas.thumbnail',
                'beritas.updated_at',
                'beritas.slug',
            )
            ->orderBy('beritas.created_at','desc')
            ->groupBy('beritas.id')
            ->limit(6)
            ->get();
        return $data;
    }
}
