<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class AbsensiController extends Controller
{
    // Fungsi untuk menampilkan halaman absensi siswa
    public function absensiSiswa(Request $request)
    {
        $datakelas = $this->getKelas(); // Mendapatkan daftar kelas yang diajar oleh guru yang sedang login

        if (!$datakelas) {
            return redirect('guru'); // Jika tidak ada kelas yang ditemukan, arahkan kembali ke halaman guru
        }

        // Mendapatkan nilai kelas dari request atau menggunakan kelas pertama dari daftar kelas
        $kelas = $request->kelas ?? $datakelas[0];
        // Mendapatkan nilai tanggal dari request atau menggunakan tanggal saat ini
        $tanggal = $request->tanggal ?? date('Y-m-d');

        // Mengambil data siswa beserta status absensinya untuk kelas dan tanggal tertentu
        $siswa = Siswa::leftJoin('absensis', function ($join) use ($tanggal) {
            $join->on('siswas.id', '=', 'absensis.siswa_id')->where('absensis.tanggal', '=', $tanggal);
        })
            ->where('siswas.kelas', $kelas) // Filter berdasarkan kelas
            ->select('siswas.*', 'absensis.status') // Pilih semua kolom dari tabel siswa dan status dari tabel absensi
            ->get();

        // Mengembalikan view absensi dengan data kelas, tanggal, dan siswa
        return view('fitur_guru.absensi_siswa.absensi', compact('datakelas', 'kelas', 'tanggal', 'siswa'));
    }

    // Fungsi untuk menambahkan data absensi
    public function tambahAbsensi(Request $request)
    {
        $tanggal = $request->tanggal; // Mendapatkan nilai tanggal dari request
        $siswa = $request->siswa; // Mendapatkan daftar ID siswa dari request
        $status = $request->status; // Mendapatkan daftar status dari request

        // Loop untuk setiap siswa dan menyimpan status absensinya
        foreach ($siswa as $i => $id) {
            $s = $status[$i]; // Mendapatkan status absensi untuk siswa saat ini

            // Membuat data absensi baru
            Absensi::create([
                'siswa_id' => $id,
                'tanggal' => $tanggal,
                'status' => $s,
            ]);
        }

        return redirect()->back(); // Mengarahkan kembali ke halaman sebelumnya
    }

    // Fungsi untuk memperbarui data absensi
    public function updateAbsensi(Request $request)
    {
        $siswaId = $request->id; // Mendapatkan ID siswa dari request
        $tanggal = $request->tanggal; // Mendapatkan tanggal dari request
        $status = $request->status; // Mendapatkan status dari request

        // Memperbarui atau membuat data absensi baru jika belum ada
        Absensi::updateOrCreate(
            ['siswa_id' => $siswaId, 'tanggal' => $tanggal],
            ['status' => $status]
        );

        return redirect()->back(); // Mengarahkan kembali ke halaman sebelumnya
    }

    // Fungsi untuk menghapus data absensi
    public function hapusAbsensi(Request $request)
    {
        $siswaId = $request->id; // Mendapatkan ID siswa dari request
        $tanggal = $request->tanggal; // Mendapatkan tanggal dari request

        // Menghapus data absensi berdasarkan ID siswa dan tanggal
        Absensi::where('siswa_id', $siswaId)->where('tanggal', $tanggal)->delete();

        return redirect()->back(); // Mengarahkan kembali ke halaman sebelumnya
    }

    // Fungsi untuk menampilkan rekap absensi bulanan
    public function rekapAbsensi(Request $request)
    {
        $datakelas = $this->getKelas(); // Mendapatkan daftar kelas yang diajar oleh guru yang sedang login

        if (!$datakelas) {
            return redirect('guru'); // Jika tidak ada kelas yang ditemukan, arahkan kembali ke halaman guru
        }

        // Mendapatkan nilai kelas dari request atau menggunakan kelas pertama dari daftar kelas
        $kelas = $request->kelas ?? $datakelas[0];
        // Mendapatkan nilai bulan dari request atau menggunakan bulan saat ini
        $bulan = $request->bulan ?? date('n');
        // Mendapatkan nilai tahun dari request atau menggunakan tahun saat ini
        $tahun = $request->tahun ?? date('Y');
        $bulan = intval($bulan); // Mengubah nilai bulan menjadi integer

        // Mendapatkan tanggal awal dan akhir bulan
        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth();
        $endDate = Carbon::create($tahun, $bulan, 1)->endOfMonth();
        $dates = $this->getDates($startDate, $endDate); // Mendapatkan daftar tanggal dalam bulan tersebut

        // Mendapatkan rentang tahun untuk pilihan pada form
        $tahun_range = $this->getTahunRange();
        $tahun_selected = $tahun;

        // Mengambil data siswa berdasarkan kelas
        $siswa = Siswa::where('kelas', $kelas);
        $siswaIds = $siswa->pluck('id'); // Mendapatkan daftar ID siswa
        // Mengambil data absensi yang dikelompokkan berdasarkan ID siswa
        $absensi = Absensi::whereIn('siswa_id', $siswaIds)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get()
            ->groupBy('siswa_id');

        $siswas = $siswa->get();
        $data = [];

        // Loop untuk setiap siswa dan menyiapkan data absensi
        foreach ($siswas as $si) {
            $siswaDates = $dates; // Menginisialisasi daftar tanggal dengan nilai awal
            if (isset($absensi[$si->id])) {
                foreach ($absensi[$si->id] as $ad) {
                    $tgl = Carbon::parse($ad->tanggal)->format('j'); // Mendapatkan tanggal dalam bentuk angka
                    $siswaDates[$tgl] = $this->getStatus($ad->status); // Mengubah status menjadi bentuk singkat
                }
            }
            $data[] = [
                'nama' => $si->nama, // Nama siswa
                'nisn' => $si->nisn, // NISN siswa
                'absensi' => $siswaDates // Daftar absensi siswa
            ];
        }

        // Mengirimkan variabel ke view rekap absensi
        return view('fitur_guru.absensi_siswa.rekap_absensi', compact('kelas', 'bulan', 'data', 'dates', 'datakelas', 'tahun_range', 'tahun_selected'));
    }

    // Fungsi untuk membuat rekap absensi dalam bentuk PDF
    public function rekapAbsensiPdf(Request $request)
    {
        $datakelas = $this->getKelas(); // Mendapatkan daftar kelas yang diajar oleh guru yang sedang login

        if (!$datakelas) {
            return redirect('guru'); // Jika tidak ada kelas yang ditemukan, arahkan kembali ke halaman guru
        }

        // Mendapatkan nilai kelas dari request atau menggunakan kelas pertama dari daftar kelas
        $kelas = $request->kelas ?? $datakelas[0];
        // Mendapatkan nilai bulan dari request atau menggunakan bulan saat ini
        $bulan = $request->bulan ?? date('n');
        // Mendapatkan nilai tahun dari request atau menggunakan tahun saat ini
        $tahun = $request->tahun ?? date('Y');
        $bulan = intval($bulan); // Mengubah nilai bulan menjadi integer

        // Mendapatkan tanggal awal dan akhir bulan
        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth();
        $endDate = Carbon::create($tahun, $bulan, 1)->endOfMonth();
        $dates = $this->getDates($startDate, $endDate); // Mendapatkan daftar tanggal dalam bulan tersebut

        // Mendapatkan rentang tahun untuk pilihan pada form
        $tahun_range = $this->getTahunRange();
        $tahun_selected = $tahun;

        // Mengambil data siswa berdasarkan kelas
        $siswa = Siswa::where('kelas', $kelas);
        $siswaIds = $siswa->pluck('id'); // Mendapatkan daftar ID siswa
        // Mengambil data absensi yang dikelompokkan berdasarkan ID siswa
        $absensi = Absensi::whereIn('siswa_id', $siswaIds)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get()
            ->groupBy('siswa_id');

        $siswas = $siswa->get();
        $data = [];

        // Loop untuk setiap siswa dan menyiapkan data absensi
        foreach ($siswas as $si) {
            $siswaDates = $dates; // Menginisialisasi daftar tanggal dengan nilai awal
            if (isset($absensi[$si->id])) {
                foreach ($absensi[$si->id] as $ad) {
                    $tgl = Carbon::parse($ad->tanggal)->format('j'); // Mendapatkan tanggal dalam bentuk angka
                    $siswaDates[$tgl] = $this->getStatus($ad->status); // Mengubah status menjadi bentuk singkat
                }
            }
            $data[] = [
                'nama' => $si->nama, // Nama siswa
                'nisn' => $si->nisn, // NISN siswa
                'absensi' => $siswaDates // Daftar absensi siswa
            ];
        }

        $namabulan = $this->getBulan($bulan); // Mendapatkan nama bulan berdasarkan angka
        $datas = compact('kelas', 'bulan', 'data', 'dates', 'datakelas', 'namabulan', 'tahun_selected');
        $pdf = PDF::loadview('absen-pdf', $datas)->setPaper('a4', 'landscape'); // Membuat PDF dengan orientasi landscape

        return $pdf->stream('Rekap Absensi ' . $kelas . ' ' . $bulan . ' ' . $tahun_selected . '.pdf'); // Mengirimkan file PDF ke browser
    }

    // Fungsi untuk mendapatkan rentang tahun untuk form
    function getTahunRange()
    {
        // Tentukan kisaran tahun, misalnya dari tahun 2020 hingga tahun sekarang
        $start_year = 2020;
        $current_year = date('Y');
        $tahun_range = range($start_year, $current_year); // Membuat array rentang tahun
        return $tahun_range; // Mengembalikan array rentang tahun
    }

    // Fungsi untuk mendapatkan daftar kelas yang diajar oleh guru yang sedang login
    function getKelas()
    {
        $user = auth()->user(); // Mendapatkan data pengguna yang sedang login
        $data = Guru::where('email', $user->email)->first(); // Mendapatkan data guru berdasarkan email pengguna

        if (!$data) {
            return false; // Jika tidak ada data yang ditemukan, kembalikan false
        }

        // Mendapatkan kelas yang tidak null dan mengurutkannya
        $datakelas = [$data->kelas, $data->kelass, $data->kelasss, $data->kelassss];
        $datakelas = array_filter($datakelas, function ($value) {
            return $value !== null;
        });
        sort($datakelas);

        return $datakelas; // Mengembalikan daftar kelas
    }

    // Fungsi untuk mendapatkan tanggal-tanggal dalam rentang tertentu
    function getDates($startDate, $endDate)
    {
        $dates = [];

        $currentDate = $startDate->copy(); // Membuat salinan dari tanggal awal
        while ($currentDate <= $endDate) {
            $dates[$currentDate->format('j')] = null; // Mengisi array dengan tanggal-tanggal dalam bentuk angka
            $currentDate->addDay(); // Menambah satu hari
        }

        return $dates; // Mengembalikan array tanggal
    }

    // Fungsi untuk mengubah status menjadi bentuk singkat
    function getStatus($status)
    {
        if ($status == 'Hadir') {
            return 'H'; // Mengembalikan 'H' untuk status Hadir
        } elseif ($status == 'Izin') {
            return 'I'; // Mengembalikan 'I' untuk status Izin
        } elseif ($status == 'Sakit') {
            return 'S'; // Mengembalikan 'S' untuk status Sakit
        } elseif ($status == 'Alfa') {
            return 'A'; // Mengembalikan 'A' untuk status Alfa
        }
    }

    // Fungsi untuk mendapatkan nama bulan dari angka
    function getBulan($bulan)
    {
        $bulanNames = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $bulanNames[$bulan]; // Mengembalikan nama bulan berdasarkan angka
    }
}
