<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class kategoriUnduhan extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = $this->leftJoin('unduhs','unduhs.kategori_unduhan_id','kategori_unduhans.id')
            ->select(
                DB::RAW('count(unduhs.id) as jumlah_file'),
                'kategori_unduhans.id',
                'kategori_unduhans.nama',
                'kategori_unduhans.jenis',
                'kategori_unduhans.updated_at'
            )
            ->orderBy('kategori_unduhans.created_at','desc')
            ->groupBy('kategori_unduhans.id')
            ->get();
        return $data;
    }
}
