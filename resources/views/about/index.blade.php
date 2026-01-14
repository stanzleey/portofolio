@extends('layouts.master')

@section('title')
    <title>Clyde - Free Bootstrap 4 Template by Colorlib</title>
@endsection

@section('content')
 @foreach($tentang as $index => $tentang)
	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(assets/images/about-1.jpg);">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">My Intro</span>
								<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Me</h2>
								<p>{{ $tentang->deskripsi }}</p>

								<ul class="about-info mt-4 px-md-0 px-2">
									<li class="d-flex"><span>Name:</span> <span>{{ $tentang->nama }}</span></li>
									<li class="d-flex"><span>Date of birth:</span> <span>{{ $tentang->tempat_tanggal_lahir }}</span></li>
									<li class="d-flex"><span>Address:</span> <span>{{ $tentang->tempat_tinggal }}</span></li>
									<li class="d-flex"><span>Email:</span> <span>{{ $tentang->email }}</span></li>
									<li class="d-flex"><span>Phone: </span> <span>{{ $tentang->no_hp }}</span></li>
								</ul>
							</div>
							<div class="col-md-12">
								<div class="my-interest d-lg-flex w-100">
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-listening"></span>
										</div>
										<div class="text">Music</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-suitcases"></span>
										</div>
										<div class="text">Travel</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-video-player"></span>
										</div>
										<div class="text">Movie</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-football"></span>
										</div>
										<div class="text">Sports</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	    @endforeach
		@endsection

@section('scripts')
    <!-- Script tambahan untuk halaman welcome jika ada -->
    @parent
@endsection