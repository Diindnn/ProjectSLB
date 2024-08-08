@extends('layouts.layout_guru.master_guru')

@section('content_guru')
<style>
    /* Aturan CSS untuk efek hover pada tombol "Tambah Data" */
    #tambahDataButton {
        background-color: #315E77;
        /* Warna latar belakang tombol */
        color: white;
        /* Warna teks tombol */
        transition: background-color 0.3s, color 0.3s;
        /* Transisi untuk efek hover */
        border: none;
        /* Hilangkan border */
        padding: 8px 16px;
        /* Padding tombol */
        border-radius: 4px;
        /* Radius sudut tombol */
        cursor: pointer;
        /* Ubah cursor menjadi pointer saat dihover */
    }

    #tambahDataButton:hover {
        background-color: #275067;
        /* Ubah warna latar belakang saat tombol dihover */
    }

    /* Aturan CSS untuk tombol "Simpan Data" */
    #saveEditButton,
    #saveEditButton1 {
        background-color: #315E77;
        /* Warna latar belakang tombol */
        color: white;
        /* Warna teks tombol */
        border: none;
        /* Hilangkan border */
        padding: 8px 16px;
        /* Padding tombol */
        border-radius: 4px;
        /* Radius sudut tombol */
        cursor: pointer;
        /* Ubah cursor menjadi pointer saat dihover */
        transition: background-color 0.3s, color 0.3s;
        /* Transisi untuk efek hover */
    }

    /* Aturan CSS untuk efek hover pada tombol "Simpan Data" */
    #saveEditButton:hover,
    #saveEditButton1:hover {
        background-color: #275067;
        /* Ubah warna latar belakang saat tombol dihover */
    }

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

    input[type="file"] {
        display: none;
    }

    .btn-primary {
        background-color: #315E77;
        color: #fff;
        /* Warna teks pada tombol */
    }

    /* Efek hover */
    .btn-primary:hover {
        background-color: #275067;
        /* Warna yang diinginkan saat tombol dihover */

    }

    #editSuccessMessage,
    #saveSuccessMessage {
        display: none;
        margin-top: 10px;
        padding: 10px;
        border: 2px solid #28a745;
        background-color: #d4edda;
        color: #155724;
        border-radius: 5px;
    }

    #editSuccessMessage i {
        margin-right: 45px;
    }

    #saveSuccessMessage {
        display: none;
        position: fixed;
        top: 12%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 25%;
        text-align: center;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/guru">Home</a></li>
                        <li class="breadcrumb-item active">Absensi Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card-primary">
                    <div class="card-header" style="background: #315E77;"></div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center mt-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col text">
                                        <!-- Form filter -->
                                        <form class="form-horizontal" action="{{ url('absensi_siswa') }}" method="get">
                                            <div class="form-group row mt-5">
                                                <label for="inputKelas" class="col-md-2 col-form-label">Pilih
                                                    Kelas</label>
                                                <div class="col-md-4">
                                                    <select id="inputKelas" class="form-control" name="kelas">
                                                        @foreach ($datakelas as $k)
                                                        <option value="{{ $k }}" {{ $k==$kelas ? 'selected' : '' }}>
                                                            Kelas
                                                            {{ $k }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputTanggal" class="col-md-2 col-form-label">Pilih
                                                    Tanggal</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="tanggal"
                                                        id="inputTanggal" value="{{ $tanggal }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Tombol "Tambah Data" -->
                                <a href="#" id="tambahDataButton" class="btn ml-auto float-right">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>

                            <!-- Modal form absensi -->
                            <div class="modal fade" id="formAbsensiModal" tabindex="-1" role="dialog"
                                aria-labelledby="formAbsensiModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content" style="padding: 20px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formAbsensiModalLabel">Tambah Absensi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('tambahabsensi') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="tanggal" class="col-sm-auto col-form-label px-3">
                                                        Pilih Tanggal :
                                                    </label>
                                                    <div class="col-sm">
                                                        <input type="date" class="form-control" id="tanggal"
                                                            name="tanggal" value="{{ $tanggal }}">
                                                    </div>
                                                </div>
                                                <div class="card-body" style="padding: 2px;">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr
                                                                    style="background-color: #315E77; color: white; text-align: center;">
                                                                    <th>No</th>
                                                                    <th>NISN</th>
                                                                    <th>Nama Siswa</th>
                                                                    <th>Hadir</th>
                                                                    <th>Sakit</th>
                                                                    <th>Izin</th>
                                                                    <th>Alfa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="text-align: center">
                                                                @foreach ($siswa as $s)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $s->nisn }}</td>
                                                                    <td>{{ $s->nama }}</td>
                                                                    <td>
                                                                        <input type="hidden"
                                                                            name="siswa[{{ $loop->index }}]"
                                                                            value="{{ $s->id }}" checked>
                                                                        <input type="radio"
                                                                            name="status[{{ $loop->index }}]"
                                                                            value="Hadir" checked>
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio"
                                                                            name="status[{{ $loop->index }}]"
                                                                            value="Sakit">
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio"
                                                                            name="status[{{ $loop->index }}]"
                                                                            value="Izin">
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio"
                                                                            name="status[{{ $loop->index }}]"
                                                                            value="Alfa">
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer" style="padding: 1px;">
                                                <button type="submit" class="btn btn-primary float-right"
                                                    id="saveEditButton">Simpan Data</button>
                                            </div>
                                            <!-- /.popup -->
                                            <div id="saveSuccessMessage" class="alert alert-success"
                                                style="display: none; text-align: center;">
                                                <i class="fas fa-check-circle"></i> <strong>Sukses!</strong> Data
                                                berhasil disimpan.
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card body utama -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #315E77; color: white; text-align: center;">
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Absen</th>
                                        <th>Status Kehadiran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->nisn }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $s->status ?? '-' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{$s->id}}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$s->id}}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach ($siswa as $s)
