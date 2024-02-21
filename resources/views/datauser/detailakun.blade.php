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

</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Detail Akun Guru
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Detail Akun Guru</a></li>
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
                            <a href="{{ route('tambahdata') }}" class="btn ml-auto" style="background-color: #315E77; color:white">
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
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    <tr>
                                        <td>1</td>
                                        <td>Aslan Said</td>
                                        <td>aslansaid@gmail.com</td>
                                        <td>12345678</td>
                                        <td>
                                            <a href="{{ route('edit') }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm deleteButton">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Aslan said</td>
                                        <td>aslansaid@gmail.com</td>
                                        <td>12345678</td>
                                        <td>
                                            <a href="{{ route('edit') }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm deleteButton">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
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
                <button type="button" class="btn btn-danger" id="confirmDeleteButton" >Hapus</button>

            </div>
        </div>
    </div>
</div>

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

