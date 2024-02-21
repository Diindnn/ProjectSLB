@extends('layouts.master')

@section('content')
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
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                                Data berhasil ditambahkan.
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
