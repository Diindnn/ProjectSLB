@extends('layouts.master')

@section('content')
<style>
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

    /* Gaya tombol tambah data */
    .btn-tambah {
        background-color: #315E77;
        color: white;
        padding: 8px 16px;
        /* Sesuaikan padding sesuai kebutuhan */
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
        /* Animasi transisi */
    }

    /* Gaya tombol tambah data saat dihover */
    .btn-tambah:hover {
        background-color: #275067;
        /* Ubah warna latar belakang saat dihover */
        color: white;
        /* Ubah warna teks saat dihover */
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Guru</li>
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
                            <a href="{{ url('tambahdataguru') }}" class="btn ml-auto btn-tambah">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #315E77; color: white; text-align: center;">
                                        <th>No</th>
                                        <th>NUPTK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nuptk}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->jenis_kelamin}}</td>
                                        <td>{{$d->pendidikan}}</td>
                                        <td>
                                            <a href="{{ url('detailguru', $d->id) }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-info-circle"></i> Detail
                                            </a>
                                            <a href="{{ url('editguru', $d->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$d->id}}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
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


<!-- Pop-up konfirmasi hapus -->
@foreach($data as $d)
<div class="modal fade" id="delete{{$d->id}}" tabindex="-1" role="dialog"
    aria-labelledby="delete{{$d->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{$d->id}}Label">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('hapusdataguru')}}" method="post">
                @csrf
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                    <input type="hidden" id="deleteItemId" name="id" value="{{$d->id}}">
                </div>
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

    // Tambahkan event listener ke semua tombol hapus
    var deleteButtons = document.querySelectorAll('.deleteButton');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var itemId = $(this).data('id');
            $('#deleteItemId').val(itemId);
            $('#deleteConfirmationModal').modal('show'); // Tampilkan modal konfirmasi
        });
    });

    // Menangani klik tombol konfirmasi hapus
    $('#confirmDeleteButton').click(function () {
        $('#deleteConfirmationModal').modal('hide');
    });
</script>
@endsection
