<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;

class Absensi extends Model
{
    protected $fillable = [
    'guru_id',
    'tanggal',
    'status',
    'jam',
    'foto',
    'keterangan',
];

    public function guru()
{
    return $this->belongsTo(Guru::class);
}
}
