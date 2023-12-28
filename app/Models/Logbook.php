<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logbook extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table= 'logbook';

    protected $fillable = [
        'deskripsi','tanggal_mulai','tanggal_akhir','status','kegiatan_id','mahasiswa_id','dosen_id'];

        public function kegiatan()
        {
            return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
        }
        public function logbooks()
        {
            return $this->hasMany(Logbook::class);
        }

        public function mahasiswa()
        {
            return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
        }

        public function dosen()
        {
            return $this->belongsTo(Dosen::class, 'dosen_id');
        }
}