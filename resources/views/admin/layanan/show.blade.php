@extends('admin.layouts.admin')
@section('title', 'Detail Layanan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-info-circle me-2"></i>Detail Layanan
        </h5>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="mb-4">
                    <div class="icon-preview-large mb-3">
                        <i class="{{ $layanan->icon }}"></i>
                    </div>
                    <h3 class="text-primary">{{ $layanan->judul }}</h3>
                    <p class="text-muted">Kode Icon: <code>{{ $layanan->icon }}</code></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <i class="fas fa-align-left me-2"></i>Deskripsi Layanan
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="lead">{{ $layanan->deskripsi }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6><i class="fas fa-calendar-plus me-2"></i>Dibuat</h6>
                                <p class="mb-0">
                                    <i class="far fa-clock me-2"></i>
                                    {{ $layanan->created_at->format('d F Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6><i class="fas fa-calendar-check me-2"></i>Diperbarui</h6>
                                <p class="mb-0">
                                    <i class="far fa-clock me-2"></i>
                                    {{ $layanan->updated_at->format('d F Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.layanan.edit', $layanan) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('admin.layanan.destroy', $layanan) }}" method="POST" 
                              class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection