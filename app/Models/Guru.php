<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru'; // Menyesuaikan nama tabel di database phpMyAdmin
    
    protected $fillable = [
        'nip',
        'nama_guru',
        'mapel',
        'foto',
        'deskripsi',
    ];
}