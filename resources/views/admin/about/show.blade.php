@extends('admin.layouts.admin')

@section('title', 'Detail Data Tentang')
@section('page-title', 'Detail Data Tentang')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-person"></i> Detail Data Tentang</h5>
                    <div>
                        <a href="{{ route('admin.tentang.edit', $tentang->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.tentang.destroy', $tentang->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <p class="text-muted">{{ $tentang->nama }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tempat/Tanggal Lahir</label>
                        <p class="text-muted">{{ $tentang->tempat_tanggal_lahir }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nomor HP</label>
                        <p class="text-muted">{{ $tentang->no_hp }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <p class="text-muted">{{ $tentang->email }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Tempat Tinggal</label>
                        <p class="text-muted">{{ $tentang->tempat_tinggal }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <p class="text-muted">{{ $tentang->deskripsi }}</p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Dibuat Pada</label>
                        <p class="text-muted">{{ $tentang->created_at->format('d F Y H:i:s') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Terakhir Diperbarui</label>
                        <p class="text-muted">{{ $tentang->updated_at->format('d F Y H:i:s') }}</p>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.tentang.edit', $tentang->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit Data
                    </a>
                    <a href="{{ route('admin.tentang.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
