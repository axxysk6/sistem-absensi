<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;

class Guru extends Model
{
    protected $fillable = [

        'nip',
        'nama',
        'email',
        'telepon',
        'alamat',

    ];
    public function absensi()
{
    return $this->hasMany(Absensi::class);
}
}