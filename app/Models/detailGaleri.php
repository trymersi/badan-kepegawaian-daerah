<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class DetailGaleri extends Model
{
    use HasFactory,SoftDeletes;

    public static function galeriByID($id)
    {
        return DB::Table('detail_galeris')->where('galeri_gambar_id',$id)->orderBy('created_at','asc')->get();
    }
}
