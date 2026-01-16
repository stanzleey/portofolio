@extends('admin.layouts.admin')

@section('title')
    <title>Detail Keahlian</title>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Keahlian</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Nama:</strong>
                            <p class="lead">{{ $keahlian->nama }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Persentase:</strong>
                            <p class="lead">{{ $keahlian->persentase }}%</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <strong>Last Week:</strong>
                            <p>{{ $keahlian->last_week_percent }}%</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong>Last Month:</strong>
                            <p>{{ $keahlian->last_month_percent }}%</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong>Warna:</strong>
                            <p><span class="badge bg-light text-dark">{{ $keahlian->warna }}</span></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Urutan:</strong>
                        <p>{{ $keahlian->urutan }}</p>
                    </div>

                    <div class="mb-4">
                        <strong>Dibuat:</strong>
                        <p>{{ $keahlian->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <!-- Preview Keahlian -->
                    <div class="mt-4">
                        <h5>Preview:</h5>
                        <div class="bg-white rounded-lg shadow p-4">
                            <h2 class="h5 font-weight-bold text-center mb-4">{{ $keahlian->nama }}</h2>
                            <div class="progress mx-auto" data-value='{{ $keahlian->persentase }}' 
                                 style="width: 120px; height: 120px;">
                                <span class="progress-left">
                                    <span class="progress-bar {{ $keahlian->warna }}"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar {{ $keahlian->warna }}"></span>
                                </span>
                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                    <div class="h2 font-weight-bold">{{ $keahlian->persentase }}<sup class="small">%</sup></div>
                                </div>
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-6 border-right">
                                    <div class="h4 font-weight-bold mb-0">{{ $keahlian->last_week_percent }}%</div>
                                    <span class="small text-gray">Last week</span>
                                </div>
                                <div class="col-6">
                                    <div class="h4 font-weight-bold mb-0">{{ $keahlian->last_month_percent }}%</div>
                                    <span class="small text-gray">Last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.keahlian.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                        <a href="{{ route('admin.keahlian.edit', $keahlian->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
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