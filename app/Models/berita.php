<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;
class Berita extends Model
{
    use HasFactory;

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

    public function getList()
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
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
            ->paginate(15);
        return $data;
    }

    public function getListByKat($id)
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
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
            ->where('kategori_berita_id',$id)
            ->paginate(15);
        return $data;
    }

    public function getDetail($id)
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
                'kategori_beritas.nama as nama_kategori',
                'kategori_beritas.slug as slug_kategori',
                'kategori_beritas.id as id_kategori',
                'beritas.id',
                'beritas.judul',
                'beritas.meta_deskripsi',
                'beritas.thumbnail',
                'beritas.updated_at',
                'beritas.slug',
                'beritas.konten',
            )
            ->orderBy('beritas.created_at','desc')
            ->where('beritas.slug',$id)
            ->first();
        return $data;
    }

    public function getSebelum($id)
    {
        return $this->where('id','<',$id)->select('id','judul','thumbnail','slug')->first();
    }

    public function getSesudah($id)
    {
        return $this->where('id','>',$id)->select('id','judul','thumbnail','slug')->first();
    }

    public function getListByKatRel($id)
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
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
            ->where('kategori_berita_id',$id)
            ->whereNotIn('beritas.id',[$id])
            ->limit(4)
            ->get();
        return $data;
    }

    public function getRelated($id)
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
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
            ->whereNotIn('beritas.id',[$id])
            ->limit(3)
            ->get();
        return $data;
    }

    public function getDataTajuk()
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
            ->where('beritas.tajuk',1)
            ->limit(10)
            ->get();
        return $data;
    }

    public function getPencarian($id)
    {
        $data = $this->leftJoin('kategori_beritas','kategori_beritas.id','beritas.kategori_berita_id')
            ->leftJoin('users','users.id','beritas.user_id')
            ->select(
                'users.nama as nama_user',
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
            ->where('beritas.judul','LIKE','%'.$id.'%')
            ->paginate(15);
        return $data;
    }
}
