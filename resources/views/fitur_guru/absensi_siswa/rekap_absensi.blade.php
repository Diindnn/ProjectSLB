@extends('layouts.layout_guru.master_guru')

@section('content_guru')
    <style>
        .profile-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        /* Gaya CSS untuk tabel yang dapat digulir secara horizontal */
    .table-responsive {
        overflow-x: auto;
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
            /* Mengatur lebar gambar */
            height: 75px;
            /* Mengatur tinggi gambar */

            margin-top: 5px;
        }

        .add-image-text {
            margin-top: 3px;
            font-size: 8px;
            /* Ukuran teks "Tambah Gambar" */
            color: black;
            ;
            border: 2px solid black;
            /* Menambahkan border pada teks */
            padding: 3px 8px;
            /* Menambahkan padding pada teks */
            border-radius: 2px;
            /* Melengkungkan sudut border */
            background-color: #999696 border-color: black;
        }

        .file-label {
            margin-top: 3px;
            font-size: 8px;
            /* Mengatur ukuran font menjadi 8px */
            color: rgba(36, 34, 34, 0.7);
            padding: 0.5px 12px;
            /* Atur padding untuk membuat label lebih berbeda */
            cursor: pointer;
            /* Menjadikan kursor menjadi tanda pointer saat mengarah ke label */
            border: 0.5px solid #c2c0c0;
            /* Menambahkan border pada teks */
            font-weight: 10;
            /* Mengatur ketebalan font menjadi normal */
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

        /* Menyembunyikan input file */
        input[type="file"] {
            display: none;
        }
        #example1 thead th:nth-child(-n+3) {
    position: sticky;
    left: 0;
    z-index: 2;
    background-color: #fff; /* Sesuaikan dengan warna latar belakang konten Anda */
}


    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rekap Absensi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Rekap Absensi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card-primary">
                        <div class="card-header" style="background: #315E77;"></div>

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center mt-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Rekap Absensi Bulanan</h4>
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
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: #315E77; color: white; text-align: center;">
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <!-- Buat 31 kolom untuk tanggal -->
                                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                    <th><?= $i ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center">
                                            <tr>
                                                <td>1</td>
                                                <td>987654321</td>
                                                <td>Aslan Said</td>
                                                <!-- Isi setiap sel dengan "H" -->
                                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                    <td>H</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>123456789</td>
                                                <td>Ahmad Dhani</td>
                                                <!-- Isi setiap sel dengan "H" -->
                                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                    <td>H</td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
    <script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte-v3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
       $(function() {
    // Hancurkan instance DataTables yang sudah ada, jika ada
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    // Inisialisasi DataTables
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "scrollX": true, // Aktifkan pengguliran horizontal
        "ordering": false // Nonaktifkan pengurutan kolom
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
    </script>
@endsection
