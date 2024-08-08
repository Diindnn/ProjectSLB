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
                            <i class="fas fa-arrow-left" style="padding-right: 15px;"></i></a>Tambah Laporan
                        Perkembangan
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Semester {{$semester == '1 (Satu)' ? 'Ganjil': 'Genap'}}</a></li>
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
                        <form role="form" id="addTeacherForm" action="{{ url('/dataperkembangan/' . $bulan . '/tambah') }}" method="post">
                            @csrf
                            <input type="hidden" name="siswa" value="{{$siswa}}">
                            <input type="hidden" name="minggu" value="{{$minggu}}">
                            <input type="hidden" name="tahun" value="{{$tahun}}">
                            <div class="card-body">
                                @foreach ($pertanyaan as $aspek => $per)
                                <label>{{$aspek}}</label>
                                @foreach ($per as $p)
                                <div class="form-group mb-6">
                                    <label for="exampleInputEmail1">{{$loop->iteration}}. {{$p->indikasi}}</label>
                                    <div class="form-group row">
                                        <div class="col-md-12 mt-1">
                                            <select id="inputSkala" class="form-control" name="skala[{{$p->id}}]" required>
                                                <option value="" selected disabled>Pilih Skala</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="note[{{$p->id}}]" placeholder="Input Keterangan / Catatan" required>
                                </div>
                                @endforeach
                                <br>
                                @endforeach

                                <div class="card-footer text-right" style="padding-right: 40px;">
                                    <button type="submit" class="btn btn-tambahkan">Simpan Data</button>
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
                                                Data berhasil ditambahkan
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
        reader.onload = function () {
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("addTeacherForm").addEventListener("submit", function (event) {
            //event.preventDefault(); // menghentikan pengiriman formulir
            // Tampilkan pop-up berhasil
            $('#successModal').modal('show');
            // Anda juga bisa menambahkan logika lain di sini, seperti mengirimkan data formulir ke server menggunakan AJAX
        });
    });
</script>
@endsection
