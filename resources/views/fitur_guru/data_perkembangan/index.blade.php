@extends('layouts.layout_guru.master_guru')

@section('content_guru')
<style>
    .btn-primary {
        background-color: #315E77;
        /* Ganti dengan kode warna yang diinginkan */
        border-color: #315E77;
        /* Ganti dengan kode warna yang sama dengan background-color atau warna yang sesuai */
        color: #fff;
        /* Warna teks pada tombol */
    }

    /* Efek hover */
    .btn-primary:hover {
        background-color: #275067;
        /* Warna yang diinginkan saat tombol dihover */
        border-color: #275067;
        /* Warna border saat tombol dihover */
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
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Semester {{$semester == '1 (Satu)' ? 'Ganjil': 'Genap'}}
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Semester {{$semester == '1 (Satu)' ? 'Ganjil': 'Genap'}}</li>
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
                                        <h4>Data Perkembangan Bulan {{$nbulan}}</h4>
                                        <!-- Form filter -->
                                        <form class="form-horizontal" action="{{url('dataperkembangan', $bulan)}}" method="get">
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
                                                <label for="inputKelas" class="col-md-2 col-form-label">
                                                    Pilih Minggu
                                                </label>
                                                <div class="col-md-4">
                                                    <select id="inputKelas" name="minggu" class="form-control">
                                                        <option value="1" {{$minggu == 1 ? 'selected': ''}}>Minggu 1</option>
                                                        <option value="2" {{$minggu == 2 ? 'selected': ''}}>Minggu 2</option>
                                                        <option value="3" {{$minggu == 3 ? 'selected': ''}}>Minggu 3</option>
                                                        <option value="4" {{$minggu == 4 ? 'selected': ''}}>Minggu 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputTahun" class="col-md-2 col-form-label">
                                                    Pilih Tahun
                                                </label>
                                                <div class="col-md-4">
                                                    <select id="inputTahun" name="tahun" class="form-control">
                                                        @foreach($tahuns as $t)
                                                        <option value="{{$t}}" {{$t == $tahun ? 'selected': ''}}>{{$t}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Filter</button>
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
                                    @foreach($siswa as $s)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$s->nisn}}</td>
                                        <td>{{$s->nama}}</td>
                                        <td>{{$s->jenis_kebutuhan}}</td>
                                        <td>{{$s->kelas}}</td>
                                        <td>
                                            <a href="{{ url('/dataperkembangan/' . $bulan . '/laporan') }}?siswa={{$s->id}}&minggu={{$minggu}}&tahun={{$tahun}}" class="btn btn-success btn-sm">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                            <a href="{{ $s->perkembangan ? '#' : url('/dataperkembangan/' . $bulan . '/tambah') . '?siswa=' . $s->id . '&minggu=' . $minggu . '&tahun=' . $tahun }}" class="btn btn-info btn-sm {{$s->perkembangan ? 'disabled':''}}">
                                                <i class="fas fa-plus"></i> Tambah
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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