@extends('layouts.layout_guru.master_guru')

@section('content_guru')
    <style>
        /* CSS untuk efek hover pada tombol "Tambahkan Data" */
        .btn-submit {
            background-color: #315E77;
            /* Warna latar belakang tombol */
            color: #ffffff;
            /* Warna teks tombol */
            transition: background-color 0.3s ease;
            /* Animasi transisi */
            border: none;
            /* Menghapus border */
        }

        .btn-submit:hover {
            background-color: #275067;
            /* Warna latar belakang tombol saat dihover */
            cursor: pointer;
            /* Mengubah kursor menjadi pointer saat dihover */
            color: white;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(4, 1fr);
            gap: 5px;
            /* Jarak antar kotak */
        }

        .profile-box {
            position: relative;
            width: 100%;
            height: auto;
            border: 1px solid #ccc;
            /* Menambah border */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .profile-icon {
            font-size: 120px;
            /* Ukuran ikon */
            margin-bottom: 5px;
            /* Jarak antara ikon dan tulisan */
            align-content: center;
            color: #999696
        }

        .custom-file-input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .profile-box {
            width: 150px;
            height: 190px;
            border: 4px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }


        .custom-file-labels {
            display: none;
            /* Sembunyikan tulisan "Pilih File" */
        }

        .file-labels {
            position: relative;
            padding: 0.5px 12px;
            text-align: center;

            cursor: pointer;
            /* Pointer ketika di hover */
            font-size: 10px;
            /* Mengatur ukuran font */
            border: 1px solid #222222;
            /* Menambahkan border pada teks */
            margin-top: 3px;
            color: rgba(36, 34, 34, 0.7);
            font-weight: 10;
            /* Mengatur ketebalan font menjadi normal */

        }
    </style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                                <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Profil Guru
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profil Guru</li>
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
                                <div class="card-body mt-4">
                                    <div class="row">
                                        <div class="col-md-3"> <!-- Kotak file foto profil -->
                                            <div class="form-group mt-1" style="padding-left: 30%;">
                                                <label for="exampleInputFile" class="profile-box">
                                                    <div class="logo-container text-center">
                                                        <img src="{{ asset('images') }}/fotoguru.jpg" class="image"
                                                            alt="SLB Insan Prima bestari"
                                                            style="max-width: 100%; height: auto; ">
                                                    </div>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-9"> <!-- Kolom untuk input email address dan password -->
                                            <div class="form-group row">
                                                <div class="col-md-12"> <!-- Kolom untuk input email -->
                                                    <label for="nama">Nama </label>
                                                    <input type="email" class="form-control" id="nama"
                                                        placeholder="Ahmad Farizal">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="noInduk">NUPTK </label>
                                                    <input type="name" class="form-control" id="noInduk"
                                                        placeholder="123456798">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="jenisKelamin">Jenis Kelamin </label>
                                                    <input type="name" class="form-control" id="jenisKelamin"
                                                        placeholder="Laki-laki">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="pendidikan">Pendidikan Terakhir </label>
                                                    <input type="name" class="form-control" id="pendidikan"
                                                        placeholder="S1">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="alamat">Alamat </label>
                                                    <input type="name" class="form-control" id="alamat"
                                                        placeholder="JL.Harapan 1">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="telepon">No.Hp</label>
                                                    <input type="name" class="form-control" id="telepon"
                                                        placeholder="08212345671">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="kelas">Mengajar Kelas </label>
                                                    <input type="name" class="form-control" id="kelas"
                                                        placeholder="5">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="email">Email </label>
                                                    <input type="password" class="form-control" id="email"
                                                        placeholder="amad123@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                <!-- /.card-footer -->
                            </form>
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
