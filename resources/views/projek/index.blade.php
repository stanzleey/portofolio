@extends('layouts.master')

@section('title')
    <title>Clyde - Free Bootstrap 4 Template by Colorlib</title>
@endsection

@section('content')
<section class="ftco-section ftco-project" id="projects-section">
    <div class="container-fluid px-md-4">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Accomplishments</span>
                <h2 class="mb-4">Our Projects</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            @forelse($projek as $index => $item)
                @php
                    $imageUrl = $item->image 
                        ? asset('storage/projek/' . $item->image) 
                        : ($item->image_url ?? 'images/default-project.jpg');
                @endphp
                <div class="col-md-3">
                    <div class="project img shadow ftco-animate d-flex justify-content-center align-items-center" 
                         style="background-image: url('{{ $imageUrl }}');">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">{{ $item->title }}</a></h3>
                            <span>{{ $item->category }}</span>
                        </div>
                    </div>
                </div>
                @if(($index + 1) % 4 == 0 && !$loop->last)
            </div>
            <div class="row mt-4">
                @endif
            @empty
                <!-- Jika tidak ada data, tampilkan placeholder -->
                @for($i = 1; $i <= 8; $i++)
                    <div class="col-md-3">
                        <div class="project img shadow ftco-animate d-flex justify-content-center align-items-center" 
                             style="background-image: url('images/work-{{ $i }}.jpg');">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#">No Project Available</a></h3>
                                <span>Add projects in admin panel</span>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforelse
            
           
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <!-- Script tambahan untuk halaman welcome jika ada -->
    @parent
@endsection