<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $fillable = [
        'deskripsi',
        'nama',
        'tempat_tanggal_lahir',
        'no_hp',
        'email',
        'tempat_tinggal'
    ];
}