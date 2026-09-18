<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = [
    'judul',
    'isi',
    'gambar',
    'user_id',
    'kategori_artikel_id',
];
}
