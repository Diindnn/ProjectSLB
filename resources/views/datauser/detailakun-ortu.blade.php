@extends('layouts.master')

@section('content')

<style>
    /* Gaya tombol "Tambah Data" */
.btn-tambah-data {
    background-color: #315E77;
    color: white;
    transition: background-color 0.3s; /* Animasi transisi */
}

/* Gaya tombol "Tambah Data" saat dihover */
.btn-tambah-data:hover {
    background-color: #235068; /* Ubah warna latar belakang saat dihover */
    color: white;
}


</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Detail Akun Orang Tua
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Detail Akun Orang Tua</a></li>
                        <li class="breadcrumb-item active">Data User</li>
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
                        <div class="card-header d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ url('tambahakun-ortu') }}" class="btn ml-auto btn-tambah-data">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #315E77; color: white; text-align: center;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>
                                            <a href="{{ url('editakun', $d->id) }}" class="btn btn-info btn-sm">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Pop-up konfirmasi hapus -->
@foreach($data as $d)
<div class="modal fade" id="delete{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$d->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{$d->id}}Label">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('hapusakun')}}" method="post">
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
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte-v3')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{asset('adminlte-v3')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('adminlte-v3')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte-v3')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte-v3')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    // Tambahkan event listener ke semua tombol hapus
    var deleteButtons = document.querySelectorAll('.deleteButton');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var itemId = $(this).data('id');
            $('#deleteItemId').val(itemId);
            $('#deleteConfirmationModal').modal('show'); // Tampilkan modal konfirmasi
        });
    });

    // Menangani klik tombol konfirmasi hapus
    document.getElementById("confirmDeleteButton").addEventListener("click", function() {
        // Di sini Anda dapat menambahkan logika penghapusan data jika diperlukan
        // Kemudian Anda bisa menutup modal konfirmasi setelah penghapusan berhasil dilakukan
        $('#deleteConfirmationModal').modal('hide');
    });
</script>
@endsection

