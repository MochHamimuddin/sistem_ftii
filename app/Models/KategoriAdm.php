<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAdm extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'kategori_adm';

    protected $fillable = [
        'nama','tanggal_mulai','tanggal_akhir','status',
    ];
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kategori_adm_id');
    }
}