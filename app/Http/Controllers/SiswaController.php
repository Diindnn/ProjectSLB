<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();

        return view('datasiswa.datasiswa', compact('data'));
    }

    public function create()
    {
        return view('datasiswa.tambahdatasiswa');
    }

    public function store(Request $request)
    {

         $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'nama' => 'required|string|max:255',
        'nisn' => 'required|numeric|digits_between:1,20|unique:siswas,nisn',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'kelas' => 'required|numeric|max:50',
        'jenis_kebutuhan' => 'nullable|string|max:255',
        'alamat' => 'required|string|max:255',
        'nohp' => 'nullable|string',
        'nama_orangtua' => 'required|string|max:255',
        'wali_murid' => 'required|string|max:255'
    ]);
        $foto = null;

        if ($file_foto = $request->file('foto')) {
            $foto = $request->nama . "." . $file_foto->getClientOriginalExtension();
            $file_foto->move(public_path('images/siswa'), $foto);
            $foto = 'images/siswa/' . $foto;
        }

        // Periksa apakah NISN sudah ada dalam database
        $existingNisn = Siswa::where('nisn', $request->nisn)->first();

        if ($existingNisn) {
            // Handle duplicate NISN error
            return redirect()->back()->withInput()->withErrors(['nisn' => 'NISN sudah terdaftar sebelumnya']);
        }

        // Jika NISN unik, lanjutkan dengan membuat catatan
        Siswa::create([
            'foto' => $foto,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'jenis_kebutuhan' => $request->jenis_kebutuhan,
            'nama_orangtua' => $request->nama_orangtua,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'wali_murid' => $request->wali_murid
        ]);

        return redirect('datasiswa')->with('success', 'Data berhasil ditambahkan.');
    }


    public function show($id)
    {
        $data = Siswa::whereId($id)->first();

        if (!$data) {
            return redirect()->back();
        }

        return view('datasiswa.detailsiswa', compact('data'));
    }

    public function edit($id)
    {
        $data = Siswa::whereId($id)->first();

        if (!$data) {
            return redirect()->back();
        }

        return view('datasiswa.editsiswa', compact('data'));
    }

    public function update(Request $request, $id)
    {

         $request->validate([
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'nama' => 'required|string|max:255',
        'nisn' => 'required|numeric|digits_between:1,20',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'kelas' => 'required|numeric|max:50',
        'jenis_kebutuhan' => 'nullable|string|max:255',
        'alamat' => 'required|string|max:255',
        'nohp' => 'nullable|string',
        'nama_orangtua' => 'required|string|max:255',
        'wali_murid' => 'required|string|max:255'
    ]);
        $data = Siswa::find($id);

        if (!$data) {
            return redirect()->back();
        }

        $foto = $data->foto;

        if ($file_foto = $request->file('foto')) {
            $foto = $request->nama . "." . $file_foto->getClientOriginalExtension();
            $file_foto->move(public_path('images/siswa'), $foto);
            $foto = 'images/siswa/' . $foto;
        }

        // Periksa apakah NISN yang diupdate sudah ada dalam database selain data yang sedang diupdate
        $existingNisn = Siswa::where('nisn', $request->nisn)->where('id', '!=', $id)->first();

        if ($existingNisn) {
            // Handle duplicate NISN error
            return redirect()->back()->withInput()->withErrors(['nisn' => 'NISN sudah terdaftar sebelumnya']);
        }

        // Jika NISN unik, lanjutkan dengan memperbarui catatan
        $data->update([
            'foto' => $foto,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'jenis_kebutuhan' => $request->jenis_kebutuhan,
            'nama_orangtua' => $request->nama_orangtua,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'wali_murid' => $request->wali_murid
        ]);

        return redirect('datasiswa')->with('success', 'Data berhasil diperbarui.');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Siswa::whereId($id)->first();

        if ($data) {
            Siswa::whereId($id)->delete();
        }

        return redirect()->back();
    }
}
