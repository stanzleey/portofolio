# Panduan Setup Sistem Login & CRUD Admin

Sistem login dan CRUD admin telah berhasil dibuat untuk proyek Laravel Anda. Berikut langkah-langkah untuk menjalankannya:

## 1. Jalankan Migration

Pertama, pastikan database sudah terbuat dan koneksi `.env` sudah benar. Kemudian jalankan:

```bash
php artisan migrate
```

Ini akan membuat tabel `users` dengan kolom `role` yang baru.

## 2. Buat Akun Admin Pertama (Opsional)

Anda bisa membuat akun admin melalui Tinker atau langsung ke register page. Untuk menggunakan Tinker:

```bash
php artisan tinker
```

Kemudian jalankan:

```php
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password123'),
    'role' => 'admin'
]);
```

Atau klik link Register: `http://localhost:8000/register`

## 3. Jalankan Server

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`

## 4. Akses Halaman Login

Buka link login: `http://localhost:8000/login`

## URL-URL yang Tersedia

### Publik:
- `/` - Halaman Welcome
- `/tentang` - Halaman Tentang
- `/login` - Halaman Login Admin
- `/register` - Daftar Admin Baru

### Admin (Harus login terlebih dahulu):
- `/admin/dashboard` - Dashboard Admin
- `/admin/users` - List User (CRUD)
- `/admin/users/create` - Tambah User Baru
- `/admin/users/{id}/edit` - Edit User
- `/admin/users/{id}` - Detail User
- `/admin/users/{id}` (DELETE) - Hapus User

## Fitur yang Tersedia

### 1. **Authentication (Login/Logout)**
- Login dengan email dan password
- Hanya admin yang bisa login
- Logout otomatis

### 2. **Dashboard**
- Menampilkan statistik: Total User, Total Admin, Regular Users
- Menampilkan 5 user terbaru

### 3. **CRUD User**
- **Create**: Tambah user baru dengan role (user/admin)
- **Read**: Lihat list user dengan pagination
- **Update**: Edit data user (nama, email, password, role)
- **Delete**: Hapus user (dengan proteksi agar tidak menghapus admin terakhir)

### 4. **Security**
- Middleware `is_admin` untuk proteksi route admin
- Password di-hash dengan bcrypt
- CSRF protection
- Role-based access control

## File-File yang Dibuat/Dimodifikasi

### Controllers:
- `app/Http/Controllers/AuthController.php` - Menangani login/logout
- `app/Http/Controllers/AdminController.php` - Menangani CRUD user

### Middleware:
- `app/Http/Middleware/IsAdmin.php` - Proteksi route admin

### Models:
- `app/Models/User.php` - Ditambah kolom role dan method isAdmin()

### Routes:
- `routes/web.php` - Routes untuk auth dan admin

### Views:
- `resources/views/auth/login.blade.php` - Form login
- `resources/views/auth/register.blade.php` - Form register
- `resources/views/layouts/admin.blade.php` - Layout dashboard
- `resources/views/admin/dashboard.blade.php` - Dashboard
- `resources/views/admin/users/index.blade.php` - List user
- `resources/views/admin/users/create.blade.php` - Form tambah user
- `resources/views/admin/users/edit.blade.php` - Form edit user
- `resources/views/admin/users/show.blade.php` - Detail user

### Migration:
- `database/migrations/2024_01_10_000001_add_role_to_users_table.php` - Tambah kolom role

## Customization

Anda bisa mengkustomisasi sesuai kebutuhan:

1. **Warna/Styling**: Edit file blade dan CSS di dalam view
2. **Validasi**: Tambahkan rule di controller
3. **Database**: Tambah kolom baru atau relasi
4. **Permission**: Tambah permission system yang lebih kompleks

## Troubleshooting

1. **"Unauthorized access" saat akses admin**: Pastikan user adalah admin
2. **Database error**: Jalankan `php artisan migrate` lagi
3. **CSRF error**: Refresh page atau clear cache browser

---

Sistem sudah siap digunakan! 🎉
