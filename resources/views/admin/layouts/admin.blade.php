<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

        .main-wrapper {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            overflow-y: auto;
            position: fixed;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            margin-bottom: 30px;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            padding-bottom: 20px;
        }

        .sidebar-header h4 {
            font-weight: 700;
            font-size: 20px;
        }

        .sidebar-nav a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(255,255,255,0.2);
            padding-left: 20px;
        }

        .sidebar-nav a i {
            margin-right: 10px;
        }

        .content-wrapper {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: #333;
            font-weight: 700;
            font-size: 28px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: none;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 12px;
            padding: 6px 12px;
        }

        .alert {
            border: none;
            border-radius: 5px;
        }

        .btn-sm {
            font-size: 12px;
            padding: 5px 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content-wrapper {
                margin-left: 0;
            }

            .main-wrapper {
                flex-direction: column;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h4><i class="bi bi-shield-lock"></i> Admin Panel</h4>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="@if(request()->routeIs('admin.users.*')) active @endif">
                    <i class="bi bi-people"></i> Kelola User
                </a>
                   <a href="{{ route('admin.tentang.index') }}" class="@if(request()->routeIs('admin.users.*')) active @endif">
                    <i class="bi bi-people"></i> Kelola Tentang
                </a>
                   <a href="{{ route('admin.keahlian.index') }}" class="@if(request()->routeIs('admin.users.*')) active @endif">
                    <i class="bi bi-people"></i> Kelola Keahlian
                </a>
                   <a href="{{ route('admin.layanan.index') }}" class="@if(request()->routeIs('admin.layanan.*')) active @endif">
                    <i class="bi bi-people"></i> Kelola Layanan
                </a>
                <hr style="border-color: rgba(255,255,255,0.2)">
                <form action="{{ route('logout') }}" method="POST" style="padding: 0;">
                    @csrf
                    <button type="submit" class="btn btn-link" style="color: white; text-decoration: none; width: 100%; text-align: left; padding: 12px 15px; border: none; display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            <!-- Topbar -->
            <div class="topbar">
                <h5>@yield('page-title', 'Dashboard')</h5>
                <div class="topbar-right">
                    <div class="user-profile">
                        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                        <div>
                            <div style="font-weight: 600; color: #333;">{{ auth()->user()->name }}</div>
                            <div style="font-size: 12px; color: #999;">{{ ucfirst(auth()->user()->role) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="main-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
