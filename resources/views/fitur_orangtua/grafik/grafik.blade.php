@extends('layouts.layout_orangtua.master_orangtua')

@section('content_orangtua')
<style>
    .legend-color {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 5px;
        border-radius: 3px;
    }

    .btn-primary {
        background-color: #315E77;
        /* Ganti dengan kode warna yang diinginkan */
        border-color: #YourColor;
        /* Ganti dengan kode warna yang sama dengan background-color atau warna yang sesuai */
        color: #fff;
        /* Warna teks pada tombol */
    }

    /* Efek hover */
    .btn-primary:hover {
        background-color: #275067;
        /* Warna yang diinginkan saat tombol dihover */
        border-color: #YourHoverColor;
        /* Warna border saat tombol dihover */
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Grafik Semester Ganjil {{ucwords(request()->segment(3))}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Grafik Semester {{ucwords(request()->segment(3))}}</li>
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
                        <div class="card-header d-flex justify-content-between align-items-center mt-4 mb">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5><b>GRAFIK PERKEMBANGAN BELAJAR ANAK</b></h5>
                                        <h5><b>PERIODE {{request()->segment(2) == 'ganjil' ? 'JULI - DESEMBER' :
                                                'JANUARI - JUNI'}}</b></h5>
                                    </div>
                                </div>
                                <!-- Form filter -->
                                <form class="form-horizontal"
                                    action="{{url('grafikperkembangan', request()->segment(2))}}" method="get">
                                    <div class="form-group row mt-5">
                                        <label class="col-md-2 col-form-label">Pilih Siswa</label>
                                        <div class="col-md-4">
                                            <select name="idSiswa" class="form-control">
                                                @foreach($siswa as $s)
                                                <option value="{{$s->id}}" {{$s->id == $idSiswa ? 'selected':
                                                    ''}}>{{$s->nama}} (Kelas {{$s->kelas}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-1">
                                        <label for="inputTahun" class="col-md-2 col-form-label">Pilih Tahun</label>
                                        <div class="col-md-4">
                                            <select id="inputTahun" name="tahun" class="form-control">
                                                @foreach($tahuns as $t)
                                                <option value="{{$t}}" {{$t==$tahun ? 'selected' : '' }}>{{$t}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($datagrafik as $aspek => $grafik)
                            <div class="card card-info mt-5">
                                <div class="col text-center mt-3">
                                    <h5>Grafik {{$aspek}}</h5>
                                </div>
                                <div class="card-body mt-3">
                                    <canvas id="{{ Illuminate\Support\Str::slug($aspek) }}"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>

                                <div class="legend mt-2 mb-4 text-center">
                                    <div class="legend-item">
                                        <span class="badge badge-primary legend-color"></span>
                                        <span class="legend-color"
                                            style="background-color: rgba(60, 141, 188, 0.8); width: 30px; height: 10px;"></span>
                                        <span class="legend-text">{{$aspek}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-6 mt-4">
                                <p style="margin-bottom: 0;">Keterangan Skala Penilaian:</p>
                                <ul>
                                    <li>1 = Siswa tidak memberikan respon</li>
                                    <li>2 = Siswa belum mampu meski sudah diberi bantuan</li>
                                    <li>3 = Siswa mampu dengan banyak bantuan</li>
                                    <li>4 = Siswa mampu dengan sedikit bantuan</li>
                                    <li>5 = Siswa sudah mampu secara mandiri</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte-v3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte-v3') }}/plugins/chart.js/Chart.min.js"></script>

<!-- page script -->
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- LINE CHART -
        //--------------
        @foreach($datagrafik as $aspek => $grafik)
        $(function () {
            var lineChartCanvas = $('#{{ Illuminate\Support\Str::slug($aspek) }}').get(0).getContext('2d');

            var lineChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: false, // Tidak menggambar garis tepi pada sumbu y
                            color: "rgba(0, 0, 0, 0.1)", // Warna garis vertikal
                            zeroLineColor: "rgba(0, 0, 0, 0.1)" // Warna garis vertikal pada nilai 0
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1, // Menentukan jarak antara setiap nilai
                            padding: 30,
                            max: 5
                        },
                        barPercentage: 50, // Menentukan lebar relatif dari setiap kategori pada sumbu y
                        categoryPercentage: 20 // Menentukan lebar relatif dari setiap kategori pada sumbu y
                    }]
                }
            };

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: {
                    labels: {!! json_encode($minggu) !!},
                datasets: [{
                    label: '{{ $aspek }}',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: 5,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',

                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    fill: false,
                    data: {!! json_encode($grafik) !!}
                    }]
                },
        options: lineChartOptions
            });
        });
    @endforeach
    })
</script>
</body>

</html>
@endsection
