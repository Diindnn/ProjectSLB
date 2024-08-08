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
                                                    <img src="{{ asset($data->foto) }}" class="image" alt="SLB Insan Prima bestari" style="max-width: 100%; height: auto; ">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9"> <!-- Kolom untuk input email address dan password -->
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Nama :</label>
                                                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>NISN :</label>
                                                <input type="text" class="form-control" name="nisn" value="{{$data->nisn}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Jenis Kelamin :</label>
                                                <input type="text" class="form-control" name="jenis_kelamin" value="{{$data->jenis_kelamin}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Kelas :</label>
                                                <input type="text" class="form-control" name="kelas" value="{{$data->kelas}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Jenis Kebutuhan:</label>
                                                <input type="text" class="form-control" name="jenis_kebutuhan" value="{{$data->jenis_kebutuhan}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Alamat :</label>
                                                <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Nama Orangtua / Wali Murid :</label>
                                                <input type="text" class="form-control" name="nama_orangtua" value="{{$data->nama_orangtua}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>No.Hp :</label>
                                                <input type="number" class="form-control" name="nohp" value="{{$data->nohp}}" readonly>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Wali Murid:</label>
                                                <input type="text" class="form-control" name="wali_murid" value="{{$data->wali_murid}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right" style="padding-right: 25px;">
                                <a href="{{ url('editsiswa', $data->id) }}" class="btn btn-edit-data">Edit Data</a>
                            </div>
                        </form>
                    </div>
                    <script>
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
