@extends('layouts.layout_guru.master_guru')

@section('content_guru')
    <style>
        .profile-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .profile-box {
            width: 120px;
            height: 150px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .profile-icon {
            width: 75px;
            /* Mengatur lebar gambar */
            height: 75px;
            /* Mengatur tinggi gambar */

            margin-top: 5px;
        }

        .add-image-text {
            margin-top: 3px;
            font-size: 8px;
            /* Ukuran teks "Tambah Gambar" */
            color: black;
            ;
            border: 2px solid black;
            /* Menambahkan border pada teks */
            padding: 3px 8px;
            /* Menambahkan padding pada teks */
            border-radius: 2px;
            /* Melengkungkan sudut border */
            background-color: #999696 border-color: black;
        }

        .file-label {
            margin-top: 3px;
            font-size: 8px;
            /* Mengatur ukuran font menjadi 8px */
            color: rgba(36, 34, 34, 0.7);
            padding: 0.5px 12px;
            /* Atur padding untuk membuat label lebih berbeda */
            cursor: pointer;
            /* Menjadikan kursor menjadi tanda pointer saat mengarah ke label */
            border: 0.5px solid #c2c0c0;
            /* Menambahkan border pada teks */
            font-weight: 10;
            /* Mengatur ketebalan font menjadi normal */
        }

        .file-label input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-label::after {
            content: attr(data-content);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Menyembunyikan input file */
        input[type="file"] {
            display: none;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>
                            <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                                <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Semester Ganjil
                        </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Semester Ganjil</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card-primary" style="padding: 15px">
                        <div class="card-header" style="background: #315E77;"></div>
                        <div class=card>
                            <div class="card-body" style="padding: 50px">
                                <div class="col text-center">
                                    <h4>Laporan Perkembangan Belajar Anak </h4>
                                </div>

                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Nama:</td>
                                                    <td>Nurul Ilmi</td>
                                                </tr>
                                                <tr>
                                                    <td>NISN:</td>
                                                    <td>12345678910</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas:</td>
                                                    <td>V - Tuna Grahita</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Semester:</td>
                                                    <td>1 (Satu)</td>
                                                </tr>
                                                <tr>
                                                    <td>Tahun Pelajaran:</td>
                                                    <td>2023/2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Bulan / Minggu:</td>
                                                    <td>Agustus / Minggu 1</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #315E77; color: white; text-align: center;">
                                            <th>No</th>
                                            <th>Aspek</th>
                                            <th>Indikasi</th>
                                            <th>Skala 1-5</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="3">A</td>
                                            <td rowspan="3">Kemampuan Belajar</td>
                                            <td>1. Kemampuan Menulis</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>2. Kemampuan Membaca</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>3. Kemampuan Berhitung</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="3">B</td>
                                            <td rowspan="3">Kemandirian</td>
                                            <td>1. Memakai Kaos Kaki dan Sepatu</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>2. Kemampuan Berpakaian</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>3. Kecakapan Makan</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="3">C</td>
                                            <td rowspan="3">Keterampilan Bina Diri</td>
                                            <td>1. Menjaga Kebersihan Lingkungan</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>2. Keterampilan Membuat Minuman Ringan</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                        <tr>
                                            <td>3. Membuat Prakarya Sederhana</td>
                                            <td>5</td>
                                            <td>Ananda Nurul Ilmi belum bisa duduk dengan tenang, <br>sehingga masih perlu
                                                bimbingan intens</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Keterangan Skala Penilaian -->
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <p style="margin-bottom: 0;">Keterangan Skala Penilaian:</p>
                                        <ul>
                                            <li>1 = Perlu Bimbingan Intensif</li>
                                            <li>2 = Perlu Bimbingan</li>
                                            <li>3 = Perkembangan Sedang</li>
                                            <li>4 = Perkembangan Baik</li>
                                            <li>5 = Perkembangan Sangat Baik</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <!-- Tombol Edit Data -->
                                        <a href="{{ route('edit') }}" class="btn btn-primary float-right">
                                            <i></i> Edit Data
                                        </a>
                                        <!-- Tombol Cetak PDF -->
                                        <a href="#" class="btn btn-info float-right mr-3">
                                            <i class="fa fa-file-pdf"></i> Cetak PDF
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Pop-up konfirmasi hapus -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="background-color: #315E77;">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        // Tambahkan event listener ke tombol cetak PDF
        $('#btnCetakPDF').click(function() {
            // Buat instance jsPDF
            var doc = new jsPDF();
            // Tambahkan konten laporan ke PDF
            doc.text('Laporan Perkembangan Belajar Anak', 10, 10);
            // Tambahkan konten tabel atau informasi lainnya ke PDF sesuai kebutuhan
            // Simpan PDF
            doc.save('laporan_perkembangan_belajar.pdf');
        });

        // Tambahkan event listener ke semua tombol hapus
        var deleteButtons = document.querySelectorAll('.deleteButton');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id'); // Ambil id dari tombol hapus
                $('#deleteConfirmationModal').modal('show'); // Tampilkan modal konfirmasi
                // Set id pada tombol konfirmasi hapus
                $('#confirmDeleteButton').attr('data-id', id);
            });
        });

        // Menangani klik tombol konfirmasi hapus
        $('#confirmDeleteButton').click(function() {
            var id = $(this).attr('data-id'); // Ambil id dari tombol konfirmasi hapus
            // Di sini Anda dapat menambahkan logika penghapusan data jika diperlukan
            // Kemudian Anda bisa menutup modal konfirmasi setelah penghapusan berhasil dilakukan
            $('#deleteConfirmationModal').modal('hide');
            // Tambahkan logika penghapusan data dengan menggunakan id yang telah diperoleh
            console.log('Data dengan id ' + id + ' telah dihapus.');
        });
    </script>
@endsection
