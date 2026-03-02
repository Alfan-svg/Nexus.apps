<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman depan
Route::get('/', function () {
    return view('welcome');
});

// =========== ROUTE GUEST (BELUM LOGIN) ===========
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// =========== ROUTE AUTH (SUDAH LOGIN) ===========
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// =========== Index Dashboard ===========

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// =========== Index Aktivitas ===========

Route::get('/aktivitas', function () {
    return view('aktivitas.index');
})->name('aktivitas');

// =========== Detail Aktivitas ===========

Route::get('/aktivitas/detail', function () {
    return view('aktivitas.detail');
})->name('aktivitas.detail');

// =========== Create Aktivitas ===========

Route::get('/aktivitas/create', function () {
    return view('aktivitas.create');
})->name('aktivitas.create');

//=========== Edit Aktivitas ==============

Route::get('/aktivitas/edit', function () {
    return view('aktivitas.edit');
})->name('aktivitas.edit');

//========= Update Aktivitas ===========
Route::get('/aktivitas/update', function () {
    return redirect()->route('aktivitas')->with('success', 'Data event berhasil diperbarui!');
})->name('aktivitas.update');

//========= Delete Aktivitas ===========
Route::get('/aktivitas/delete', function () {
    return redirect()->route('aktivitas')->with('success', 'Aktivitas berhasil dihapus!');
})->name('aktivitas.delete');



// Route Aktivitas Store (Menyimpan data event baru)
Route::post('/aktivitas/store', function (Request $request) {
    // Validasi data
    $validated = $request->validate([
        'nama_event' => 'required',
        'deskripsi' => 'nullable',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required',
        'kuota' => 'required|integer|min:1',
        'poster' => 'nullable|image|max:2048' // max 2MB
    ]);

    // Upload poster jika ada
    if ($request->hasFile('poster')) {
        $path = $request->file('poster')->store('poster-event', 'public');
        $validated['poster'] = $path;
    }

    // Simpan ke database
    Aktivitas::create($validated);

    // Redirect ke halaman aktivitas dengan pesan sukses
    return redirect()->route('aktivitas')->with('success', 'Event berhasil ditambahkan!');
})->name('aktivitas.store');


// Route Pengguna dan Peran (tampilkan semua user)
Route::get('/pengguna', function () {
    $users = User::all(); // Ambil SEMUA user dari database (termasuk yang register)
    return view('pengguna.index', compact('users'));
})->name('pengguna');


// Route untuk menampilkan form tambah user (INI HARUS ADA)
Route::get('/pengguna/create', function () {
    return view('pengguna.create');
})->name('pengguna.create');

// Route untuk menyimpan data user (INI YANG DIPANGGIL FORM)
Route::post('/pengguna', function (Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'telepon' => 'required|string|max:15',
        'password' => 'required|min:6|confirmed',
        'role' => 'required|in:admin,pengguna'
    ]);

    User::create([
        'name' => $validated['nama'],
        'email' => $validated['email'],
        'phone' => $validated['telepon'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role']
    ]);

    return redirect()->route('pengguna')->with('success', 'User berhasil ditambahkan!');
})->name('pengguna.store');

// Route Tampilan Edit User

Route::get('/pengguna/edit', function () {
    return view('pengguna.edit');
})->name('pengguna.edit');

// Route Update User

Route::get('/pengguna/update', function () {
    return redirect()->route('pengguna')->with('success', 'Data user berhasil diperbarui!');
})->name('pengguna.update');

// Route Berhasil Delete User (statis)

Route::get('/pengguna/delete', function () {
    return redirect()->route('pengguna')->with('success', 'User berhasil dihapus!');
})->name('pengguna.delete');