<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


class PenilaianController extends Controller
{
    public function cetakPDF(Request $request)
    {

        // Mulai membangun konten PDF
        $pdfContent = view('nama_view_pdf', compact('data'))->render();

        // Konfigurasi DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Buat objek DOMPDF baru
        $dompdf = new Dompdf($options);

        // Muat konten HTML ke DOMPDF
        $dompdf->loadHtml($pdfContent);

        // Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Keluarkan PDF ke browser
        return $dompdf->stream("nama_file.pdf");
    }
}
