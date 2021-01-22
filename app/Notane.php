<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notane extends Model
{
    protected $fillable = ['nama_gambar', 'diskripsi', 'lokasi_gambar'];
}
