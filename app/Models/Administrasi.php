<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;
    protected $table = 'berkas_adm';
    protected $fillable = [
        'mahasiswa_id','kategori_adm_id','tanggal_pengumpulan','berkas','keterangan'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'id');
    }

    public function kategori_adm()
    {
        return $this->belongsTo(KategoriAdm::class,'id');
    }

}
