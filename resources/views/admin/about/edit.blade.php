@extends('admin.layouts.admin')

@section('title', 'Edit Data Tentang')
@section('page-title', 'Edit Data Tentang')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Data Tentang</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tentang.update', $tentang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                               placeholder="Masukkan nama lengkap" value="{{ old('nama', $tentang->nama) }}" required>
                        @error('nama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Tempat/Tanggal Lahir <span style="color: red;">*</span></label>
                        <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror" 
                               placeholder="Contoh: Jakarta, 01 Januari 1990" value="{{ old('tempat_tanggal_lahir', $tentang->tempat_tanggal_lahir) }}" required>
                        @error('tempat_tanggal_lahir')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp" class="form-label">Nomor HP <span style="color: red;">*</span></label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" 
                                       placeholder="Masukkan nomor HP" value="{{ old('no_hp', $tentang->no_hp) }}" required>
                                @error('no_hp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="Masukkan email" value="{{ old('email', $tentang->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tempat_tinggal" class="form-label">Tempat Tinggal <span style="color: red;">*</span></label>
                        <textarea id="tempat_tinggal" name="tempat_tinggal" class="form-control @error('tempat_tinggal') is-invalid @enderror" 
                                  rows="3" placeholder="Masukkan tempat tinggal" required>{{ old('tempat_tinggal', $tentang->tempat_tinggal) }}</textarea>
                        @error('tempat_tinggal')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi <span style="color: red;">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                  rows="5" placeholder="Masukkan deskripsi" required>{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.tentang.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
