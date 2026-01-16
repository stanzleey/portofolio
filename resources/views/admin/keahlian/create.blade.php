@extends('admin.layouts.admin')

@section('title', 'Tambah Keahlian Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Keahlian Baru</h4>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.keahlian.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="nama" class="form-label">Nama Keahlian <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                           id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="persentase" class="form-label">Persentase (%) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('persentase') is-invalid @enderror" 
                           id="persentase" name="persentase" value="{{ old('persentase') }}" 
                           min="0" max="100" required>
                    @error('persentase')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4">
                    <label for="last_week_percent" class="form-label">Last Week (%) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('last_week_percent') is-invalid @enderror" 
                           id="last_week_percent" name="last_week_percent" value="{{ old('last_week_percent') }}" 
                           min="0" max="100" required>
                    @error('last_week_percent')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4">
                    <label for="last_month_percent" class="form-label">Last Month (%) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('last_month_percent') is-invalid @enderror" 
                           id="last_month_percent" name="last_month_percent" value="{{ old('last_month_percent') }}" 
                           min="0" max="100" required>
                    @error('last_month_percent')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="warna" class="form-label">Warna Progress Bar <span class="text-danger">*</span></label>
                    <select class="form-select @error('warna') is-invalid @enderror" 
                            id="warna" name="warna" required>
                        <option value="">Pilih Warna</option>
                        @foreach($warnaOptions as $warna)
                            <option value="{{ $warna }}" 
                                    @if(old('warna') == $warna) selected @endif>
                                {{ $warna }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Contoh: border-primary, border-success, dll</small>
                    @error('warna')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4">
                    <label for="urutan" class="form-label">Urutan Tampil</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                           id="urutan" name="urutan" value="{{ old('urutan', 0) }}" min="0">
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.keahlian.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection