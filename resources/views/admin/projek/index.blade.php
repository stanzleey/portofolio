@extends('admin.layouts.admin')

@section('title', 'Kelola Projek')
@section('page-title', 'Kelola Projek')

@section('content')
<div class="page-header">
    <h1><a href="{{ route('admin.projek.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Projek Baru
    </a></h1>
    
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <span>Daftar Projek</span>
           
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projek as $index => $item)
                <tr>
                    <td>{{ ($projek->currentPage() - 1) * $projek->perPage() + $index + 1 }}</td>
                  <!-- Di dalam tabel -->
<td>
    @if($item->image)
        <img src="{{ asset('storage/projek/' . $item->image) }}" 
             alt="{{ $item->title }}" 
             style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
    @elseif($item->image_url)
        <img src="{{ $item->image_url }}" 
             alt="{{ $item->title }}" 
             style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
    @else
        <span class="text-muted">Tidak ada gambar</span>
    @endif
</td>
                    <td>
                        <strong>{{ $item->title }}</strong>
                    </td>
                    <td>
                        <span class=" text-dark">
                            {{ $item->category }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.projek.edit', $item->id) }}" class="btn btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projek.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 32px; color: #ccc;"></i>
                        <p class="mt-2" style="color: #999;">Tidak ada data projek</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($projek->hasPages())
    <div class="card-body border-top">
        <div class="d-flex justify-content-between align-items-center">
            <div style="font-size: 14px; color: #666;">
                Menampilkan {{ $projek->firstItem() }} hingga {{ $projek->lastItem() }} dari {{ $projek->total() }} projek
            </div>
            <div>
                {{ $projek->links() }}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection