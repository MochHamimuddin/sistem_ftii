<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','foto',
    ] ;
    public function JenisMitra (){
        return $this->hasMany(Mahasiswa::class,'mitra_id');
    }
}