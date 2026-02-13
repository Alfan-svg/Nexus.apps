<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✅ TAMBAHKAN INI - kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // ✅ TAMBAHKAN INI - kolom yang disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];
}