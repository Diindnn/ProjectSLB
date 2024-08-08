<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'minggu', 'bulan', 'tahun'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'perkembangan_id');
    }
}
