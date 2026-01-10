@extends('layouts.admin')

@section('title', 'Detail User')
@section('page-title', 'Detail User')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-person"></i> Detail User</h5>
                    <div>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 40px; font-weight: bold;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-muted mb-3">{{ $user->email }}</p>
                            <div>
                                <span class="badge @if($user->isAdmin()) bg-danger @else bg-success @endif" style="font-size: 12px; padding: 6px 12px;">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Role</label>
                        <p class="text-muted">{{ ucfirst($user->role) }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Dibuat Pada</label>
                        <p class="text-muted">{{ $user->created_at->format('d F Y H:i:s') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Terakhir Diperbarui</label>
                        <p class="text-muted">{{ $user->updated_at->format('d F Y H:i:s') }}</p>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit User
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
