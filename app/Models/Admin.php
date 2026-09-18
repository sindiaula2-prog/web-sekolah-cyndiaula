<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel di database (opsional, default-nya sudah 'admins')
     */
    protected $table = 'admins';

    /**
     * Kolom yang boleh diisi mass-assignment
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat model di-convert ke array/JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast otomatis — password akan di-hash otomatis setiap kali diisi
     * (Laravel 10.17+)
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}