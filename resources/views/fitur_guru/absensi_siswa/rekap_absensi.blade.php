@extends('layouts.layout_guru.master_guru')

@section('content_guru')
<style>
    /* Gaya CSS untuk tabel yang dapat digulir secara horizontal */
    .table-responsive {
        overflow-x: auto;
    }

    #example1 thead th:nth-child(-n+3) {
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: #fff;
        /* Sesuaikan dengan warna latar belakang konten Anda */
    }

    .custom-btn {
        background-color: #315E77;
        /* Ganti dengan kode warna yang diinginkan */
        border-color: #315E77;
        /* Ganti dengan kode warna yang sama dengan background-color atau warna yang sesuai */
        color: #fff;
        /* Warna teks pada tombol */
    }

    /* Efek hover */
    .custom-btn:hover {
        background-color: #275067;
        /* Warna yang diinginkan saat tombol dihover */
        border-color: #275067;
        /* Warna border saat tombol dihover */
    }

    .btn-info {
        background-color: #315E77;
        border-color: #315E77;
        /* jika Anda ingin mengubah warna border */
        color: #fff;
        /* warna teks */
    }

    .btn-info:hover {
        background-color: #275067;
        border-color: #315E77;
        /* jika Anda ingin mengubah warna border saat dihover */
        color: #fff;
        /* warna teks saat dihover */
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekap Absensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rekap Absensi</li>
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

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center mt-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h4>Rekap Absensi Bulanan</h4>
                                        <!-- Form filter -->
                                        <form class="form-horizontal" action="{{url('rekap_absensi')}}" method="get">
                                            <div class="form-group row mt-5">
                                                <label for="inputKelas" class="col-md-2 col-form-label">
                                                    Pilih Kelas
                                                </label>
                                                <div class="col-md-4">
                                                    <select id="inputKelas" class="form-control" name="kelas">
                                                        @foreach($datakelas as $k)
                                                        <option value="{{$k}}" {{ $k==$kelas ? 'selected' : '' }}>Kelas
                                                            {{$k}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputTanggal" class="col-md-2 col-form-label">
                                                    Pilih Bulan
                                                </label>
                                                <div class="col-md-4">
                                                    <select id="inputKelas" class="form-control" name="bulan">
                                                        <option value="1" {{ $bulan==1 ? 'selected' : '' }}>Januari
                                                        </option>
                                                        <option value="2" {{ $bulan==2 ? 'selected' : '' }}>Februari
                                                        </option>
                                                        <option value="3" {{ $bulan==3 ? 'selected' : '' }}>Maret
                                                        </option>
                                                        <option value="4" {{ $bulan==4 ? 'selected' : '' }}>April
                                                        </option>
                                                        <option value="5" {{ $bulan==5 ? 'selected' : '' }}>Mei</option>
                                                        <option value="6" {{ $bulan==6 ? 'selected' : '' }}>Juni
                                                        </option>
                                                        <option value="7" {{ $bulan==7 ? 'selected' : '' }}>Juli
                                                        </option>
                                                        <option value="8" {{ $bulan==8 ? 'selected' : '' }}>Agustus
                                                        </option>
                                                        <option value="9" {{ $bulan==9 ? 'selected' : '' }}>September
                                                        </option>
                                                        <option value="10" {{ $bulan==10 ? 'selected' : '' }}>Oktober
                                                        </option>
                                                        <option value="11" {{ $bulan==11 ? 'selected' : '' }}>November
                                                        </option>
                                                        <option value="12" {{ $bulan==12 ? 'selected' : '' }}>Desember
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputTahun" class="col-md-2 col-form-label">
                                                    Pilih Tahun
                                                </label>
                                                <div class="col-md-4">
                                                    <select id="inputTahun" class="form-control" name="tahun">
                                                        @foreach($tahun_range as $tahun)
                                                        <option value="{{$tahun}}" {{ $tahun==$tahun_selected ? 'selected' : '' }}>{{$tahun}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary custom-btn">Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #315E77; color: white; text-align: center;">
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            @foreach($dates as $d => $t)
                                            <th>{{$d}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        @foreach($data as $da)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$da['nisn']}}</td>
                                            <td>{{$da['nama']}}</td>
                                            @foreach($da['absensi'] as $a => $ab)
                                            <td>{{$ab ?? '-'}}</td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-6 mt-4 float-right">
                                <a href="{{url('rekap_absensi_pdf')}}?kelas={{request()->query('kelas')}}&bulan={{request()->query('bulan')}}&tahun={{ $tahun_selected }}" class="btn btn-info float-right btn-cetak-pdf mr-3" id="btnCetakPDF">
                                    <i class="fa fa-file-pdf"></i> Cetak PDF
                                </a>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.col -->
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Pop-up konfirmasi hapus -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #315E77;">Batal</button>
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

<script>
    $(function() {
        // Hancurkan instance DataTables yang sudah ada, jika ada
        if ($.fn.DataTable.isDataTable('#example1')) {
            $('#example1').DataTable().destroy();
        }

        // Inisialisasi DataTables
        $("#example1").DataTable({
            "autoWidth": false,
            "scrollX": true, // Aktifkan pengguliran horizontal
            "ordering": false // Nonaktifkan pengurutan kolom
        });
    });
</script>

@endsection
