@extends('admin.layouts.admin')

@section('title', 'Edit Keahlian')
@section('page-title', 'Edit Keahlian')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Keahlian: {{ $keahlian->nama }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.keahlian.update', $keahlian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Keahlian <span style="color: red;">*</span></label>
                        <input type="text" id="nama" name="nama" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               placeholder="Masukkan nama keahlian" 
                               value="{{ old('nama', $keahlian->nama) }}" 
                               required>
                        @error('nama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="persentase" class="form-label">Persentase (%) <span style="color: red;">*</span></label>
                                <input type="number" id="persentase" name="persentase" 
                                       class="form-control @error('persentase') is-invalid @enderror" 
                                       placeholder="0-100" 
                                       value="{{ old('persentase', $keahlian->persentase) }}" 
                                       min="0" max="100" required>
                                @error('persentase')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_week_percent" class="form-label">Last Week (%) <span style="color: red;">*</span></label>
                                <input type="number" id="last_week_percent" name="last_week_percent" 
                                       class="form-control @error('last_week_percent') is-invalid @enderror" 
                                       placeholder="0-100" 
                                       value="{{ old('last_week_percent', $keahlian->last_week_percent) }}" 
                                       min="0" max="100" required>
                                @error('last_week_percent')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_month_percent" class="form-label">Last Month (%) <span style="color: red;">*</span></label>
                                <input type="number" id="last_month_percent" name="last_month_percent" 
                                       class="form-control @error('last_month_percent') is-invalid @enderror" 
                                       placeholder="0-100" 
                                       value="{{ old('last_month_percent', $keahlian->last_month_percent) }}" 
                                       min="0" max="100" required>
                                @error('last_month_percent')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="warna" class="form-label">Warna Progress Bar <span style="color: red;">*</span></label>
                        <select id="warna" name="warna" 
                                class="form-select @error('warna') is-invalid @enderror" 
                                required>
                            <option value="">-- Pilih Warna --</option>
                            @foreach($warnaOptions as $warna)
                                <option value="{{ $warna }}" 
                                        @if(old('warna', $keahlian->warna) == $warna) selected @endif>
                                    {{ $warna }}
                                </option>
                            @endforeach
                        </select>
                        @error('warna')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="urutan" class="form-label">Urutan Tampil</label>
                        <input type="number" id="urutan" name="urutan" 
                               class="form-control @error('urutan') is-invalid @enderror" 
                               placeholder="Masukkan urutan tampil" 
                               value="{{ old('urutan', $keahlian->urutan) }}" 
                               min="0">
                        @error('urutan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.keahlian.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection