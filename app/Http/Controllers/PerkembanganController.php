<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Penilaian;
use App\Models\Perkembangan;
use App\Models\Pertanyaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class PerkembanganController extends Controller
{
    public function index(Request $request, $bulan)
    {
        $datakelas = $this->getKelas();
        if (!$datakelas) {
            return redirect('guru');
        }
        $kelas = $request->kelas ?? $datakelas[0];
        $minggu = $request->minggu ?? 1;
        $tahun = $request->tahun ?? date('Y');
        $semester = $this->getSemester($bulan);
        $tahuns = [];

        for ($i = -10; $i <= 10; $i++) {
            $tahuns[] = $tahun + $i;
        }

        $siswa = Siswa::where('kelas', $kelas)->get()->map(function ($siswa) use ($bulan, $minggu, $tahun) {
            $perkembangan = Perkembangan::where('siswa_id', $siswa->id)
                ->where('bulan', $bulan)
                ->where('minggu', $minggu)
                ->where('tahun', $tahun)
                ->first();

            if ($perkembangan) {
                $siswa->perkembangan = TRUE;
            } else {
                $siswa->perkembangan = $perkembangan;
            }

            return $siswa;
        });

        $nbulan = $this->getBulan($bulan);
        $datas = compact('bulan', 'datakelas', 'kelas', 'tahun', 'tahuns', 'minggu', 'siswa', 'semester', 'nbulan');

        return view('fitur_guru.data_perkembangan.index', $datas);
    }

    public function create(Request $request, $bulan)
    {
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;
        $semester = $this->getSemester($bulan);

        $pertanyaan = Pertanyaan::all()->groupBy('aspek');

        $datas = compact('tahun', 'bulan', 'minggu', 'siswa', 'pertanyaan', 'semester');

        return view('fitur_guru.data_perkembangan.tambah', $datas);
    }

    public function store(Request $request, $bulan)
    {
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;
        $skala = $request->skala;
        $note = $request->note;

        $perkembangan = Perkembangan::create([
            'siswa_id' => $siswa,
            'minggu' => $minggu,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);

        foreach ($skala as $i => $s) {
            Penilaian::create([
                'pertanyaan_id' => $i,
                'perkembangan_id' => $perkembangan->id,
                'skala' => $s,
                'catatan' => $note[$i]
            ]);
        }

        $siswa = Siswa::find($siswa);

        return Redirect::route('dataperkembangan.index', ['bulan' => $bulan, 'kelas' => $siswa->kelas, 'minggu' => $minggu, 'tahun' => $tahun]);
    }

    public function show(Request $request, $bulan)
    {
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;

        $siswa = Siswa::whereId($siswa)->first();
        $semester = $this->getSemester($bulan);
        $pertanyaan = Pertanyaan::all()->groupBy('aspek');
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('minggu', $minggu)
            ->where('tahun', $tahun)
            ->first();

        $penilaian = [];
        foreach ($pertanyaan as $aspek => $per) {
            $pen = [];
            foreach ($per as $p) {
                if ($perkembangan) {
                    $pl = Penilaian::where('perkembangan_id', $perkembangan->id)->where('pertanyaan_id', $p->id)->first();
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => $pl->skala,
                        'catatan' => $pl->catatan
                    ];
                } else {
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => '-',
                        'catatan' => '-'
                    ];
                }
            }
        }

        $bulan = $this->getBulan($bulan);
        $datas = compact('tahun', 'bulan', 'minggu', 'siswa', 'semester', 'penilaian');

        return view('fitur_guru.data_perkembangan.laporan', $datas);
    }

    public function edit(Request $request, $bulan)
    {
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;
        $semester = $this->getSemester($bulan);

        $siswa = Siswa::whereId($siswa)->first();
        $semester = $this->getSemester($bulan);
        $pertanyaan = Pertanyaan::all()->groupBy('aspek');
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('minggu', $minggu)
            ->where('tahun', $tahun)
            ->first();

        $penilaian = [];
        foreach ($pertanyaan as $aspek => $per) {
            $pen = [];
            foreach ($per as $p) {
                if ($perkembangan) {
                    $pl = Penilaian::where('perkembangan_id', $perkembangan->id)->where('pertanyaan_id', $p->id)->first();
                    $penilaian[$aspek][$p->indikasi] = [
                        'id' => $p->id,
                        'skala' => $pl->skala,
                        'catatan' => $pl->catatan
                    ];
                } else {
                    $penilaian[$aspek][$p->indikasi] = [
                        'id' => $p->id,
                        'skala' => '-',
                        'catatan' => '-'
                    ];
                }
            }
        }

        $datas = compact('tahun', 'bulan', 'minggu', 'siswa', 'penilaian', 'semester');

        return view('fitur_guru.data_perkembangan.edit', $datas);
    }

    public function update(Request $request, $bulan)
    {
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;
        $skala = $request->skala;
        $note = $request->note;

        $perkembangan = Perkembangan::firstOrCreate([
            'siswa_id' => $siswa,
            'minggu' => $minggu,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);

        foreach ($skala as $i => $s) {
            Penilaian::updateOrCreate(
                ['pertanyaan_id' => $i, 'perkembangan_id' => $perkembangan->id],
                ['skala' => $s, 'catatan' => $note[$i]]
            );
        }

        $siswa = Siswa::find($siswa);

        return Redirect::route('dataperkembangan.index', ['bulan' => $bulan, 'kelas' => $siswa->kelas, 'minggu' => $minggu, 'tahun' => $tahun]);
    }

    public function grafik(Request $request, $semester)
    {
        $datakelas = $this->getKelas();
        if (!$datakelas) {
            return redirect('guru');
        }
        $tahun = $request->tahun ?? date('Y');
        $tahuns = [];

        for ($i = -10; $i <= 10; $i++) {
            $tahuns[] = $tahun + $i;
        }

        $siswa = Siswa::whereIn('kelas', $datakelas)->get();
        $idSiswa = $request->idSiswa ?? $siswa[0]->id;

        if ($semester == 'ganjil') {
            $bulans = [7, 8, 9, 10, 11, 12];
        } elseif ($semester == 'genap') {
            $bulans = [1, 2, 3, 4, 5, 6];
        } else {
            return redirect()->back();
        }

        $pertanyaans = Pertanyaan::all()->groupBy('aspek');
        $pertanyaan = [];

        foreach ($pertanyaans as $aspek => $indikasi) {
            foreach ($indikasi as $ind) {
                $pertanyaan[$aspek][] = $ind->id;
            }
        }

        $datagrafik = [];

        foreach ($pertanyaan as $aspek => $idIndikasi) {
            $datagrafik[$aspek] = [];
        }

        foreach ($bulans as $bulan) {
            $minggu = [1 => 0, 2 => 0, 3 => 0, 4 => 0];
            foreach ($minggu as $ming => $val) {
                $perkembangan = Perkembangan::where('siswa_id', $idSiswa)
                    ->where('minggu', $ming)
                    ->where('tahun', $tahun)
                    ->where('bulan', $bulan)
                    ->first();

                if ($perkembangan) {
                    foreach ($pertanyaan as $idp => $perv) {
                        $penilaian = Penilaian::whereIn('pertanyaan_id', $perv)
                            ->where('perkembangan_id', $perkembangan->id)
                            ->pluck('skala')
                            ->toArray();
                        $datagrafik[$idp][] = round(array_sum($penilaian) / count($penilaian), 2);
                    }
                } else {
                    foreach ($pertanyaan as $idp => $perv) {
                        $datagrafik[$idp][] = 0;
                    }
                }
            }
        }

        $minggu = [];
        for ($i = 1; $i <= 24; $i++) {
            $minggu[] = "Minggu " . $i;
        }

        $datas = compact('siswa', 'tahun', 'tahuns', 'idSiswa', 'datagrafik', 'minggu');

        return view('fitur_guru.grafik.grafik', $datas);
    }

    public function indexOrtu(Request $request, $bulan)
    {
        $minggu = $request->minggu ?? 1;
        $tahun = $request->tahun ?? date('Y');
        $semester = $this->getSemester($bulan);
        $tahuns = [];

        for ($i = -10; $i <= 10; $i++) {
            $tahuns[] = $tahun + $i;
        }

        $siswa = $this->getSiswaOrtu();

        if ($siswa->isEmpty()) {
            return redirect('orangtua');
        }

        $nbulan = $this->getBulan($bulan);
        $datas = compact('bulan', 'tahun', 'tahuns', 'minggu', 'siswa', 'semester', 'nbulan');

        return view('fitur_orangtua.data_perkembangan.index', $datas);
    }

    public function showOrtu(Request $request, $bulan)
    {
        $user = auth()->user();
        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;

        $siswa = Siswa::where('id', $siswa)->where('wali_murid', $user->email)->first();
        if (!$siswa) {
            return redirect('orangtua/dataperkembangan/'. $bulan);
        }

        $semester = $this->getSemester($bulan);
        $pertanyaan = Pertanyaan::all()->groupBy('aspek');
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('minggu', $minggu)
            ->where('tahun', $tahun)
            ->first();

        $penilaian = [];
        foreach ($pertanyaan as $aspek => $per) {
            $pen = [];
            foreach ($per as $p) {
                if ($perkembangan) {
                    $pl = Penilaian::where('perkembangan_id', $perkembangan->id)->where('pertanyaan_id', $p->id)->first();
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => $pl->skala,
                        'catatan' => $pl->catatan
                    ];
                } else {
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => '-',
                        'catatan' => '-'
                    ];
                }
            }
        }

        $bulan = $this->getBulan($bulan);
        $datas = compact('tahun', 'bulan', 'minggu', 'siswa', 'semester', 'penilaian');

        return view('fitur_orangtua.data_perkembangan.laporan', $datas);
    }

    public function grafikOrtu(Request $request, $semester)
    {
        $tahun = $request->tahun ?? date('Y');
        $tahuns = [];

        for ($i = -10; $i <= 10; $i++) {
            $tahuns[] = $tahun + $i;
        }

        $siswa = $this->getSiswaOrtu();

        if ($siswa->isEmpty()) {
            return redirect('orangtua');
        }

        $idSiswa = $request->idSiswa ?? $siswa[0]->id;

        if ($semester == 'ganjil') {
            $bulans = [7, 8, 9, 10, 11, 12];
        } elseif ($semester == 'genap') {
            $bulans = [1, 2, 3, 4, 5, 6];
        } else {
            return redirect()->back();
        }

        $pertanyaans = Pertanyaan::all()->groupBy('aspek');
        $pertanyaan = [];

        foreach ($pertanyaans as $aspek => $indikasi) {
            foreach ($indikasi as $ind) {
                $pertanyaan[$aspek][] = $ind->id;
            }
        }

        $datagrafik = [];

        foreach ($pertanyaan as $aspek => $idIndikasi) {
            $datagrafik[$aspek] = [];
        }

        foreach ($bulans as $bulan) {
            $minggu = [1 => 0, 2 => 0, 3 => 0, 4 => 0];
            foreach ($minggu as $ming => $val) {
                $perkembangan = Perkembangan::where('siswa_id', $idSiswa)
                    ->where('minggu', $ming)
                    ->where('tahun', $tahun)
                    ->where('bulan', $bulan)
                    ->first();

                if ($perkembangan) {
                    foreach ($pertanyaan as $idp => $perv) {
                        $penilaian = Penilaian::whereIn('pertanyaan_id', $perv)
                            ->where('perkembangan_id', $perkembangan->id)
                            ->pluck('skala')
                            ->toArray();
                        $datagrafik[$idp][] = round(array_sum($penilaian) / count($penilaian), 2);
                    }
                } else {
                    foreach ($pertanyaan as $idp => $perv) {
                        $datagrafik[$idp][] = 0;
                    }
                }
            }
        }

        $minggu = [];
        for ($i = 1; $i <= 24; $i++) {
            $minggu[] = "Minggu " . $i;
        }

        $datas = compact('siswa', 'tahun', 'tahuns', 'idSiswa', 'datagrafik', 'minggu');

        return view('fitur_orangtua.grafik.grafik', $datas);
    }

    public function exportPdf(Request $request, $bulan)
    {
        $user = auth()->user();

        if ($user->role == 'parent') {
            $siswa = Siswa::where('id', $request->siswa)->where('wali_murid', $user->email)->first();

            if (!$siswa) {
                return redirect('orangtua/dataperkembangan/'. $bulan);
            }
        }

        $siswa = $request->siswa;
        $minggu = $request->minggu;
        $tahun = $request->tahun;
        $siswa = Siswa::whereId($siswa)->first();
        $semester = $this->getSemester($bulan);
        $pertanyaan = Pertanyaan::all()->groupBy('aspek');
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('minggu', $minggu)
            ->where('tahun', $tahun)
            ->first();

        $penilaian = [];

        foreach ($pertanyaan as $aspek => $per) {
            $pen = [];
            foreach ($per as $p) {
                if ($perkembangan) {
                    $pl = Penilaian::where('perkembangan_id', $perkembangan->id)->where('pertanyaan_id', $p->id)->first();
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => $pl->skala,
                        'catatan' => $pl->catatan
                    ];
                } else {
                    $penilaian[$aspek][$p->indikasi] = [
                        'skala' => '-',
                        'catatan' => '-'
                    ];
                }
            }
        }

        $bulan = $this->getBulan($bulan);
        $datas = compact('tahun', 'bulan', 'minggu', 'siswa', 'semester', 'penilaian');
        $pdf = PDF::loadview('laporan-pdf', $datas);

    	return $pdf->stream('Laporan ' . $siswa->nama . ' ' . $bulan . '.pdf');
    	return $pdf->download('Laporan ' . $siswa->nama . ' ' . $bulan . '.pdf');
    }

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

        return $bulanNames[$bulan];
    }

    function getSemester($bulan)
    {
        $semester = [
            1 => '2 (Dua)',
            2 => '2 (Dua)',
            3 => '2 (Dua)',
            4 => '2 (Dua)',
            5 => '2 (Dua)',
            6 => '2 (Dua)',
            7 => '1 (Satu)',
            8 => '1 (Satu)',
            9 => '1 (Satu)',
            10 => '1 (Satu)',
            11 => '1 (Satu)',
            12 => '1 (Satu)',
        ];

        return $semester[$bulan];
    }

    function getKelas()
    {
        $user = auth()->user();
        $data = Guru::where('email', $user->email)->first();

        if (!$data) {
            return false;
        }

        $datakelas = [$data->kelas, $data->kelass, $data->kelasss, $data->kelassss];
        $datakelas = array_filter($datakelas, function ($value) {
            return $value !== null;
        });
        sort($datakelas);

        return $datakelas;
    }

    function getSiswaOrtu()
    {
        $user = auth()->user();
        $siswa = Siswa::where('wali_murid', $user->email)->get();

        return $siswa;
    }
}
