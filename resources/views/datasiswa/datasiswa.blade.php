@extends('layouts.master')

@section('content')
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
        height: 75px;
        margin-top: 5px;
    }

    .add-image-text {
        margin-top: 3px;
        font-size: 8px;
        color: black;
        border: 2px solid black;
        padding: 3px 8px;
        border-radius: 2px;
        background-color: #999696;
        border-color: black;
    }

    .file-label {
        margin-top: 3px;
        font-size: 8px;
        color: rgba(36, 34, 34, 0.7);
        padding: 0.5px 12px;
        cursor: pointer;
        border: 0.5px solid #c2c0c0;
        font-weight: 10;
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

    input[type="file"] {
        display: none;
    }

    /* Gaya tombol "Tambah Data" */
    .btn-tambah-data {
        background-color: #315E77;
        color: #ffffff;
        padding: 8px 16px;
        /* Sesuaikan padding sesuai kebutuhan */
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
        /* Animasi transisi */
    }

    /* Gaya tombol "Tambah Data" saat dihover */
    .btn-tambah-data:hover {
        background-color: #275067;
        /* Ubah warna latar belakang saat dihover */
        color: #ffffff;
        /* Ubah warna teks saat dihover */
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card-primary">
                    <div class="card-header" style="background: #315E77;"></div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('tambahdatasiswa') }}" class="btn ml-auto btn-tambah-data">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>

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
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nisn}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->jenis_kebutuhan}}</td>
                                        <td>{{$d->kelas}}</td>
                                        <td>
                                            <a href="{{ url('detailsiswa', $d->id) }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-info-circle"></i> Detail
                                            </a>
                                            <a href="{{ url('editsiswa', $d->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$d->id}}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
            <form action="{{url('hapusdatasiswa')}}" method="post">
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
<script src="{{asset('adminlte-v3')}}/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="{{asset('adminlte-v3')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
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
    });
</script>

@endsection
