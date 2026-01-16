@extends('admin.layouts.admin')

@section('title', 'Kelola Tentang')
@section('page-title', 'Kelola Tentang')

@section('content')
<div class="page-header">
    <h1> <a href="{{ route('admin.keahlian.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Keahlian Baru
    </a>
</h1>
   
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <span>Daftar Keahlian</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Persentase</th>
                    <th>Last Week</th>
                    <th>Last Month</th>
                    <th>Warna</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($keahlians as $index => $keahlian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $keahlian->nama }}</strong>
                    </td>
                    <td>{{ $keahlian->persentase }}%</td>
                    <td>{{ $keahlian->last_week_percent }}%</td>
                    <td>{{ $keahlian->last_month_percent }}%</td>
                    <td>
                        <span class="badge bg-light text-dark">{{ $keahlian->warna }}</span>
                    </td>
                    <td>{{ $keahlian->urutan }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.keahlian.show', $keahlian->id) }}" class="btn btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.keahlian.edit', $keahlian->id) }}" class="btn btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.keahlian.destroy', $keahlian->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 32px; color: #ccc;"></i>
                        <p class="mt-2" style="color: #999;">Tidak ada data keahlian</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Script untuk progress circle
        $('.progress .progress-bar').css("width", function() {
            return $(this).attr("aria-valuenow") + "%";
        });
    });
</script>
@endsection