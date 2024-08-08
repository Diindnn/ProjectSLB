<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id', 'perkembangan_id', 'skala', 'catatan'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function perkembangan()
    {
        return $this->belongsTo(Perkembangan::class, 'perkembangan_id');
    }
}
