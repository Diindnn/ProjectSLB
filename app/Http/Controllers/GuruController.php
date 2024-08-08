<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Ambil semua data guru dari database
        $data = Guru::all();

        // Tampilkan data guru ke view dataguru
        return view('dataguru.dataguru', compact('data'));
    }

    public function create()
    {
        // Tampilkan halaman untuk menambah data guru
        return view('dataguru.tambahdataguru');
    }

    public function store(Request $request)
    {
        $foto = null;

        // Cek apakah ada file foto yang diunggah
        if ($file_foto = $request->file('foto')) {
            // Simpan foto dengan nama yang unik
            $foto = $request->nama . "." . $file_foto->getClientOriginalExtension();
            $file_foto->move(public_path('images/guru'), $foto);
            $foto = 'images/guru/' . $foto;
        }

        // Periksa apakah email sudah ada sebelumnya
        $existingGuru = Guru::where('email', $request->email)->first();

        if ($existingGuru) {
            // Tangani kesalahan email ganda
            return redirect()->back()->withInput()->withErrors(['email' => 'Email sudah terdaftar sebelumnya']);
        }

        // Periksa apakah NUPTK sudah ada sebelumnya
        $existingNuptk = Guru::where('nuptk', $request->nuptk)->first();

        if ($existingNuptk) {
            // Tangani kesalahan NUPTK ganda
            return redirect()->back()->withInput()->withErrors(['nuptk' => 'NUPTK sudah terdaftar sebelumnya']);
        }

        // Jika email unik, lanjutkan dengan membuat catatan baru
        Guru::create([
            'foto' => $foto,
            'nama' => $request->nama,
            'nuptk' => $request->nuptk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'kelas' => $request->kelas,
            'kelass' => $request->kelass,
            'kelasss' => $request->kelasss,
            'kelassss' => $request->kelassss,
            'email' => $request->email,
        ]);

        // Redirect dengan pesan sukses
        return redirect('dataguru')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Ambil data guru dengan ID tertentu
        $data = Guru::whereId($id)->first();

        if (!$data) {
            return redirect()->back();
        }

        // Tampilkan detail guru
        return view('dataguru.detailguru', compact('data'));
    }

    public function edit($id)
    {
        // Ambil data guru untuk diedit
        $data = Guru::whereId($id)->first();

        if (!$data) {
            return redirect()->back();
        }

        // Tampilkan halaman untuk mengedit data guru
        return view('dataguru.editguru', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $foto = null;

        // Cek apakah ada file foto yang diunggah
        if ($file_foto = $request->file('foto')) {
            // Simpan foto dengan nama yang unik
            $foto = $request->nama . "." . $file_foto->getClientOriginalExtension();
            $file_foto->move(public_path('images/guru'), $foto);
            $foto = 'images/guru/' . $foto;
        }

        // Periksa apakah email sudah ada sebelumnya, kecuali guru saat ini
        $existingGuru = Guru::where('email', $request->email)
            ->where('id', '!=', $id)
            ->first();

        if ($existingGuru) {
            // Tangani kesalahan email ganda
            return redirect()->back()->withInput()->withErrors(['email' => 'Email sudah terdaftar sebelumnya']);
        }

        // Periksa apakah NUPTK sudah ada sebelumnya, kecuali guru saat ini
        $existingNuptk = Guru::where('nuptk', $request->nuptk)
            ->where('id', '!=', $id)
            ->first();

        if ($existingNuptk) {
            // Tangani kesalahan NUPTK ganda
            return redirect()->back()->withInput()->withErrors(['nuptk' => 'NUPTK sudah terdaftar sebelumnya']);
        }

        // Jika email unik, lanjutkan dengan memperbarui catatan
        $guru = Guru::findOrFail($id);
        $guru->update([
            'foto' => $foto ? $foto : $guru->foto,
            'nama' => $request->nama,
            'nuptk' => $request->nuptk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'kelas' => $request->kelas,
            'kelass' => $request->kelass,
            'kelasss' => $request->kelasss,
            'kelassss' => $request->kelassss,
            'email' => $request->email,
        ]);

        // Redirect dengan pesan sukses
        return redirect('dataguru')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Guru::whereId($id)->first();

        if ($data) {
            // Hapus data guru
            Guru::whereId($id)->delete();
        }

        return redirect()->back();
    }

    public function profilGuru()
    {
        // Ambil data guru yang sedang login
        $user = auth()->user();
        $data = Guru::where('email', $user->email)->first();

        if (!$data) {
            return redirect('guru');
        }
        // Tampilkan profil guru
        return view('fitur_guru.profil.profil_guru', compact('data'));
    }
}
