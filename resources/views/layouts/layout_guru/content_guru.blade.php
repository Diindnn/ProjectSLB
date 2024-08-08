<style>
    .card {
        max-width: 100%;
    }

    .card-body {
        padding: 20px;
    }

    .logo-container {
        margin-bottom: 20px;
    }

    .logo-container img {
        max-width: 100%;
        height: auto;
    }

    .text-container {
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .card {
            width: 100%;
        }

        .logo-container img {
            width: 100px;
            height: 100px;
        }

        .text-container {
            font-size: 14px;
        }
    }
</style>

@extends('layouts.layout_guru.master_guru')

@section('content_guru')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner"> <br><br>
                            <p>Profil Guru</p>
                        </div>
                        <div class="icon">
                            <i class=" fas fa-solid fa-user-tie"></i>
                        </div>
                        <a href="/guru/profil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner"><br><br>
                            <p>Absensi Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-file-signature"></i>
                        </div>
                        <a href="/absensi_siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner"> <br>
                            <p class="text-white">Data <br>Perkembangan</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-chart-bar"></i>
                        </div>
                        <a href="/dataperkembangan/7" class="small-box-footer text-white" style="color: white;">More info <i class="fas fa-arrow-circle-right text-white"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner"> <br>
                            <p>Grafik <br>Perkembangan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <a href="/grafikperkembangan/ganjil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Left col -->
            <div class="card" style="background-color: #CDD6DB;">
                <br> <br> <br> <br> <br>
                <div class="card-body" style="padding: 20px;">
                    <div class="logo-container text-center" style="margin-bottom: 20px;">
                        <img src="{{ asset('images') }}/download.png" class="image" alt="SLB Insan Prima bestari" style="max-width: 100%; height: auto; width: 170px; height: 170px;">
                    </div>
                    <div class="text-container" style="margin-bottom: 20px;">
                        <h3 class="text-center font-weight-bold">SLB INSAN PRIMA BESTARI</h3>
                        <p class="text-center" style="margin-bottom: 0;">Alamat : Jl. Pulau Bawean, Gg.Titilas No.52
                            Sukarame, Kota Bandar Lampung</p>
                        <p class="text-center mt-1" style="margin-bottom: 0;">No.Telpon : 085793955537</p>
                        <p class="text-center mt-1" style="margin-bottom: 0;">NPSN : 69892327</p>

                    </div>
                    <br> <br> <br> <br> <br>
                </div>
            </div>



    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
