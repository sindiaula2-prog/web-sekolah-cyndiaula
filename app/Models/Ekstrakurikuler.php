<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler'; // <--- Sesuaikan dengan nama tabel aslinya di database

    protected $fillable = [
        'nama_ekskul',
        'deskripsi',
        'pembina',
        'logo',
        'guru_id'
    ];
}