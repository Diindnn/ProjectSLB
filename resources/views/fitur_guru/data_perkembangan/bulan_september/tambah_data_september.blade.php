@extends('layouts.layout_guru.master_guru')

@section('content_guru')

<style>
    .btn-tambahkan {
        background-color: #315E77;
        color: #ffffff;
        padding: 8px 16px;
        /* Sesuaikan padding sesuai kebutuhan */
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
        /* Animasi transisi */
    }

    /* Gaya tombol "Tambahkan Data" saat dihover */
    .btn-tambahkan:hover {
        background-color: #275067;
        /* Ubah warna latar belakang saat dihover */
        color: #ffffff;
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
                    <h3>
                        <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Tambah Laporan Perkembangan
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Semester Ganjil</a></li>
                        <li class="breadcrumb-item active">Tambah Laporan</li>
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
                                <label for="exampleInputEmail1">A. Kemampuan Belajar</label>

                                <div class="form-group mb-6">
                                    <label for="exampleInputEmail1">1. Kemampuan Menulis</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control" style="margin-bottom: 0px;">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="Input" class="form-control" id="exampleInputKeteran" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">2. Kemampuan Membaca</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">3. Kemampuan Berhitung</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>


                                <label for="exampleInputEmail1">A. Kemandirian</label>

                                <div class="form-group mb-6">
                                    <label for="exampleInputEmail1">1. Memakai Kaos Kaki dan Sepatu</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control" style="margin-bottom: 0px;">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="Input" class="form-control" id="exampleInputKeteran" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">2. Kemampuan Berpakaian</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">3. Kecakapan Makan</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>

                                <label for="exampleInputEmail1">C. Kemandirian</label>

                                <div class="form-group mb-6">
                                    <label for="exampleInputEmail1">1. Menjaga Kebersihan Lingkungan</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control" style="margin-bottom: 0px;">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="Input" class="form-control" id="exampleInputKeteran" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">2. Kemampuan Membuat Minum</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-1">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">3. Membuat Prakarya Sederhana</label>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <select id="inputSkala" class="form-control">
                                                    <option>Pilih Skala</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <input type="email" class="form-control mt-1" id="exampleInputEmail1" placeholder="Input Keterangan / Catatan">
                                </div>

                                <div class="card-footer text-right" style="padding-right: 40px;">
                                    <!-- Mengatur tombol ke kanan dan mengubah warnanya -->
                                    <button type="submit" class="btn btn-tambahkan">Simpan Data</button>
                                </div>

                                <!-- Pop-up berhasil ditambahkan -->
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Sukses!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Data berhasil ditambahkan
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #315E77;">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

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
@endsection
