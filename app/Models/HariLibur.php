<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HariLibur extends Model
{
     protected $fillable = [
        'nama_libur',
        'tanggal',
        'keterangan',
    ];
}
