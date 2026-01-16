<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KontakController extends Controller
{
    // Method untuk menampilkan semua kontak (untuk admin)
    public function index()
    {
        $kontaks = Kontak::latest()->get();
        return view('admin.kontak.index', compact('kontaks'));
    }

}
