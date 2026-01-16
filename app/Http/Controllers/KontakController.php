<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KontakController extends Controller
{
    // Menampilkan form kontak
    public function create()
    {
        return view('kontak.create');
    }

    // Menyimpan data kontak
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string'
        ]);

        // Simpan ke database
        $kontak = Kontak::create($validated);

        // Kirim notifikasi ke WhatsApp
        $this->sendWhatsAppNotification($kontak);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim! Kami akan menghubungi Anda segera.'
        ]);
    }
    // Method untuk mengirim notifikasi WhatsApp
    private function sendWhatsAppNotification($kontak)
    {
        // Ganti dengan API WhatsApp yang Anda gunakan
        // Contoh menggunakan API dari Wablas, Twilio, atau API lainnya
        
        $phoneNumber = '6281234567890'; // Nomor WhatsApp tujuan (format: 628...)
        $message = "📨 *Pesan Kontak Baru*\n\n" .
                   "Nama: {$kontak->nama}\n" .
                   "Email: {$kontak->email}\n" .
                   "Pesan: {$kontak->pesan}\n\n" .
                   "Tanggal: " . now()->format('d/m/Y H:i:s');

        // Contoh menggunakan API Wablas
        try {
            Http::post('https://api.wablas.com/api/send-message', [
                'phone' => $phoneNumber,
                'message' => $message,
                'token' => env('WABLAS_API_TOKEN') // Simpan di .env
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }
}
