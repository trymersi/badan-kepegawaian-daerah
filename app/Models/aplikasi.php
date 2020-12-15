<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory,SoftDeletes;

    public function getData()
    {
        $data = $this->select(
                'aplikasis.nama',
                'aplikasis.link',
                'aplikasis.updated_at',
                'aplikasis.id',
            )
            ->orderBy('aplikasis.nama','asc')
            ->get();
        return $data;
    }
}
