@extends('layouts.master')

@section('title')
    <title>Clyde - Free Bootstrap 4 Template by Colorlib</title>
@endsection

@section('content')
 
	<section class="ftco-section bg-light" id="skills-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Skills</span>
                <h2 class="mb-4">My Skills</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        
        <div class="row progress-circle mb-5">
             
        @foreach($keahlians as $keahlian)
            <div class="col-lg-4 mb-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <h2 class="h5 font-weight-bold text-center mb-4">{{ $keahlian->nama }}</h2>
                    <div class="progress mx-auto" data-value='{{ $keahlian->persentase }}'>
                        <span class="progress-left">
                            <span class="progress-bar border-primary"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-primary"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">{{ $keahlian->persentase }}<sup class="small">%</sup></div>
                        </div>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">{{ $keahlian->last_week_percent }} %</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">{{ $keahlian->last_month_percent }}%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
        </div>
    </div>
</section>
	   
		@endsection

@section('scripts')
    <!-- Script tambahan untuk halaman welcome jika ada -->
    @parent
@endsection