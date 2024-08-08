<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Pertanyaan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
            // [
            //     'name' => 'guru',
            //     'email' => 'guru@gmail.com',
            //     'password' => bcrypt('12345678'),
            //     'role' => 'guru'
            // ],
            // [
            //     'name' => 'Wali Murid 1',
            //     'email' => 'wali1@gmail.com',
            //     'password' => bcrypt('12345678'),
            //     'role' => 'parent'
            // ]
        ];

        foreach ($user as $u) {
            User::create($u);
        }

        // Guru::create([
        //     'foto' => 'images/guru/foto.jpg',
        //     'nama' => 'Guru',
        //     'nuptk' => '21312499',
        //     'jenis_kelamin' => 'Perempuan',
        //     'pendidikan' => 'S1',
        //     'alamat' => 'Lampung',
        //     'nohp' => '08512182311',
        //     'email' => 'guru@gmail.com',
        //     'kelas' => '5',
        //     'kelass' => '2',
        //     'kelasss' => null,
        //     'kelassss' => null
        // ]);

        // $siswa = [
        //     [
        //         'foto' => 'images/siswa/foto.jpg',
        //         'nama' => 'Siswa 1',
        //         'nisn' => '38981',
        //         'jenis_kelamin' => 'Perempuan',
        //         'kelas' => '5',
        //         'jenis_kebutuhan' => 'Tuna Wicara',
        //         'alamat' => 'Lampung',
        //         'wali_murid' => 'wali1@gmail.com'
        //     ],
        //     [
        //         'foto' => 'images/siswa/foto.jpg',
        //         'nama' => 'Siswa 2',
        //         'nisn' => '38982',
        //         'jenis_kelamin' => 'Laki-laki',
        //         'kelas' => '5',
        //         'jenis_kebutuhan' => 'Tuna Wicara',
        //         'alamat' => 'Lampung Selatan',
        //         'wali_murid' => 'wali2@gmail.com'
        //     ],
        //     [
        //         'foto' => 'images/siswa/foto.jpg',
        //         'nama' => 'Siswa 3',
        //         'nisn' => '38983',
        //         'jenis_kelamin' => 'Perempuan',
        //         'kelas' => '5',
        //         'jenis_kebutuhan' => 'Tuna Wicara',
        //         'alamat' => 'Lampung Barat',
        //         'wali_murid' => 'wali3@gmail.com'
        //     ],
        // ];

        // foreach ($siswa as $s) {
        //     Siswa::create($s);
        // }

        $pertanyaan = [
            'Kemampuan Belajar' => ['Kemampuan Menulis', 'Kemampuan Membaca', 'Kemampuan Berhitung'],
            'Kemandirian' => ['Memakai Kaos Kaki dan Sepatu', 'Kemampuan Berpakaian', 'Kecakapan Makan'],
            'Keterampilan Bina Diri' => ['Menjaga Kebersihan Lingkungan', 'Keterampilan Membuat Minuman Ringan', 'Membuat Prakarya Sederhana'],
        ];

        foreach ($pertanyaan as $aspek => $indikasi) {
            foreach ($indikasi as $in) {
                Pertanyaan::create([
                    'aspek' => $aspek,
                    'indikasi' => $in
                ]);
            }
        }
    }
}
