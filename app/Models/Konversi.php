<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konversi extends Model
{
    use HasFactory;
    protected $table = 'konversi';

    protected $fillable = [
    'dosen_id','mahasiswa_id','mahasiswa_program_id','kategori_konversi_id','nilai_mbkm','nilai_konversi'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mahasiswaProgram()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_program_id');
    }

    public function kategoriKonversi()
    {
        return $this->belongsTo(KategoriKonversi::class, 'kategori_konversi_id');
    }
}