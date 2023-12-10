<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','foto',
    ] ;
    public function JenisMitra (){
        return $this->hasMany(Program::class,'mitra_id');
    }
}