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

Route::get('/login', function () {
    return view('layouts.Login.halamanLogin');
});

Route::get('/', function () {
    return view('layouts.layout_guru.content_guru');
});


Route::get('/orangtua', function () {
    return view('layouts.layout_orangtua.content_orangtua');
});




Route::get('/welcome', function () {
    return view('welcome');
});

//------------ADMIN--------------------
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


//------------GURU--------------------

//profil guru
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

//----DATA PERKEMBANGAN (GURU)---

//Route untuk bulan juli
Route::get('/fitur_guru/data_perkembangan/bulan_juli/juli', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juli.juli');
})->name('juli');

Route::get('/fitur_guru/data_perkembangan/bulan_juli/laporan_juli', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juli.laporan_juli');
})->name('laporan_juli');

Route::get('/fitur_guru/data_perkembangan/bulan_juli/tambah_data_juli', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juli.tambah_data_juli');
})->name('tambah_data_juli');

Route::get('/fitur_guru/data_perkembangan/bulan_juli/edit_data_juli', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juli.edit_data_juli');
})->name('edit_data_juli');


// Route untuk bulan Agustus
Route::get('/fitur_guru/data_perkembangan/bulan_agustus/agustus', function () {
    return view('/fitur_guru.data_perkembangan.bulan_agustus.agustus');
})->name('agustus');

Route::get('/fitur_guru/data_perkembangan/bulan_agustus/laporan_agustus', function () {
    return view('/fitur_guru.data_perkembangan.bulan_agustus.laporan_agustus');
})->name('laporan_agustus');

Route::get('/fitur_guru/data_perkembangan/bulan_agustus/tambah_data_agustus', function () {
    return view('/fitur_guru.data_perkembangan.bulan_agustus.tambah_data_agustus');
})->name('tambah_data_agustus');

Route::get('/fitur_guru/data_perkembangan/bulan_agustus/edit_data_agustus', function () {
    return view('/fitur_guru.data_perkembangan.bulan_agustus.edit_data_agustus');
})->name('edit_data_agustus');


// Route untuk bulan September
Route::get('/fitur_guru/data_perkembangan/bulan_september/september', function () {
    return view('/fitur_guru.data_perkembangan.bulan_september.september');
})->name('september');

Route::get('/fitur_guru/data_perkembangan/bulan_september/laporan_september', function () {
    return view('/fitur_guru.data_perkembangan.bulan_september.laporan_september');
})->name('laporan_september');

Route::get('/fitur_guru/data_perkembangan/bulan_september/tambah_data_september', function () {
    return view('/fitur_guru.data_perkembangan.bulan_september.tambah_data_september');
})->name('tambah_data_september');

Route::get('/fitur_guru/data_perkembangan/bulan_september/edit_data_september', function () {
    return view('/fitur_guru.data_perkembangan.bulan_september.edit_data_september');
})->name('edit_data_september');


// Route untuk bulan Oktober
Route::get('/fitur_guru/data_perkembangan/bulan_oktober/oktober', function () {
    return view('/fitur_guru.data_perkembangan.bulan_oktober.oktober');
})->name('oktober');

Route::get('/fitur_guru/data_perkembangan/bulan_oktober/laporan_oktober', function () {
    return view('/fitur_guru.data_perkembangan.bulan_oktober.laporan_oktober');
})->name('laporan_oktober');

Route::get('/fitur_guru/data_perkembangan/bulan_oktober/tambah_data_oktober', function () {
    return view('/fitur_guru.data_perkembangan.bulan_oktober.tambah_data_oktober');
})->name('tambah_data_oktober');

Route::get('/fitur_guru/data_perkembangan/bulan_oktober/edit_data_oktober', function () {
    return view('/fitur_guru.data_perkembangan.bulan_oktober.edit_data_oktober');
})->name('edit_data_oktober');


// Route untuk bulan November
Route::get('/fitur_guru/data_perkembangan/bulan_november/november', function () {
    return view('/fitur_guru.data_perkembangan.bulan_november.november');
})->name('november');

Route::get('/fitur_guru/data_perkembangan/bulan_november/laporan_november', function () {
    return view('/fitur_guru.data_perkembangan.bulan_november.laporan_november');
})->name('laporan_november');

Route::get('/fitur_guru/data_perkembangan/bulan_november/tambah_data_november', function () {
    return view('/fitur_guru.data_perkembangan.bulan_november.tambah_data_november');
})->name('tambah_data_november');

Route::get('/fitur_guru/data_perkembangan/bulan_november/edit_data_november', function () {
    return view('/fitur_guru.data_perkembangan.bulan_november.edit_data_november');
})->name('edit_data_november');


// Route untuk bulan Desember
Route::get('/fitur_guru/data_perkembangan/bulan_desember/desember', function () {
    return view('/fitur_guru.data_perkembangan.bulan_desember.desember');
})->name('desember');

