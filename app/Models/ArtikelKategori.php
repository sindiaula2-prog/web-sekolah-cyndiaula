<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelKategori extends Model
{
    protected $table = 'artikel_kategori';

    protected $fillable = [
        'nama_kategori',
    ];
}