@extends('admin.layouts.admin')

@section('title', 'Kelola Kontak')
@section('page-title', 'Kelola Kontak')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <span>Data Pesan Kontak</span>
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Cari kontak...">
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
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kontaks as $index => $kontak)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $kontak->nama }}</strong>
                    </td>
                    <td>{{ $kontak->email }}</td>
                    <td>{{ Str::limit($kontak->pesan, 50) }}</td>
                    <td>{{ $kontak->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $kontak->id }}" title="Lihat Detail">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 32px; color: #ccc;"></i>
                        <p class="mt-2" style="color: #999;">Tidak ada data kontak</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modals for Detail -->
@foreach($kontaks as $kontak)
<div class="modal fade" id="detailModal{{ $kontak->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $kontak->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $kontak->id }}">Detail Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong><br>{{ $kontak->nama }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email:</strong><br>{{ $kontak->email }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <p><strong>Tanggal:</strong><br>{{ $kontak->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Pesan:</strong></p>
                        <div class="border rounded p-3 bg-light">
                            {{ $kontak->pesan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection