<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    //
    public function index()
    {
        $tentang = Tentang::all();
        return view('admin.about.index', compact('tentang'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'tempat_tinggal' => 'required'
        ]);

        Tentang::create($request->all());

        return redirect()->route('admin.tentang.index')
            ->with('success', 'Data Tentang berhasil ditambahkan.');
    }

    public function show(Tentang $tentang)
    {
        return view('admin.about.show', compact('tentang'));
    }

    public function edit(Tentang $tentang)
    {
        return view('admin.about.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'tempat_tinggal' => 'required'
        ]);

        $tentang->update($request->all());

        return redirect()->route('admin.tentang.index')
            ->with('success', 'Data Tentang berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        $tentang->delete();

        return redirect()->route('admin.tentang.index')
            ->with('success', 'Data Tentang berhasil dihapus.');
    }
}