<!-- Modal form edit absensi -->
<div class="modal fade" id="edit{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="editlabel{{$s->id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="padding: 10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="editlabel{{$s->id}}">
                    Edit Absensi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('updateabsensi') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="card-body" style="padding: 2px;">
                        <div class="table-responsive">

                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #315E77; color: white; text-align: center;">
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Hadir</th>
                                        <th>Sakit</th>
                                        <th>Izin</th>
                                        <th>Alfa</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    <tr>
                                        <td>
                                            1
                                            <input type="hidden" name="id" id="siswaId" value="{{ $s->id }}">
                                            <input type="hidden" name="tanggal" id="siswaTanggal" value="{{ $tanggal }}">
                                        </td>
                                        <td id="siswaNisn">{{ $s->nama }}</td>
                                        <td id="siswaNama">{{ $s->nisn }}</td>
                                        <td>
                                            <input type="radio" name="status" value="Hadir" {{$s->status == 'Hadir' ? 'checked':''}}>
                                        </td>
                                        <td>
                                            <input type="radio" name="status" value="Sakit" {{$s->status == 'Sakit' ? 'checked':''}}>
                                        </td>
                                        <td>
                                            <input type="radio" name="status" value="Izin" {{$s->status == 'Izin' ? 'checked':''}}>
                                        </td>
                                        <td>
                                            <input type="radio" name="status" value="Alfa" {{$s->status == 'Alfa' ? 'checked':''}}>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveEditButton1">
                        Simpan perubahan
                    </button>
                </div>
            </form>

            <!-- Pesan pop-up "Data berhasil dirubah" -->
            <div id="editSuccessMessage" class="alert alert-success"
                style="display: none; position: absolute; top: 10px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 50%; text-align: center;">
                <i class="fas fa-check-circle"></i> <strong>Sukses!</strong>
                Data berhasil
                dirubah.
            </div>
        </div>
    </div>
</div>

<!-- Pop-up konfirmasi hapus -->
<div class="modal fade" id="delete{{$s->id}}" tabindex="-1" role="dialog"
    aria-labelledby="delete{{$s->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{$s->id}}Label">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('hapusabsensi') }}" method="post">
                @csrf
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <input type="hidden" name="id" value="{{$s->id}}" id="hapusId">
                <input type="hidden" name="tanggal" value="{{$tanggal}}" id="hapusTanggal">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="background-color: #315E77;">Batal</button>
                    <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach



<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>

<!-- DataTables -->
<script src="{{ asset('adminlte-v3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('adminlte-v3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function() {
            // Tambahkan event listener pada tombol "Tambah Data"
            $('#tambahDataButton').click(function() {
                $('#formAbsensiModal').modal('show'); // Menampilkan modal form absensi
            });

            // Tambahkan logika atau event listener lainnya di sini jika diperlukan
        });
</script>
@endsection
