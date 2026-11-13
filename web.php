<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// MIDDLEWARE (auth): wajib login
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // AUTHORIZATION (role): Mahasiswa, hanya data miliknya sendiri
    Route::get('/mahasiswa/data', fn () => view('halaman', [
        'judul' => 'Data Mahasiswa (milik sendiri)',
        'isi'   => 'Nama: ' . auth()->user()->name . ' | Email: ' . auth()->user()->email,
    ]))->middleware('role:mahasiswa')->name('mahasiswa.data');

    // AUTHORIZATION (role): menu Dosen Wali
    Route::get('/dosen-wali/perwalian', fn () => view('halaman', [
        'judul' => 'Menu Dosen Wali',
        'isi'   => 'Halaman perwalian mahasiswa bimbingan.',
    ]))->middleware('role:dosen_wali,kaprodi')->name('dosen.perwalian');

    // AUTHORIZATION (role): menu khusus Kaprodi
    Route::get('/kaprodi/laporan', fn () => view('halaman', [
        'judul' => 'Menu Kaprodi',
        'isi'   => 'Halaman laporan program studi.',
    ]))->middleware('role:kaprodi')->name('kaprodi.laporan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';