Route::get('/fitur_guru/data_perkembangan/bulan_desember/laporan_desember', function () {
    return view('/fitur_guru.data_perkembangan.bulan_desember.laporan_desember');
})->name('laporan_desember');

Route::get('/fitur_guru/data_perkembangan/bulan_desember/tambah_data_desember', function () {
    return view('/fitur_guru.data_perkembangan.bulan_desember.tambah_data_desember');
})->name('tambah_data_desember');

Route::get('/fitur_guru/data_perkembangan/bulan_desember/edit_data_desember', function () {
    return view('/fitur_guru.data_perkembangan.bulan_desember.edit_data_desember');
})->name('edit_data_desember');


// Route untuk bulan Januari
Route::get('/fitur_guru/data_perkembangan/bulan_januari/januari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_januari.januari');
})->name('januari');

Route::get('/fitur_guru/data_perkembangan/bulan_januari/laporan_januari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_januari.laporan_januari');
})->name('laporan_januari');

Route::get('/fitur_guru/data_perkembangan/bulan_januari/tambah_data_januari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_januari.tambah_data_januari');
})->name('tambah_data_januari');

Route::get('/fitur_guru/data_perkembangan/bulan_januari/edit_data_januari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_januari.edit_data_januari');
})->name('edit_data_januari');


// Route untuk bulan Februari
Route::get('/fitur_guru/data_perkembangan/bulan_februari/februari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_februari.februari');
})->name('februari');

Route::get('/fitur_guru/data_perkembangan/bulan_februari/laporan_februari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_februari.laporan_februari');
})->name('laporan_februari');

Route::get('/fitur_guru/data_perkembangan/bulan_februari/tambah_data_februari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_februari.tambah_data_februari');
})->name('tambah_data_februari');

Route::get('/fitur_guru/data_perkembangan/bulan_februari/edit_data_februari', function () {
    return view('/fitur_guru.data_perkembangan.bulan_februari.edit_data_februari');
})->name('edit_data_februari');


// Route untuk bulan Maret
Route::get('/fitur_guru/data_perkembangan/bulan_maret/maret', function () {
    return view('/fitur_guru.data_perkembangan.bulan_maret.maret');
})->name('maret');

Route::get('/fitur_guru/data_perkembangan/bulan_maret/laporan_maret', function () {
    return view('/fitur_guru.data_perkembangan.bulan_maret.laporan_maret');
})->name('laporan_maret');

Route::get('/fitur_guru/data_perkembangan/bulan_maret/tambah_data_maret', function () {
    return view('/fitur_guru.data_perkembangan.bulan_maret.tambah_data_maret');
})->name('tambah_data_maret');

Route::get('/fitur_guru/data_perkembangan/bulan_maret/edit_data_maret', function () {
    return view('/fitur_guru.data_perkembangan.bulan_maret.edit_data_maret');
})->name('edit_data_maret');

// Route untuk bulan April
Route::get('/fitur_guru/data_perkembangan/bulan_april/april', function () {
    return view('/fitur_guru.data_perkembangan.bulan_april.april');
})->name('april');

Route::get('/fitur_guru/data_perkembangan/bulan_april/laporan_april', function () {
    return view('/fitur_guru.data_perkembangan.bulan_april.laporan_april');
})->name('laporan_april');

Route::get('/fitur_guru/data_perkembangan/bulan_april/tambah_data_april', function () {
    return view('/fitur_guru.data_perkembangan.bulan_april.tambah_data_april');
})->name('tambah_data_april');

Route::get('/fitur_guru/data_perkembangan/bulan_april/edit_data_april', function () {
    return view('/fitur_guru.data_perkembangan.bulan_april.edit_data_april');
})->name('edit_data_april');


// Route untuk bulan Mei
Route::get('/fitur_guru/data_perkembangan/bulan_mei/mei', function () {
    return view('/fitur_guru.data_perkembangan.bulan_mei.mei');
})->name('mei');

Route::get('/fitur_guru/data_perkembangan/bulan_mei/laporan_mei', function () {
    return view('/fitur_guru.data_perkembangan.bulan_mei.laporan_mei');
})->name('laporan_mei');

Route::get('/fitur_guru/data_perkembangan/bulan_mei/tambah_data_mei', function () {
    return view('/fitur_guru.data_perkembangan.bulan_mei.tambah_data_mei');
})->name('tambah_data_mei');

Route::get('/fitur_guru/data_perkembangan/bulan_mei/edit_data_mei', function () {
    return view('/fitur_guru.data_perkembangan.bulan_mei.edit_data_mei');
})->name('edit_data_mei');


// Route untuk bulan Juni
Route::get('/fitur_guru/data_perkembangan/bulan_juni/juni', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juni.juni');
})->name('juni');

Route::get('/fitur_guru/data_perkembangan/bulan_juni/laporan_juni', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juni.laporan_juni');
})->name('laporan_juni');

Route::get('/fitur_guru/data_perkembangan/bulan_juni/tambah_data_juni', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juni.tambah_data_juni');
})->name('tambah_data_juni');

