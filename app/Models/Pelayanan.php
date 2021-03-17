<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    public function getData()
    {
        $data = $this->leftJoin('kategori_pelayanans','kategori_pelayanans.id','pelayanans.kategori_pelayanan_id')
            ->select(
                'kategori_pelayanans.nama as nama_kategori',
                'pelayanans.nama',
                'pelayanans.keterangan',
                'pelayanans.dilihat',
                'pelayanans.id',
                'pelayanans.created_at',
                'pelayanans.updated_at',
                )
            ->orderBy('pelayanans.created_at','desc')
            ->get();
        return $data;
    }

    public function getSingle($id)
    {
        $data = $this->leftJoin('kategori_pelayanans','kategori_pelayanans.id','pelayanans.kategori_pelayanan_id')
            ->select(
                'kategori_pelayanans.nama as nama_kategori',
                'pelayanans.nama',
                'pelayanans.keterangan',
                'pelayanans.dilihat',
                'pelayanans.id',
                'pelayanans.created_at',
                'pelayanans.updated_at',
                )
            ->orderBy('pelayanans.created_at','desc')
            ->where('pelayanans.id',$id)
            ->first();
        return $data;
    }
}
