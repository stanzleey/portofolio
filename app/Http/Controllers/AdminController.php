<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Layanan;
use App\Models\Projek;
use App\Models\Tentang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display dashboard
     */
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalTentang = Tentang::count();
        $totalKeahlians = Keahlian::count();
        $totalProjek = Projek::count();
         $totalLayanans = Layanan::count();
        
        $totalAdmins = User::where('role', 'admin')->count();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalTentang' => $totalTentang,
            'totalKeahlians' => $totalKeahlians,
            'totalLayanans' => $totalLayanans,

            'totalProjek' => $totalProjek,
            'recentUsers' => $recentUsers,
        ]);
    }

    /**
     * Display all users
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show create user form
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store new user
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Show edit user form
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        // Prevent deleting the last admin
        if ($user->isAdmin() && User::where('role', 'admin')->count() === 1) {
            return back()->with('error', 'Tidak dapat menghapus satu-satunya admin!');
        }

        $user->delete();
        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil dihapus!');
    }

    /**
     * Show user details
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
