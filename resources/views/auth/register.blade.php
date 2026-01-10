<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
        }

        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .register-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .register-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .register-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .register-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .form-control-icon {
            position: relative;
        }

        .form-control-icon input,
        .form-control-icon select {
            padding-left: 40px;
        }

        .form-control-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
        }

        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            color: white;
        }

        .register-footer {
            text-align: center;
            padding: 20px 30px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            font-size: 14px;
            color: #666;
        }

        .register-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        @media (max-width: 480px) {
            .register-container {
                max-width: 100%;
                border-radius: 0;
            }

            .register-header {
                padding: 30px 20px;
            }

            .register-body {
                padding: 30px 20px;
            }

            .register-footer {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <div class="register-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <h1>Daftar Admin</h1>
            <p>Buat akun admin baru</p>
        </div>

        <div class="register-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password (min 6 karakter)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="bi bi-check-circle"></i> Daftar
                </button>
            </form>
        </div>

        <div class="register-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
