@extends('admin.layouts.admin')

@section('title', 'Daftar Layanan')
@section('page-title', 'Daftar Layanan')

@section('content')
<div class="page-header">
    <h1><a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Layanan
    </a></h1>
    
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <span>Daftar Data Layanan</span>
          
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $index => $layanan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($layanan->icon)
                            <span style="font-size: 20px; color: #667eea;">
                                <i class="{{ $layanan->icon }}"></i>
                            </span>
                        @else
                            <span class="badge bg-secondary">No Icon</span>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $layanan->judul }}</strong>
                    </td>
                    <td>{{ Str::limit($layanan->deskripsi, 100) }}</td>
                    <td>{{ $layanan->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.layanan.edit', $layanan) }}" class="btn btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.layanan.destroy', $layanan) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                    <td colspan="6" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 32px; color: #ccc;"></i>
                        <p class="mt-2" style="color: #999;">Belum ada data layanan</p>
                        <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary mt-2">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Layanan
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($layanans->count() > 0)
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $layanans->links() }}
        </div>
    </div>
    @endif
</div>
@endsection