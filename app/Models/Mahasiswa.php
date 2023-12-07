<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim','nama','jenis_kelamin','semester','alamat', 'email','telpon', 'password', 'foto',
    ];
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
