<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $fillable = ['value']; // Kolom yang dapat diisi secara massal

    // Atau jika Anda ingin menonaktifkan timestamp, tambahkan baris berikut:
    public $timestamps = false;
}
