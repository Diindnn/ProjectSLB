@extends('layouts.master')

@section('content')
    <style>
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

        /* Gaya tombol "Edit Data" */
        .btn-edit-data {
            background-color: #315E77;
            color: #ffffff;
            padding: 8px 16px;
            /* Sesuaikan padding sesuai kebutuhan */
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            /* Animasi transisi */
        }

        /* Gaya tombol "Edit Data" saat dihover */
        .btn-edit-data:hover {
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
                        <h1>
                            <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                                <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Detail Data Siswa
                        </h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
                            <li class="breadcrumb-item active">Detail Data Siswa</li>
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
                                                    <label for="exampleInputEmail1">Nama :</label>
                                                    <input type="name" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Nurul Awaliyah">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">NISN :</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="12345678">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">Jenis Kelamin :</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Perempuan">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">Kelas :</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="5">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">Jenis Kebutuhan:</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Tunagrahita">
                                                </div>
                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">Alamat :</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="JL.Nangka 1">
                                                </div>

                                                <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                    <label for="exampleInputPassword1">Wali Murid:</label>
                                                    <input type="pasname" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Siti Mutmainah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right" style="padding-right: 25px;">
                                    <a href="{{ route('editsiswa') }}" class="btn btn-edit-data">Edit Data</a>
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
