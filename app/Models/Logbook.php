<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table= 'logbook';

    protected $fillable = [
        'tanggal_mulai','tanggal_akhir','status','kegiatan_id','mahasiswa_id','dosen_id'];
}