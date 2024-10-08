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

    /* Gaya tombol "Tambahkan Data" */
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
                    <h1>
                        <a href="{{ url()->previous() }}" class="text-dark" style="font-size: 17px;">
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Tambah Data Guru
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Guru</a></li>
                        <li class="breadcrumb-item active">Tambah Data Guru</li>
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
                        < role="form" id="addTeacherForm" action="{{url('simpandataguru')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body mt-4">
                                <div class="row">
                                    <div class="col-md-3"> <!-- Kotak file foto profil -->
                                        <div class="form-group mt-1" style=" padding-left: 40px" 80px>
                                            <label for="exampleInputFile" class="profile-box">
                                                <input type="file" class="custom-file-input" name="foto" accept="image/*" onchange="previewImage(event)" required>
                                                <img src="{{ asset('images') }}/profile.png" alt="Your Image" class="profile-icon" id="preview">
                                                <label for="foto" class="file-labels" id="tambahfoto">Tambah foto</label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9"> <!-- Kolom untuk input email address dan password -->
                                        <div class="form-group row">
                                            <div class="col-md-12"> <!-- Kolom untuk input email -->
                                                <label>Nama </label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>NUPTK </label>
                                                <input type="text" class="form-control" name="nuptk" required>
                                                @error('nuptk')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Jenis Kelamin </label>
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Pendidikan Terakhir </label>
                                                <select name="pendidikan" class="form-control" required>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Alamat </label>
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>NO.HP </label>
                                                <input type="text" class="form-control" name="nohp" required>
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Mengajar Kelas </label>
                                                <input type="text" class="form-control" name="kelas" required>
                                                <input type="text" class="form-control" name="kelass" placeholder="Kelas ke 2 (opsional)">
                                                <input type="text" class="form-control" name="kelasss" placeholder="Kelas ke 3 (opsional)">
                                                <input type="text" class="form-control" name="kelassss" placeholder="Kelas ke 4 (opsional)">
                                            </div>
                                            <div class="col-md-12 mt-3"> <!-- Kolom untuk input password -->
                                                <label>Email </label>
                                                <input type="email" class="form-control" name="email" required>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right" style="padding-right: 40px;">
                                <!-- Mengatur tombol ke kanan dan mengubah warnanya -->
                                <button type="submit" class="btn btn-tambahkan">Tambahkan Data</button>
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
                                            Data berhasil ditambahkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #315E77;">Tutup</button>
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
                                output.width = 140;
                                output.height = 220;
                                var btn = document.getElementById('tambahfoto');
                                btn.style.display = 'none';
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }

                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("addTeacherForm").addEventListener("submit", function(event) {

                                $('#successModal').modal('show');
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
