<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unduh extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = $this->leftJoin('beritas','beritas.id','unduhs.berita_id')
            ->leftJoin('kategori_unduhans','kategori_unduhans.id','unduhs.kategori_unduhan_id')
            ->select(
                'kategori_unduhans.nama as nama_kategori',
                'beritas.judul',
                'unduhs.nama',
                'unduhs.file',
                'unduhs.keterangan',
                'unduhs.id',
                'unduhs.created_at',
                'unduhs.updated_at',
                )
            ->orderBy('unduhs.created_at','desc')
            ->get();
        return $data;
    }
}
