<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama','foto','berkas_kegiatan','status','mitra_id','program_id','mahasiswa_id'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function logbooks()
{
    return $this->hasMany(Logbook::class, 'kegiatan_id');
}
}