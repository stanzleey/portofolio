@extends('layouts.master')

@section('title')
    <title>Clyde - Free Bootstrap 4 Template by Colorlib</title>
@endsection

@section('content')

<section class="ftco-section" id="services-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">I am grat at</span>
                <h2 class="mb-4">We do awesome services for our clients</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>

        <div class="row">
            @forelse($layanans as $layanan)
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <!-- Ganti span dengan icon dari database -->
                        <i class="{{ $layanan->icon }} fa-2x"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">{{ $layanan->judul }}</h3>
                        <p>{{ $layanan->deskripsi }}</p>
                    </div>
                </div> 
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada layanan tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
	 
@endsection

@section('scripts')
    <!-- Script tambahan untuk halaman welcome jika ada -->
    @parent
@endsection