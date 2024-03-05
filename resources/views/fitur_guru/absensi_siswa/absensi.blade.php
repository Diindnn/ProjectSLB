@extends('layouts.layout_guru.master_guru')

@section('content_guru')
    <style>

         /* Aturan CSS untuk efek hover pada tombol "Tambah Data" */
         #tambahDataButton {
            background-color: #315E77; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            transition: background-color 0.3s, color 0.3s; /* Transisi untuk efek hover */
            border: none; /* Hilangkan border */
            padding: 8px 16px; /* Padding tombol */
            border-radius: 4px; /* Radius sudut tombol */
            cursor: pointer; /* Ubah cursor menjadi pointer saat dihover */
        }

        #tambahDataButton:hover {
            background-color: #275067; /* Ubah warna latar belakang saat tombol dihover */
        }

        /* Aturan CSS untuk tombol "Simpan Data" */
    #saveEditButton,
    #saveEditButton1 {
        background-color: #315E77; /* Warna latar belakang tombol */
        color: white; /* Warna teks tombol */
        border: none; /* Hilangkan border */
        padding: 8px 16px; /* Padding tombol */
        border-radius: 4px; /* Radius sudut tombol */
        cursor: pointer; /* Ubah cursor menjadi pointer saat dihover */
        transition: background-color 0.3s, color 0.3s; /* Transisi untuk efek hover */
    }

    /* Aturan CSS untuk efek hover pada tombol "Simpan Data" */
    #saveEditButton:hover,
    #saveEditButton1:hover {
        background-color: #275067; /* Ubah warna latar belakang saat tombol dihover */
    }
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

        #editSuccessMessage,
        #saveSuccessMessage {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 2px solid #28a745;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }

        #editSuccessMessage i {
            margin-right: 45px;
        }

        #saveSuccessMessage {
    display: none;
    position: fixed;
    top: 12%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    width: 25%;
    text-align: center;
}

    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Absensi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Absensi Siswa</li>
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
                            <div class="card-header d-flex justify-content-between align-items-center mt-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text">
                                            <!-- Form filter -->
                                            <form class="form-horizontal">
                                                <div class="form-group row mt-5">
                                                    <label for="inputKelas" class="col-md-2 col-form-label">Pilih Kelas</label>
                                                    <div class="col-md-4">
                                                        <select id="inputKelas" class="form-control">
                                                            <option selected>Pilih...</option>
                                                            <option>Kelas 1</option>
                                                            <option>Kelas 2</option>
                                                            <!-- Tambahkan pilihan kelas lainnya sesuai kebutuhan -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-1">
                                                <label for="inputTanggal" class="col-md-2 col-form-label">Pilih Tanggal</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" id="inputTanggal">
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                        <!-- Tombol "Tambah Data" -->
                                        <a href="#" id="tambahDataButton" class="btn ml-auto float-right">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </a>

                                </div>

                                <!-- Modal form absensi -->
                                <div class="modal fade" id="formAbsensiModal" tabindex="-1" role="dialog"
                                    aria-labelledby="formAbsensiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content" style="padding: 20px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formAbsensiModalLabel">Tambah Absensi</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form untuk memilih kelas -->
                                                <div class="form-group row">
                                                    <label for="kelas" class="col-sm-auto col-form-label px-4">Pilih
                                                        Kelas :</label>
                                                    <div class="col-sm">
                                                        <select class="form-control" id="kelas" name="kelas">
                                                            <option value="kelas1">Kelas 1</option>
                                                            <option value="kelas2">Kelas 2</option>
                                                            <option value="kelas3">Kelas 3</option>
                                                            <option value="kelas4">Kelas 4</option>
                                                            <option value="kelas5">Kelas 5</option>
                                                            <option value="kelas6">Kelas 6</option>
                                                            <option value="kelas7">Kelas 7</option>
                                                            <option value="kelas8">Kelas 8</option>
                                                            <option value="kelas9">Kelas 9</option>
                                                            <option value="kelas10">Kelas 10</option>
                                                            <option value="kelas11">Kelas 11</option>
                                                            <option value="kelas12">Kelas 12</option>
                                                            <!-- Tambahkan pilihan kelas lainnya sesuai kebutuhan -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Form untuk memilih tanggal -->
                                                <div class="form-group row">
                                                    <label for="tanggal" class="col-sm-auto col-form-label px-3">Pilih
                                                        Tanggal :</label>
                                                    <div class="col-sm">
                                                        <input type="date" class="form-control" id="tanggal"
                                                            name="tanggal">
                                                    </div>
                                                </div>

                                                <!-- /.card-header -->
                                                <div class="card-body" style="padding: 2px;">
                                                    <table id="example" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr
                                                                style="background-color: #315E77; color: white; text-align: center;">
                                                                <th>No</th>
                                                                <th>NISN</th>
                                                                <th>Nama Siswa</th>
                                                                <th>Hadir</th>
                                                                <th>Sakit</th>
                                                                <th>Izin</th>
                                                                <th>Alfa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>12345678</td>
                                                                <td>Aslan Said</td>
                                                                <td><input type="radio" name="status_1" value="hadir"
                                                                        checked> </td>
                                                                <td><input type="radio" name="status_1" value="sakit">
                                                                </td>
                                                                <td><input type="radio" name="status_1" value="izin">
                                                                </td>
                                                                <td><input type="radio" name="status_1" value="alfa">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>12345678</td>
                                                                <td>Aslan Said</td>
                                                                <td><input type="radio" name="status_2" value="hadir"
                                                                        checked> </td>
                                                                <td><input type="radio" name="status_2" value="sakit">
                                                                </td>
                                                                <td><input type="radio" name="status_2" value="izin">
                                                                </td>
                                                                <td><input type="radio" name="status_2" value="alfa">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>12345678</td>
                                                                <td>Aslan Said</td>
                                                                <td><input type="radio" name="status_2" value="hadir"
                                                                        checked> </td>
                                                                <td><input type="radio" name="status_2" value="sakit">
                                                                </td>
                                                                <td><input type="radio" name="status_2" value="izin">
                                                                </td>
                                                                <td><input type="radio" name="status_2" value="alfa">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>12345678</td>
                                                                <td>Aslan Said</td>
                                                                <td><input type="radio" name="status_3" value="hadir"
                                                                        checked> </td>
                                                                <td><input type="radio" name="status_3" value="sakit">
                                                                </td>
                                                                <td><input type="radio" name="status_3" value="izin">
                                                                </td>
                                                                <td><input type="radio" name="status_3" value="alfa">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> <br>

                                                <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                                                <div class="modal-footer" style="padding: 1px;">
                                                    <button type="submit" class="btn btn-primary float-right"
                                                        id="saveEditButton">Simpan Data</button>
                                                </div>
                                                <!-- /.popup -->
                                                <div id="saveSuccessMessage" class="alert alert-success"
                                                    style="display: none; text-align: center;">
                                                    <i class="fas fa-check-circle"></i> <strong>Sukses!</strong> Data
                                                    berhasil disimpan.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal form edit absensi -->
                                <div class="modal fade" id="formEditAbsensiModal1" tabindex="-1" role="dialog"
                                    aria-labelledby="formEditAbsensiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content" style="padding: 10px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formEditAbsensiModalLabel">Edit Absensi</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" style="padding: 2px;">
                                                    <table id="example" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr
                                                                style="background-color: #315E77; color: white; text-align: center;">
                                                                <th>No</th>
                                                                <th>NISN</th>
                                                                <th>Nama Siswa</th>
                                                                <th>Hadir</th>
                                                                <th>Sakit</th>
                                                                <th>Izin</th>
                                                                <th>Alfa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>12345678</td>
                                                                <td>Aslan Said</td>
                                                                <td><input type="radio" name="status_1" value="hadir"
                                                                        checked> </td>
                                                                <td><input type="radio" name="status_1" value="sakit">
                                                                </td>
                                                                <td><input type="radio" name="status_1" value="izin">
                                                                </td>
                                                                <td><input type="radio" name="status_1" value="alfa">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> <br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    id="saveEditButton1">Simpan perubahan</button>
                                            </div>
                                            <!-- Pesan pop-up "Data berhasil dirubah" -->
                                            <div id="editSuccessMessage" class="alert alert-success"
                                                style="display: none; position: absolute; top: 10px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 50%; text-align: center;">
                                                <i class="fas fa-check-circle"></i> <strong>Sukses!</strong> Data berhasil
                                                dirubah.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- card body utama -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #315E77; color: white; text-align: center;">
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Absen</th>
                                            <th>Status Kehadiran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        <tr>
                                            <td>1</td>
                                            <td>12345678</td>
                                            <td>Aslan Said</td>
                                            <td>5</td>
                                            <td>12 Agustus 2024</td>
                                            <td>Hadir</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm editButton" data-id="1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <button type="button" class="btn btn-danger btn-sm deleteButton"
                                                    data-id="2">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>12345678</td>
                                            <td>Aslan Said</td>
                                            <td>5</td>
                                            <td>12 Agustus 2024</td>
                                            <td>Hadir</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm editButton" data-id="1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm deleteButton"
                                                    data-id="2">
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
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="background-color: #315E77;">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>





    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables -->
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        // Tambahkan event listener ke semua tombol hapus
        var deleteButtons = document.querySelectorAll('.deleteButton');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id'); // Ambil id dari tombol hapus
                $('#deleteConfirmationModal').modal('show'); // Tampilkan modal konfirmasi
                // Set id pada tombol konfirmasi hapus
                $('#confirmDeleteButton').attr('data-id', id);
            });
        });

        // Menangani klik tombol konfirmasi hapus
        $('#confirmDeleteButton').click(function() {
            var id = $(this).attr('data-id'); // Ambil id dari tombol konfirmasi hapus
            // Di sini Anda dapat menambahkan logika penghapusan data jika diperlukan
            // Kemudian Anda bisa menutup modal konfirmasi setelah penghapusan berhasil dilakukan
            $('#deleteConfirmationModal').modal('hide');
            // Tambahkan logika penghapusan data dengan menggunakan id yang telah diperoleh
            console.log('Data dengan id ' + id + ' telah dihapus.');
        });

        $(document).ready(function() {
            // Tambahkan event listener pada tombol "Tambah Data"
            $('#tambahDataButton').click(function() {
                $('#formAbsensiModal').modal('show'); // Menampilkan modal form absensi
            });

            // Tambahkan logika atau event listener lainnya di sini jika diperlukan
        });

        // Tambahkan event listener ke semua tombol edit
        var editButtons = document.querySelectorAll('.editButton');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id'); // Ambil id dari tombol edit
                $('#formEditAbsensiModal1').modal('show'); // Tampilkan modal edit absensi
                // Di sini Anda dapat memuat data absensi yang sesuai berdasarkan id untuk diedit
            });
        });

        $(document).ready(function() {
            // Tambahkan event listener untuk tombol "Simpan perubahan"
            $('#saveEditButton1').click(function(e) {
                e.preventDefault(); // Menghentikan aksi bawaan dari tombol submit
                // Di sini Anda dapat menambahkan logika untuk menyimpan perubahan data ke database

                // Tampilkan pesan notifikasi
                $('#editSuccessMessage').fadeIn().delay(800)
            .fadeOut(); // Menampilkan pesan notifikasi selama 2 detik
            });
        });

        $(document).ready(function() {
            // Tambahkan event listener untuk tombol "Simpan Data"
            $('#saveEditButton').click(function(e) {
                e.preventDefault(); // Menghentikan aksi bawaan dari tombol submit
                // Di sini Anda dapat menambahkan logika untuk menyimpan data ke database

                // Tampilkan pesan notifikasi
                $('#saveSuccessMessage').fadeIn().delay(800)
            .fadeOut(); // Menampilkan pesan notifikasi selama 2 detik
            });
        });
    </script>
@endsection
