<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal',
        'waktu',
        'lokasi',
        'kuota',
        'poster'
    ];
}
