<?php

namespace App\Models;

use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Administrasi;
use App\Models\KategoriAdm;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim', 'name', 'jenis_kelamin', 'semester', 'alamat', 'email', 'telpon', 'password', 'role', 'foto', 'program_id',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'mahasiswa_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function kategori_adm()
    {
        return $this->belongsToMany(KategoriAdm::class, 'berkas_adm', 'mahasiswa_id', 'kategori_adm_id');
    }

    public function administrasis()
    {
        return $this->hasMany(Administrasi::class, 'mahasiswa_id');
    }

    public function foto()
    {
        if ($this->foto) {
            return asset('admin/images/' . $this->foto);
        } else {
            return asset('admin/images/siska.png');
        }
    }
}
