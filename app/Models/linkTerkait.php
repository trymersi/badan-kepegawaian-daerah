<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class LinkTerkait extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->select(
                'link_terkaits.nama',
                'link_terkaits.link',
                'link_terkaits.jenis',
                'link_terkaits.gambar',
                'link_terkaits.updated_at',
                'link_terkaits.id',
            )
            ->orderBy('link_terkaits.nama','asc')
            ->get();
        return $data;
    }
}
