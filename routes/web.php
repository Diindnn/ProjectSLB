<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('layouts.content');
});

Route::get('/', function () {
    return view('layouts.layout_guru.content_guru');
});



Route::get('/welcome', function () {
    return view('welcome');
});


//data guru
Route::get('/dataguru', function () {
    return view('dataguru.dataguru');
});


Route::get('/tambahdataguru', function () {
    return view('dataguru.tambahdataguru');
})->name('tambahdataguru');

Route::get('/detailguru', function () {
    return view('dataguru.detailguru');
})->name('detailguru');

Route::get('/editguru', function () {
    return view('dataguru.editguru');
})->name('editguru');



//data siswa
Route::get('/datasiswa', function () {
    return view('datasiswa.datasiswa');
});

Route::get('/tambahdatasiswa', function () {
    return view('datasiswa.tambahdatasiswa');
})->name('tambahdatasiswa');

Route::get('/detailsiswa', function () {
    return view('datasiswa.detailsiswa');
})->name('detailsiswa');

Route::get('/editsiswa', function () {
    return view('datasiswa.editsiswa');
})->name('editsiswa');

Route::get('/edit', function () {
    return view('datasiswa.edit');
})->name('edit');


//data user
Route::get('/datauser', function () {
    return view('datauser.datauser');
});

Route::get('/detailakun', function () {
    return view('datauser.detailakun');
})->name('detailakun');

Route::get('/edit', function () {
    return view('datauser.edit');
})->name('edit');

Route::get('/tambahdata', function () {
    return view('datauser.tambahdata');
})->name('tambahdata');

//fitur guru


Route::get('/fitur_guru/profil', function () {
    return view('fitur_guru.profil.profil_guru');
})->name('profil_guru');

//absensi
Route::get('/fitur_guru/absensi_siswa/absensi', function () {
    return view('fitur_guru.absensi_siswa.absensi');
})->name('absensi');

Route::get('/fitur_guru/absensi_siswa/rekap_absensi', function () {
    return view('fitur_guru.absensi_siswa.rekap_absensi');
})->name('absensi');

//Dat perkembangan
Route::get('/fitur_guru/data_perkembangan/juli', function () {
    return view('/fitur_guru.data_perkembangan.juli');
})->name('juli');

Route::get('/fitur_guru/data_perkembangan/laporan_juli', function () {
    return view('/fitur_guru.data_perkembangan.laporan_juli');
})->name('laporan_juli');

Route::get('/fitur_guru/data_perkembangan/tambah_data_juli', function () {
    return view('/fitur_guru.data_perkembangan.tambah_data_juli');
})->name('tambah_data_juli');


//GRAFIK PERKEMBANGAN
Route::get('/fitur_guru/grafik/grafik_ganjil', function () {
    return view('fitur_guru.grafik.grafik_ganjil');
})->name('grafik_ganjil');


