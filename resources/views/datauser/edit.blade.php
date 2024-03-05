@extends('layouts.master')

@section('content')

<style>
    /* Gaya tombol submit */
.btn-custom {
    background-color: #315E77; /* Ganti dengan warna yang Anda inginkan */
    color: white; /* Warna teks */
    border: none; /* Hapus border jika tidak diperlukan */
    transition: background-color 0.3s; /* Animasi transisi */
}

/* Gaya tombol submit saat dihover */
.btn-custom:hover {
    background-color: #275067; /* Ganti dengan warna hover yang Anda inginkan */
    color: white;
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
                                <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Edit Data User
                        </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit Data</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background: #315E77;"></div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="addTeacherForm">
                                <div class="card-body">
                                    <p> <b>Akun Orang Tua</b></p>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Aslan Said">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="aslansaid@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="12345678">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-custom">Simpan</button>
                                </div>
                                <!-- Pop-up berhasil ditambahkan -->
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Sukses!</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Data berhasil disimpan
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="background: #315E77;">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>




                    <script>
                        function previewImage(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                var output = document.getElementById('preview');
                                output.src = reader.result;
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("addTeacherForm").addEventListener("submit", function(event) {
                                event.preventDefault(); // menghentikan pengiriman formulir
                                // Tampilkan pop-up berhasil
                                $('#successModal').modal('show');
                                // Anda juga bisa menambahkan logika lain di sini, seperti mengirimkan data formulir ke server menggunakan AJAX
                            });
                        });
                    </script>

                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
