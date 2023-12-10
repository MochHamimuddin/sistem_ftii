<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'role','foto'
    ];
    protected $hidden = [
        'password','remember_token'
    ];
    protected $casts = [
        'email_verified_at'=>'datetime',
    ];
    public function foto()
    {
        if ($this->foto) {
            return asset('admin/images/'.$this->foto);
        }else{
            return asset('admin/images/profile.png');
        }
    }
}