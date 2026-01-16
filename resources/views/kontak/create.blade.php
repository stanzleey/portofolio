@extends('layouts.master')

@section('title')
    <title>Kontak Kami - Clyde</title>
@endsection

@section('content')
<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Hubungi Kami</span>
                <h2 class="mb-4">Ada Proyek untuk Kami?</h2>
                <p>Jangan ragu untuk menghubungi kami. Tim kami akan merespons secepat mungkin.</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-8">
                <form id="kontakForm" class="bg-light p-4 p-md-5 contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda" required>
                                <div class="invalid-feedback" id="nama-error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                                <div class="invalid-feedback" id="email-error"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="pesan" id="pesan" cols="30" rows="7" class="form-control" placeholder="Pesan Anda" required></textarea>
                                <div class="invalid-feedback" id="pesan-error"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5" id="submitBtn">
                                    <span id="submitText">Kirim Pesan</span>
                                    <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>

            <div class="col-md-4 d-flex pl-md-5">
                <div class="row">
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Alamat:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Telepon:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#kontakForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        
        // Show loading state
        $('#submitBtn').prop('disabled', true);
        $('#submitText').text('Mengirim...');
        $('#loadingSpinner').removeClass('d-none');
        
        // Collect form data
        let formData = {
            _token: $('input[name="_token"]').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            pesan: $('#pesan').val()
        };
        
        // Send AJAX request
        $.ajax({
            url: "{{ route('kontak.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                // Show success alert
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message,
                    timer: 3000,
                    showConfirmButton: false
                });
                
                // Reset form
                $('#kontakForm')[0].reset();
                
                // Reset button state
                $('#submitBtn').prop('disabled', false);
                $('#submitText').text('Kirim Pesan');
                $('#loadingSpinner').addClass('d-none');
            },
            error: function(xhr) {
                // Handle validation errors
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '-error').text(value[0]);
                    });
                } else {
                    // Show error alert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                    });
                }
                
                // Reset button state
                $('#submitBtn').prop('disabled', false);
                $('#submitText').text('Kirim Pesan');
                $('#loadingSpinner').addClass('d-none');
            }
        });
    });
});
</script>
@endsection