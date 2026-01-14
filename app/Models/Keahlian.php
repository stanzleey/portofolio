<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'persentase',
        'last_week_percent',
        'last_month_percent',
        'warna',
        'urutan'
    ];

    protected $casts = [
        'persentase' => 'integer',
        'last_week_percent' => 'integer',
        'last_month_percent' => 'integer',
        'urutan' => 'integer'
    ];
}