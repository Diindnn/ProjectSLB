@extends('layouts.layout_guru.master_guru')

@section('content_guru')
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
                    <div class="card-primary">
                        <div class="card-header" style="background: #315E77;"></div>
                        <!-- /.card-header -->

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center mt-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Data Perkembangan Bulan Oktober</h4>
                                            <!-- Form filter -->
                                            <form class="form-horizontal">
                                                <div class="form-group row mt-5">
                                                    <label for="inputKelas" class="col-md-2 col-form-label">Pilih
                                                        Minggu</label>
                                                    <div class="col-md-4">
                                                        <select id="inputKelas" class="form-control">
                                                            <option selected>Pilih...</option>
                                                            <option>Minggu 1</option>
                                                            <option>Minggu 2</option>
                                                            <option>Minggu 3</option>
                                                            <option>Minggu 4</option>
                                                            <!-- Tambahkan pilihan kelas lainnya sesuai kebutuhan -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Form filter -->
                                            <form class="form-horizontal">
                                                <div class="form-group row mt-1">
                                                    <label for="inputTahun" class="col-md-2 col-form-label">Pilih
                                                        Tahun</label>
                                                    <div class="col-md-4">
                                                        <select id="inputTahun" class="form-control">
                                                            <option selected>Pilih...</option>
                                                            <option>2022</option>
                                                            <option>2023</option>
                                                            <option>2025</option>
                                                            <option>2026</option>
                                                            <option>2027</option>
                                                            <option>2028</option>
                                                            <option>2029</option>
                                                            <option>2031</option>
                                                            <option>2032</option>
                                                            <option>2033</option>
                                                            <option>2034</option>
                                                            <option>2035</option>
                                                            <option>2036</option>
                                                            <!-- Tambahkan tahun lainnya sesuai kebutuhan -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #315E77; color: white; text-align: center;">
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Jenis Kebutuhan</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        <tr>
                                            <td>1</td>
                                            <td>987654321</td>
                                            <td>Aslan Said</td>
                                            <td>Tunagrahita</td>
                                            <td>5</td>
                                            <td>
                                                <a href="{{ route('laporan_juli') }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                                <a href="{{ route('tambah_data_juli') }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-plus"></i> Tambah
                                                </a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>987654321</td>
                                            <td>Aslan Said</td>
                                            <td>Tunagrahita</td>
                                            <td>5</td>
                                            <td>
                                                <a href="{{ route('laporan_juli') }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                                <a href="{{ route('tambah_data_juli') }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-plus"></i> Tambah
                                                </a>
                                            </td>
                                        </tr>

                                </table>
                            </div>
                            <!-- /.card-body -->
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

    <!-- DataTables -->
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

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
