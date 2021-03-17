<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class KategoriPeraturan extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = $this->leftJoin('peraturans','peraturans.kategori_peraturan_id','kategori_peraturans.id')
            ->select(
                DB::RAW('count(peraturans.id) as jumlah_file'),
                'kategori_peraturans.id',
                'kategori_peraturans.nama',
                'kategori_peraturans.updated_at'
            )
            ->orderBy('kategori_peraturans.created_at','desc')
            ->groupBy('kategori_peraturans.id')
            ->get();
        return $data;
    }
}
