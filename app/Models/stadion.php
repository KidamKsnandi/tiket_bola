<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadion extends Model
{
    use HasFactory;

    public function jadwal_pertandingan()
    {
        return $this->hasMany(JadwalPertandingan::class, 'id_stadion');
    }
}
