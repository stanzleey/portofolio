<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'status'
    ];

    // Scope untuk pesan belum dibaca
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    // Scope untuk pesan sudah dibaca
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    // Method untuk menandai sebagai sudah dibaca
    public function markAsRead()
    {
        $this->update(['status' => 'read']);
        return $this;
    }

    // Method untuk menandai sebagai belum dibaca
    public function markAsUnread()
    {
        $this->update(['status' => 'unread']);
        return $this;
    }
}