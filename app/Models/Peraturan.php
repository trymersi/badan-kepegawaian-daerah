<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = $this->leftJoin('kategori_peraturans','kategori_peraturans.id','peraturans.kategori_peraturan_id')
            ->select(
                'kategori_peraturans.nama as nama_kategori',
                'peraturans.nomor',
                'peraturans.tahun',
                'peraturans.file',
                'peraturans.tentang',
                'peraturans.id',
                'peraturans.created_at',
                'peraturans.updated_at',
                )
            ->orderBy('peraturans.created_at','desc')
            ->get();
        return $data;
    }
}
