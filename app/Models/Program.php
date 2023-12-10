<?php

namespace App\Models;

use App\Models\Mitra;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','foto','mitra_id',
    ] ;
    public function Kegiatan (){
        return $this->hasMany(Mahasiswa::class,'program_id');
    }
    public function JenisMitra (){
        return $this->belongsTo(Mitra::class,'mitra_id');
    }
}