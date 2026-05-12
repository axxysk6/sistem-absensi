<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
   protected $fillable = [
    'nip',
    'nama',
    'email',
    'telepon',
    'alamat',
];
}
