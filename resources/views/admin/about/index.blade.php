@extends('admin.layouts.admin')

@section('title', 'Kelola Tentang')
@section('page-title', 'Kelola Tentang')

@section('content')
<div class="page-header">
    <h1><a href="{{ route('admin.tentang.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Data Baru
    </a></h1>
    
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <span>Daftar Data Tentang</span>
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Cari data...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tentang as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $item->nama }}</strong>
                    </td>
                    <td>{{ $item->tempat_tanggal_lahir }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.tentang.show', $item->id) }}" class="btn btn-outline-primary" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.tentang.edit', $item->id) }}" class="btn btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.tentang.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
                        <p class="mt-2" style="color: #999;">Tidak ada data tentang</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
</div>
@endsection