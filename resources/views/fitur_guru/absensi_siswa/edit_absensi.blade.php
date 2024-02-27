@extends('layouts.layout_guru.master_guru')

@section('content_guru')
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

    <!-- Modal form absensi -->
    <div class="modal fade" id="formAbsensiModal" tabindex="-1" role="dialog" aria-labelledby="formAbsensiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="padding: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="formAbsensiModalLabel"><b>Tambah Absensi</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <!-- Tambahkan pilihan kelas lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>

                    <!-- Form untuk memilih tanggal -->
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-auto col-form-label px-3">Pilih
                            Tanggal :</label>
                        <div class="col-sm">
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body" style="padding: 2px;">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #315E77; color: white; text-align: center;">
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
                                    <td><input type="radio" name="status_1" value="hadir" checked> </td>
                                    <td><input type="radio" name="status_1" value="sakit"> </td>
                                    <td><input type="radio" name="status_1" value="izin"> </td>
                                    <td><input type="radio" name="status_1" value="alfa"> </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>12345678</td>
                                    <td>Aslan Said</td>
                                    <td><input type="radio" name="status_1" value="hadir" checked> </td>
                                    <td><input type="radio" name="status_1" value="sakit"> </td>
                                    <td><input type="radio" name="status_1" value="izin"> </td>
                                    <td><input type="radio" name="status_1" value="alfa"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <br>

                    <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                    <button type="submit" class="btn btn-primary float-right"> Tambah Data</button>

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
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        $(document).ready(function() {
            // Tambahkan event listener pada tombol "Tambah Data"
            $('#tambahDataButton').click(function() {
                $('#formAbsensiModal').modal('show'); // Menampilkan modal form absensi
            });

            // Tambahkan logika atau event listener lainnya di sini jika diperlukan
        });
    </script>
@endsection
