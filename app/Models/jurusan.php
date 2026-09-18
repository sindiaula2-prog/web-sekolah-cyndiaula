<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = [
        'kode',
        'nama_jurusan',
        'deskripsi',
        'singkatan',
        'logo',
        'kompetensi',
        'prospek_karir',
        'kaprodi_nama',
        'kaprodi_gelar',
        'kaprodi_foto',
    ];

    protected $casts = [
        'kompetensi' => 'array',
        'prospek_karir' => 'array',
    ];
}