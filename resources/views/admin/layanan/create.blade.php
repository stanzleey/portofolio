@extends('admin.layouts.admin')
@section('title', 'Tambah Layanan Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus-circle me-2"></i>Tambah Layanan Baru
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" required
                               placeholder="Contoh: Web Development">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Icon <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i id="icon-preview" class="fas fa-question"></i>
                            </div>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="selected-icon" name="icon" value="{{ old('icon') }}" 
                                   placeholder="Pilih icon di bawah" required readonly>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                          id="deskripsi" name="deskripsi" rows="4" required
                          placeholder="Deskripsikan layanan ini secara detail">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-icons me-2"></i>Pilih Icon
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="icon-search" 
                               placeholder="Cari icon..." onkeyup="searchIcons()">
                    </div>
                    <div class="icon-grid">
                        <div class="row">
                            @foreach($icons as $iconClass => $iconName)
                            <div class="col-md-3 col-sm-4 col-6">
                                <div class="icon-item" data-icon="{{ $iconClass }}" 
                                     onclick="previewIcon('{{ $iconClass }}')">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <i class="{{ $iconClass }}"></i>
                                        </div>
                                        <small>{{ $iconName }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Layanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection