<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Mengimpor trait untuk otorisasi
use Illuminate\Foundation\Bus\DispatchesJobs; // Mengimpor trait untuk dispatching jobs
use Illuminate\Foundation\Validation\ValidatesRequests; // Mengimpor trait untuk validasi request
use Illuminate\Routing\Controller as BaseController; // Mengimpor kelas Controller dasar dari routing

// Kelas Controller utama yang digunakan sebagai dasar untuk semua controller lain
class Controller extends BaseController
{
    // Menggunakan beberapa trait yang disediakan oleh Laravel untuk berbagai keperluan
    use AuthorizesRequests; // Trait untuk menangani otorisasi
    use DispatchesJobs; // Trait untuk menangani dispatching jobs
    use ValidatesRequests; // Trait untuk menangani validasi request
}
