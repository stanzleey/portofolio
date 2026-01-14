<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keahlian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    public function index()
    {
        $keahlians = Keahlian::orderBy('urutan', 'asc')->get();
        return view('admin.keahlian.index', compact('keahlians'));
    }

    public function create()
    {
        $warnaOptions = ['border-primary', 'border-success', 'border-danger', 'border-warning', 'border-info', 'border-secondary'];
        return view('admin.keahlian.create', compact('warnaOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'persentase' => 'required|integer|min:0|max:100',
            'last_week_percent' => 'required|integer|min:0|max:100',
            'last_month_percent' => 'required|integer|min:0|max:100',
            'warna' => 'required|string',
            'urutan' => 'nullable|integer'
        ]);

        Keahlian::create($request->all());

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil ditambahkan.');
    }

    public function show(Keahlian $keahlian)
    {
        return view('admin.keahlian.show', compact('keahlian'));
    }

    public function edit(Keahlian $keahlian)
    {
        $warnaOptions = ['border-primary', 'border-success', 'border-danger', 'border-warning', 'border-info', 'border-secondary'];
        return view('admin.keahlian.edit', compact('keahlian', 'warnaOptions'));
    }

    public function update(Request $request, Keahlian $keahlian)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'persentase' => 'required|integer|min:0|max:100',
            'last_week_percent' => 'required|integer|min:0|max:100',
            'last_month_percent' => 'required|integer|min:0|max:100',
            'warna' => 'required|string',
            'urutan' => 'nullable|integer'
        ]);

        $keahlian->update($request->all());

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil diperbarui.');
    }

    public function destroy(Keahlian $keahlian)
    {
        $keahlian->delete();

        return redirect()->route('admin.keahlian.index')
            ->with('success', 'Keahlian berhasil dihapus.');
    }
}