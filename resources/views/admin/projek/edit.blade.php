@extends('admin.layouts.admin')

@section('title', 'Edit Projek')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Projek: {{ $projek->title }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projek.update', $projek->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Projek *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $projek->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori *</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" 
                               id="category" name="category" value="{{ old('category', $projek->category) }}" required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Projek</label>
                        
                        <!-- Gambar saat ini -->
                        @if($projek->image)
                        <div class="mb-3">
                            <p>Gambar saat ini:</p>
                            <img src="{{ asset('storage/projek/' . $projek->image) }}" 
                                 alt="{{ $projek->title }}" 
                                 style="max-width: 200px; max-height: 150px; border-radius: 5px; border: 1px solid #ddd;">
                            <p class="text-muted mt-1">{{ $projek->image }}</p>
                        </div>
                        @endif
                        
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <small class="text-muted">
                            Biarkan kosong jika tidak ingin mengubah gambar.<br>
                            Format: JPG, PNG, GIF. Maksimal 2MB
                        </small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Preview Image -->
                        <div class="mt-2" id="imagePreview"></div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.projek.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
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
@endpush
@endsection