Route::get('/fitur_guru/data_perkembangan/bulan_juni/edit_data_juni', function () {
    return view('/fitur_guru.data_perkembangan.bulan_juni.edit_data_juni');
})->name('edit_data_juni');


//GRAFIK PERKEMBANGAN (GURU)
Route::get('/fitur_guru/grafik/grafik_ganjil', function () {
    return view('fitur_guru.grafik.grafik_ganjil');
})->name('grafik_ganjil');

Route::get('/fitur_guru/grafik/grafik_genap', function () {
    return view('fitur_guru.grafik.grafik_genap');
})->name('grafik_genap');



//----DATA PERKEMBANGAN (ORANGTUA)---

//Route untuk bulan juli
Route::get('/fitur_orangtua/data_perkembangan/bulan_juli/juli', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_juli.juli');
})->name('juli');

Route::get('/fitur_orangtua/data_perkembangan/bulan_juli/laporan_juli', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_juli.laporan_juli');
})->name('laporan_juli');


// Route untuk bulan Agustus
Route::get('/fitur_orangtua/data_perkembangan/bulan_agustus/agustus', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_agustus.agustus');
})->name('agustus');

Route::get('/fitur_orangtua/data_perkembangan/bulan_agustus/laporan_agustus', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_agustus.laporan_agustus');
})->name('laporan_agustus');


// Route untuk bulan September
Route::get('/fitur_orangtua/data_perkembangan/bulan_september/september', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_september.september');
})->name('september');

Route::get('/fitur_orangtua/data_perkembangan/bulan_september/laporan_september', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_september.laporan_september');
})->name('laporan_september');


// Route untuk bulan Oktober
Route::get('/fitur_orangtua/data_perkembangan/bulan_oktober/oktober', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_oktober.oktober');
})->name('oktober');

Route::get('/fitur_orangtua/data_perkembangan/bulan_oktober/laporan_oktober', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_oktober.laporan_oktober');
})->name('laporan_oktober');


// Route untuk bulan November
Route::get('/fitur_orangtua/data_perkembangan/bulan_november/november', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_november.november');
})->name('november');

Route::get('/fitur_orangtua/data_perkembangan/bulan_november/laporan_november', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_november.laporan_november');
})->name('laporan_november');


// Route untuk bulan Desember
Route::get('/fitur_orangtua/data_perkembangan/bulan_desember/desember', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_desember.desember');
})->name('desember');

Route::get('/fitur_orangtua/data_perkembangan/bulan_desember/laporan_desember', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_desember.laporan_desember');
})->name('laporan_desember');


// Route untuk bulan Januari
Route::get('/fitur_orangtua/data_perkembangan/bulan_januari/januari', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_januari.januari');
})->name('januari');

Route::get('/fitur_orangtua/data_perkembangan/bulan_januari/laporan_januari', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_januari.laporan_januari');
})->name('laporan_januari');


// Route untuk bulan Februari
Route::get('/fitur_orangtua/data_perkembangan/bulan_februari/februari', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_februari.februari');
})->name('februari');

Route::get('/fitur_orangtua/data_perkembangan/bulan_februari/laporan_februari', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_februari.laporan_februari');
})->name('laporan_februari');


// Route untuk bulan Maret
Route::get('/fitur_orangtua/data_perkembangan/bulan_maret/maret', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_maret.maret');
})->name('maret');

Route::get('/fitur_orangtua/data_perkembangan/bulan_maret/laporan_maret', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_maret.laporan_maret');
})->name('laporan_maret');


// Route untuk bulan April
Route::get('/fitur_orangtua/data_perkembangan/bulan_april/april', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_april.april');
})->name('april');

Route::get('/fitur_orangtua/data_perkembangan/bulan_april/laporan_april', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_april.laporan_april');
})->name('laporan_april');


// Route untuk bulan Mei
Route::get('/fitur_orangtua/data_perkembangan/bulan_mei/mei', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_mei.mei');
})->name('mei');

Route::get('/fitur_orangtua/data_perkembangan/bulan_mei/laporan_mei', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_mei.laporan_mei');
})->name('laporan_mei');


// Route untuk bulan Juni
Route::get('/fitur_orangtua/data_perkembangan/bulan_juni/juni', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_juni.juni');
})->name('juni');

Route::get('/fitur_guru/data_perkembangan/bulan_juni/laporan_juni', function () {
    return view('/fitur_orangtua.data_perkembangan.bulan_juni.laporan_juni');
})->name('laporan_juni');


//GRAFIK PERKEMBANGAN orangtua
Route::get('/fitur_orangtua/grafik/grafik_ganjil', function () {
    return view('fitur_orangtua.grafik.grafik_ganjil');
})->name('grafik_ganjil');

Route::get('/fitur_orangtua/grafik/grafik_genap', function () {
    return view('fitur_orangtua.grafik.grafik_genap');
})->name('grafik_genap');
