<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim','name','jenis_kelamin','semester','alamat', 'email','telpon', 'password','role', 'foto','program_id',
    ];
    public function JenisProgram (){
        return $this->belongsTo(Program::class,'program_id');
    }
    protected $hidden = [
        'remember_token'
    ];
    protected $casts = [
        'email_verified_at'=>'datetime',
    ];
    public function foto()
    {
        if ($this->foto) {
            return asset('admin/images/'. $this->foto);
        }else{
            return asset('admin/images/siska.png');
        }
    }
}