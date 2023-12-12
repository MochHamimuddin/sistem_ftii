<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;
    protected $table = 'administrasi';
    protected $fillable = [
        'nama','status','tanggal','berkas','mahasiswa_id'
    ];
    public function Adm (){
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id');
    }

}