<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        Layanan::create([
            'icon' => 'fa-solid fa-code',
            'judul' => 'Web Development',
            'deskripsi' => 'Layanan pembuatan website profesional dengan teknologi terkini.',
        ]);

        Layanan::create([
            'icon' => 'fa-solid fa-mobile-screen-button',
            'judul' => 'Mobile App',
            'deskripsi' => 'Pengembangan aplikasi mobile untuk Android dan iOS.',
        ]);

        Layanan::create([
            'icon' => 'fa-solid fa-chart-line',
            'judul' => 'Digital Marketing',
            'deskripsi' => 'Strategi pemasaran digital untuk meningkatkan penjualan.',
        ]);

        Layanan::create([
            'icon' => 'fa-solid fa-paintbrush',
            'judul' => 'UI/UX Design',
            'deskripsi' => 'Desain antarmuka yang menarik dan user-friendly.',
        ]);

        Layanan::create([
            'icon' => 'fa-solid fa-server',
            'judul' => 'Cloud Hosting',
            'deskripsi' => 'Layanan hosting dengan keamanan dan kecepatan terbaik.',
        ]);

        Layanan::create([
            'icon' => 'fa-solid fa-shield-halved',
            'judul' => 'Cyber Security',
            'deskripsi' => 'Perlindungan sistem dari serangan siber dan malware.',
        ]);
    }
}