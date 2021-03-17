<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class KategoriPelayanan extends Model
{
    use HasFactory;
    
    public static function getListPelayanan($id)
    {
        $data = DB::table('pelayanans')->where('kategori_pelayanan_id',$id)->get();
        return $data;
    }

    public static function getListPelayananCount($id)
    {
        $data = DB::table('pelayanans')->where('kategori_pelayanan_id',$id)->count();
        return $data;
    }


    public static function getPar($id)
    {
        $data = DB::table('kategori_pelayanans')->where('parent',$id)
            ->get();
        return $data;
    }

    public static function getParCount($id)
    {
        $data = DB::table('kategori_pelayanans')->where('parent',$id)
            ->count();
        return $data;
    }

}
