@extends('admin.layouts.admin')

@section('title', 'Tambah Projek Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Projek Baru</h4>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.projek.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Judul Projek <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="category" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" 
                           id="category" name="category" value="{{ old('category') }}" required>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-12">
                    <label for="image" class="form-label">Gambar Projek <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*" required>
                    <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <!-- Preview Image -->
                    <div class="mt-2" id="imagePreview"></div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.projek.index') }}" class="btn btn-secondary">
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
// Preview gambar sebelum upload
document.getElementById('image').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px';
            img.style.maxHeight = '150px';
            img.style.marginTop = '10px';
            img.style.borderRadius = '5px';
            img.style.border = '1px solid #ddd';
            img.style.padding = '3px';
            preview.appendChild(img);
        }
        
        reader.readAsDataURL(this.files[0]);
    }
});
</script>
@endsection