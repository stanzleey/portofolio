<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->paginate(10);
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $icons = $this->getAvailableIcons();
        return view('admin.layanan.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        $icons = $this->getAvailableIcons();
        return view('admin.layanan.edit', compact('layanan', 'icons'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $layanan->update($request->all());

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    private function getAvailableIcons()
    {
        return [
            'fa-solid fa-code' => 'Code (fa-solid fa-code)',
            'fa-solid fa-desktop' => 'Desktop (fa-solid fa-desktop)',
            'fa-solid fa-mobile-screen-button' => 'Mobile (fa-solid fa-mobile-screen-button)',
            'fa-solid fa-paintbrush' => 'Paint Brush (fa-solid fa-paintbrush)',
            'fa-solid fa-chart-line' => 'Chart Line (fa-solid fa-chart-line)',
            'fa-solid fa-magnifying-glass' => 'Search (fa-solid fa-magnifying-glass)',
            'fa-solid fa-bullhorn' => 'Bullhorn (fa-solid fa-bullhorn)',
            'fa-solid fa-shopping-cart' => 'Shopping Cart (fa-solid fa-shopping-cart)',
            'fa-solid fa-database' => 'Database (fa-solid fa-database)',
            'fa-solid fa-shield-halved' => 'Security (fa-solid fa-shield-halved)',
            'fa-solid fa-cloud' => 'Cloud (fa-solid fa-cloud)',
            'fa-solid fa-server' => 'Server (fa-solid fa-server)',
            'fa-solid fa-wifi' => 'WiFi (fa-solid fa-wifi)',
            'fa-solid fa-users' => 'Users (fa-solid fa-users)',
            'fa-solid fa-envelope' => 'Email (fa-solid fa-envelope)',
            'fa-solid fa-phone' => 'Phone (fa-solid fa-phone)',
            'fa-solid fa-gear' => 'Settings (fa-solid fa-gear)',
            'fa-solid fa-rocket' => 'Rocket (fa-solid fa-rocket)',
            'fa-solid fa-lightbulb' => 'Lightbulb (fa-solid fa-lightbulb)',
            'fa-solid fa-graduation-cap' => 'Graduation (fa-solid fa-graduation-cap)',
        ];
    }
}