@extends('layouts.layout_guru.master_guru')

@section('content_guru')
    <style>
        .btn-cetak-pdf {
            background-color: #315E77;
            /* Warna latar belakang */
            border-color: #315E77;
            /* Warna border */
            color: #fff;
            /* Warna teks */
        }

        .btn-cetak-pdf:hover {
            background-color: #275067;
            /* Warna latar belakang saat dihover */
            border-color: #275067;
            /* Warna border saat dihover */
            color: #fff;
            /* Warna teks saat dihover */
        }

        .btn-edit-data {
            background-color: #315E77;
            /* Warna latar belakang */
            border-color: #315E77;
            /* Warna border */
            color: #fff;
            /* Warna teks */
        }

        .btn-edit-data:hover {
            background-color: #275067;
            /* Warna latar belakang saat dihover */
            border-color: #275067;
            /* Warna border saat dihover */
            color: #fff;
            /* Warna teks saat dihover */
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
                                <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Lihat Laporan Perkembangan
                        </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Semester Genap</a></li>
                            <li class="breadcrumb-item active">Lihat Laporan Perkembangan</li>
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
                                                    <td>Maret / Minggu 1</td>
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
                                        <a href="{{ route('edit_data_juli') }}"
                                            class="btn btn-primary float-right btn-edit-data">
                                            <i></i> Edit Data
                                        </a>
                                        <a href="#" class="btn btn-info float-right btn-cetak-pdf mr-3"
                                            id="btnCetakPDF">
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
    </script>
@endsection
