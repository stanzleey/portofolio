<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projek = Projek::paginate(10);
        return view('admin.projek.index', compact('projek'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        return view('admin.projek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Max 2MB
        ]);

        $data = $request->only(['title', 'category']);
        
        // Upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Simpan di storage
            $path = $image->storeAs('public/projek', $imageName);
            
            // Simpan nama file ke database
            $data['image'] = $imageName;
        }

        Projek::create($data);

        return redirect()->route('admin.projek.index')
                         ->with('success', 'Projek berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Projek $projek)
    {
        return view('projek.show', compact('projek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projek $projek)
    {
        return view('admin.projek.edit', compact('projek'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Projek $projek)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'category']);
        
        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($projek->image && Storage::exists('public/projek/' . $projek->image)) {
                Storage::delete('public/projek/' . $projek->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Simpan gambar baru
            $path = $image->storeAs('public/projek', $imageName);
            
            // Update nama file di database
            $data['image'] = $imageName;
        }

        $projek->update($data);

        return redirect()->route('admin.projek.index')
                         ->with('success', 'Projek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Projek $projek)
    {
        // Hapus gambar dari storage jika ada
        if ($projek->image && Storage::exists('public/projek/' . $projek->image)) {
            Storage::delete('public/projek/' . $projek->image);
        }
        
        $projek->delete();

        return redirect()->route('admin.projek.index')
                         ->with('success', 'Projek berhasil dihapus.');
    }
}
