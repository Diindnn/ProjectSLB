<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'nama', 'nisn', 'jenis_kelamin', 'kelas', 'jenis_kebutuhan', 'alamat', 'nohp', 'nama_orangtua', 'wali_murid'];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }
}
