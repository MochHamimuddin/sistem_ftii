<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'final_project';

    protected $fillable = [
        'nama','deskripsi','berkas_final','status','foto','mahasiswa_id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}