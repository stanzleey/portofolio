@extends('admin.layouts.admin')

@section('title', 'Tambah Layanan Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Layanan Baru</h4>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" name="judul" value="{{ old('judul') }}" required
                           placeholder="Contoh: Web Development">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Icon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i id="icon-preview" class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                               id="selected-icon" name="icon" value="{{ old('icon') }}" 
                               placeholder="Pilih icon di bawah" required readonly>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-12">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="4" required
                              placeholder="Deskripsikan layanan ini secara detail">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-icons"></i> Pilih Icon</h5>
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
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function searchIcons() {
    var input = document.getElementById('icon-search');
    var filter = input.value.toLowerCase();
    var iconItems = document.querySelectorAll('.icon-item');
    
    iconItems.forEach(function(item) {
        var iconName = item.querySelector('small').textContent.toLowerCase();
        if (iconName.includes(filter)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

function previewIcon(iconClass) {
    document.getElementById('icon-preview').className = iconClass;
    document.getElementById('selected-icon').value = iconClass;
}
</script>

<style>
.icon-item {
    padding: 10px;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: all 0.2s;
}

.icon-item:hover {
    background-color: #f8f9fa;
    border-color: #0d6efd;
}

.icon-item i {
    font-size: 1.2rem;
}
</style>
@endsection