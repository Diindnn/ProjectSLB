<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PerkembanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home']); // Route untuk halaman utama
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Route untuk menampilkan halaman login
Route::post('/login', [AuthController::class, 'doLogin']); // Route untuk melakukan proses login
Route::get('/logout', [AuthController::class, 'logout']); // Route untuk proses logout

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin']); // Route untuk ke halaman admin

    // Route untuk manajemen pengguna
    Route::get('/datauser', [UserController::class, 'index']);
    Route::get('/detailakun-guru', [UserController::class, 'detailGuru']);
    Route::get('/detailakun-ortu', [UserController::class, 'detailOrtu']);
    Route::get('/tambahakun-guru', [UserController::class, 'tambahGuru']);
    Route::get('/tambahakun-ortu', [UserController::class, 'tambahOrtu']);
    Route::post('/tambahakun', [UserController::class, 'simpanAkun']);
    Route::get('/editakun/{id}', [UserController::class, 'editAkun']);
    Route::post('/updateakun', [UserController::class, 'updateAkun']);
    Route::post('/hapusakun', [UserController::class, 'hapusAkun']);

    // Route untuk manajemen data guru
    Route::get('/dataguru', [GuruController::class, 'index']);
    Route::get('/tambahdataguru', [GuruController::class, 'create'])->name('tambahdataguru');
    Route::post('/simpandataguru', [GuruController::class, 'store']);
    Route::get('/detailguru/{id}', [GuruController::class, 'show'])->name('detailguru');
    Route::get('/editguru/{id}', [GuruController::class, 'edit'])->name('editguru');
    Route::post('/updatedataguru/{id}', [GuruController::class, 'update']);
    Route::post('/hapusdataguru', [GuruController::class, 'delete']);

    // route untuk manajemen data siswa
    Route::get('/datasiswa', [SiswaController::class, 'index']);
    Route::get('/tambahdatasiswa', [SiswaController::class, 'create'])->name('tambahdatasiswa');
    Route::post('/simpandatasiswa', [SiswaController::class, 'store']);
    Route::get('/detailsiswa/{id}', [SiswaController::class, 'show'])->name('detailsiswa');
    Route::get('/editsiswa/{id}', [SiswaController::class, 'edit'])->name('editsiswa');
    Route::post('/updatedatasiswa/{id}', [SiswaController::class, 'update']);
    Route::post('/hapusdatasiswa', [SiswaController::class, 'delete']);
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru', [DashboardController::class, 'guru']); // Route untuk ke halaman guru
    Route::get('/guru/profil', [GuruController::class, 'profilGuru'])->name('profil_guru'); // route untuk halaman profil guru

    // route untuk fitur ansesni siswa
    Route::get('/absensi_siswa', [AbsensiController::class, 'absensiSiswa'])->name('absensi');
    Route::post('/tambahabsensi', [AbsensiController::class, 'tambahAbsensi']);
    Route::post('/updateabsensi', [AbsensiController::class, 'updateAbsensi']);
    Route::post('/hapusabsensi', [AbsensiController::class, 'hapusAbsensi']);
    Route::get('/rekap_absensi', [AbsensiController::class, 'rekapAbsensi'])->name('rekap_absensi');
    Route::get('/rekap_absensi_pdf', [AbsensiController::class, 'rekapAbsensiPdf']);

    //route untuk manajemen perkembangan siswa
    Route::get('/dataperkembangan/{bulan}', [PerkembanganController::class, 'index'])->name('dataperkembangan.index');
    Route::get('/dataperkembangan/{bulan}/tambah', [PerkembanganController::class, 'create'])->name('dataperkembangan.tambah');
    Route::post('/dataperkembangan/{bulan}/tambah', [PerkembanganController::class, 'store']);
    Route::get('/dataperkembangan/{bulan}/laporan', [PerkembanganController::class, 'show']);
    Route::get('/dataperkembangan/{bulan}/laporan-pdf', [PerkembanganController::class, 'exportPdf']);
    Route::get('/dataperkembangan/{bulan}/edit', [PerkembanganController::class, 'edit']);
    Route::post('/dataperkembangan/{bulan}/update', [PerkembanganController::class, 'update']);

    // route untuk menampilkan grafik perkembangan siswa
    Route::get('/grafikperkembangan/{semester}', [PerkembanganController::class, 'grafik']);
});

Route::middleware(['auth', 'role:parent'])->prefix('orangtua')->group(function () {
    Route::get('/', [DashboardController::class, 'orangtua']); // route untuk halaman orang tua

    //route untuk manajemen perkembnagan siswa oleh orang tua
    Route::get('/dataperkembangan/{bulan}', [PerkembanganController::class, 'indexOrtu']);
    Route::get('/dataperkembangan/{bulan}/laporan', [PerkembanganController::class, 'showOrtu']);
    Route::get('/grafikperkembangan/{semester}', [PerkembanganController::class, 'grafikOrtu']);
    Route::get('/dataperkembangan/{bulan}/laporan-pdf', [PerkembanganController::class, 'exportPdf']);
});
