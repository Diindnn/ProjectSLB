<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class CetakAbsenController extends Controller
{
    // Fungsi untuk mencetak PDF
    public function cetakPDF(Request $request)
    {
        // Mulai membangun konten PDF dengan menggunakan view yang ditentukan
        // 'data' adalah variabel yang akan dikompak dan dikirimkan ke view
        $pdfContent = view('nama_view_pdf', compact('data'))->render();

        // Konfigurasi DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Mengaktifkan parser HTML5
        $options->set('isRemoteEnabled', true); // Mengaktifkan opsi untuk mendownload file remote seperti gambar

        // Buat objek DOMPDF baru dengan opsi yang sudah dikonfigurasi
        $dompdf = new Dompdf($options);

        // Muat konten HTML ke DOMPDF
        $dompdf->loadHtml($pdfContent);

        // Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait'); // Mengatur ukuran kertas A4 dan orientasi portrait

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Keluarkan PDF ke browser untuk diunduh atau ditampilkan
        return $dompdf->stream("nama_file.pdf"); // Nama file PDF yang akan dihasilkan
    }
}
