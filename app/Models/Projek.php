<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    protected $table = 'projek';
    
    protected $fillable = [
        'title',
        'category',

        'image' // Tambahkan ini
    ];

    /**
     * Accessor untuk mendapatkan URL gambar lengkap
     */
    public function getImagePathAttribute()
    {
        if ($this->image) {
            return asset('storage/projek/' . $this->image);
        }
        
        
        
        return asset('images/default-project.jpg');
    }
}