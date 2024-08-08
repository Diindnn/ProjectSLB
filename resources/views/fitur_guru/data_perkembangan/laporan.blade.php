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
                        <li class="breadcrumb-item"><a href="#">Semester {{$semester == '1 (Satu)' ? 'Ganjil':
                                'Genap'}}</a></li>
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
                <div class="card-primary" style="padding: 10px">
                    <div class="card-header" style="background: #315E77;"></div>
                    <div class=card>
                        <div class="card-body" style="padding: 10px">
                            <div class="col text-center">
                                <h3>LAPORAN PERKEMBANGAN BELAJAR ANAK</h3>
                            </div>

                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <table class="table table-borderless" style="margin-bottom: 0 !important;">
                                            <tr>
                                                <td style="width: 12%;">Nama</td>
                                                <td>: &nbsp;&nbsp;{{$siswa->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 12%;">NISN</td>
                                                <td>: &nbsp;&nbsp;{{$siswa->nisn}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 12%;">Kelas</td>
                                                <td>: &nbsp;&nbsp;{{$siswa->kelas}} - {{$siswa->jenis_kebutuhan}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td style="width: 30%;">Semester</td>
                                                <td>: &nbsp;&nbsp;{{$semester}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%;">Tahun Pelajaran</td>
                                                <td>: &nbsp;&nbsp;{{$tahun}}/{{$tahun+1}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%;">Bulan / Minggu</td>
                                                <td>: &nbsp;&nbsp;{{ $bulan }} / Minggu {{$minggu}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
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
                                        @php
                                        $huruf = range('A', 'Z');
                                        $no = 0;
                                        $aspekn = '';
                                        $c = 1;
                                        @endphp

                                        @foreach($penilaian as $aspek => $pln)
                                        @foreach($pln as $indikasi => $pl)
                                        <tr>
                                            @if($aspekn != $aspek)
                                            <td rowspan="{{count($pln)}}">{{$huruf[$no]}}</td>
                                            <td rowspan="{{count($pln)}}">{{$aspek}}</td>
                                            @endif
                                            <td>{{$c}}. {{$indikasi}}</td>
                                            <td>{{$pl['skala']}}</td>
                                            <td>{{$pl['catatan']}}</td>
                                        </tr>
                                        @php
                                        $aspekn = $aspek;
                                        $c++;
                                        @endphp
                                        @endforeach
                                        @php
                                        $no++;
                                        $c = 1;
                                        @endphp
                                        @endforeach
                                </table>
                            </div>

                            <!-- Keterangan Skala Penilaian -->
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <p style="margin-bottom: 0;">Keterangan Skala Penilaian:</p>
                                    <ul>
                                        <li>1 = Siswa tidak memberikan respon</li>
                                        <li>2 = Siswa belum mampu meski sudah diberi bantuan</li>
                                        <li>3 = Siswa mampu dengan banyak bantuan</li>
                                        <li>4 = Siswa mampu dengan sedikit bantuan</li>
                                        <li>5 = Siswa sudah mampu secara mandiri</li>
                                    </ul>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <a href="{{ url('/dataperkembangan/' . request()->segment(2) . '/edit') }}?siswa={{$siswa->id}}&minggu={{$minggu}}&tahun={{$tahun}}"
                                        class="btn btn-primary float-right btn-edit-data">
                                        <i></i> Edit Data
                                    </a>
                                    <a href="{{ url('/dataperkembangan/' . request()->segment(2) . '/laporan-pdf') }}?siswa={{$siswa->id}}&minggu={{$minggu}}&tahun={{$tahun}}"
                                        class="btn btn-info float-right btn-cetak-pdf mr-3" id="btnCetakPDF">
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
    $(function () {
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
