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

Route::get('/', function () {
    return view('layouts.content');
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
