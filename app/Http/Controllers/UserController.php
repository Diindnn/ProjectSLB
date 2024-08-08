<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method untuk menampilkan jumlah guru dan orang tua
    public function index()
    {
        // Menghitung jumlah guru dan orang tua dari model User
        $guru = User::where('role', 'guru')->count(); // Menghitung jumlah guru
        $ortu = User::where('role', 'parent')->count(); // Menghitung jumlah orang tua

        // Mengirimkan data ke view 'datauser.datauser'
        return view('datauser.datauser', compact('guru', 'ortu'));
    }

    // Method untuk menampilkan detail akun guru
    public function detailGuru()
    {
        // Mengambil data guru dari model User
        $data = User::where('role', 'guru')->get();

        // Mengirimkan data ke view 'datauser.detailakun-guru'
        return view('datauser.detailakun-guru', compact('data'));
    }

    // Method untuk menampilkan detail akun orang tua
    public function detailOrtu()
    {
        // Mengambil data orang tua dari model User
        $data = User::where('role', 'parent')->get();

        // Mengirimkan data ke view 'datauser.detailakun-ortu'
        return view('datauser.detailakun-ortu', compact('data'));
    }

    // Method untuk menampilkan form tambah data guru
    public function tambahGuru()
    {
        // Menampilkan view 'datauser.tambahdata' dengan jenis 'Guru'
        return view('datauser.tambahdata', ['jenis' => 'Guru']);
    }

    // Method untuk menampilkan form tambah data orang tua
    public function tambahOrtu()
    {
        // Menampilkan view 'datauser.tambahdata' dengan jenis 'Orang Tua'
        return view('datauser.tambahdata', ['jenis' => 'Orang Tua']);
    }

    // Method untuk menyimpan akun yang ditambahkan
    public function simpanAkun(Request $request)
    {
        // Membuat dan menyimpan data baru ke dalam model User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        // Mengarahkan pengguna ke halaman 'datauser' setelah menyimpan
        return redirect('datauser');
    }

    // Method untuk menampilkan form edit akun
    public function editAkun($id)
    {
        // Mengambil data akun berdasarkan ID
        $data = User::whereId($id)->first();

        // Jika data tidak ditemukan, maka pengguna diarahkan kembali ke halaman 'datauser'
        if (!$data) {
            return redirect('datauser');
        }

        // Menampilkan view 'datauser.edit' dengan data akun yang akan di-edit
        return view('datauser.edit', compact('data'));
    }

    // Method untuk menyimpan perubahan pada akun yang di-edit
    public function updateAkun(Request $request)
    {
        // Mengambil data akun berdasarkan ID
        $data = User::whereId($request->id)->first();

        // Jika data ditemukan, maka melakukan update pada data akun
        if ($data) {
            User::whereId($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        // Mengarahkan pengguna ke halaman 'datauser' setelah melakukan update
        return redirect('datauser');
    }

    // Method untuk menghapus akun
    public function hapusAkun(Request $request)
    {
        // Mengambil data akun berdasarkan ID
        $data = User::whereId($request->id)->first();

        // Jika data ditemukan, maka menghapus data akun
        if ($data) {
            User::whereId($request->id)->delete();
        }

        // Mengarahkan pengguna kembali ke halaman sebelumnya setelah menghapus akun
        return redirect()->back();
    }
}

