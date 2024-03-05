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
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Grafik Semester Genap</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Grafik Semester Genap</li>
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
                                            <h5><b>PERIODE JANUARI - JUNI</b></h5>
                                        </div>
                                    </div>
                                    <!-- Form filter -->
                                    <form class="form-horizontal">
                                        <div class="form-group row mt-5">
                                            <label for="inputTahun" class="col-md-2 col-form-label">Pilih Tahun</label>
                                            <div class="col-md-4">
                                                <select id="inputTahun" class="form-control">
                                                    <option selected>Pilih...</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                    <option>2025</option>
                                                    <option>2026</option>
                                                    <option>2027</option>
                                                    <option>2028</option>
                                                    <option>2029</option>
                                                    <option>2031</option>
                                                    <option>2032</option>
                                                    <option>2033</option>
                                                    <option>2034</option>
                                                    <option>2035</option>
                                                    <option>2036</option>
                                                    <!-- Tambahkan tahun lainnya sesuai kebutuhan -->
                                                </select>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Line chart -->
                                    <div class="card card-info mt-5">
                                        <br>
                                        <div class="col text-center">
                                            <h5>Grafik Kemampuan Belajar</h5>
                                        </div>
                                        <div class="card-body mt-3">
                                            <!-- Tambahkan elemen canvas untuk chart di sini -->
                                            <canvas id="lineChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Keterangan -->
                                        <div class="legend mt-2 mb-4 text-center">
                                            <div class="legend-item">
                                                <span class="badge badge-primary legend-color"></span>
                                                <span class="legend-color"
                                                    style="background-color: rgba(60, 141, 188, 0.8); width: 30px; height: 10px;"></span>
                                                <span class="legend-text">Kemampuan Belajar</span>
                                            </div>

                                        </div>


                                        <!-- /.legend -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- Line chart -->
                                    <div class="card card-info mt-5">
                                        <br>
                                        <div class="col text-center">
                                            <h5>Grafik Kemandirian</h5>
                                        </div>
                                        <div class="card-body mt-3">
                                            <!-- Tambahkan elemen canvas untuk chart di sini -->
                                            <canvas id="lineChart2"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Keterangan -->
                                        <div class="legend mt-2 mb-4 text-center">
                                            <div class="legend-item">
                                                <span class="badge badge-primary legend-color"></span>
                                                <span class="legend-color"
                                                    style="background-color: rgba(223, 87, 33, 0.8); width: 30px; height: 10px;"></span>
                                                <span class="legend-text">Kemandirian</span>
                                            </div>
                                        </div>
                                        <!-- /.legend -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- Line chart -->
                                    <div class="card card-info mt-5">
                                        <br>
                                        <div class="col text-center">
                                            <h5>Grafik Keterampilan Bina Diri</h5>
                                        </div>
                                        <div class="card-body mt-3">
                                            <!-- Tambahkan elemen canvas untuk chart di sini -->
                                            <canvas id="lineChart3"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Keterangan -->
                                        <div class="legend mt-2 mb-4 text-center">
                                            <div class="legend-item">
                                                <span class="badge badge-primary legend-color"></span>
                                                <span class="legend-color"
                                                    style="background-color: rgba(100, 100, 100, 0.8); width: 30px; height: 10px;"></span>
                                                <span class="legend-text">Keterampilan Bina Diri</span>
                                            </div>
                                        </div>

                                        <!-- /.legend -->
                                    </div>
                                    <br><br> <br>
                                    <!-- /.card -->

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
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- LINE CHART -
            //--------------
            $(function() {
                var lineChartCanvas = $('#lineChart').get(0).getContext('2d');

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
                        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5',
                            'Minggu 6', 'Minggu 7', 'Minggu 8', 'Minggu 9', 'Minggu 10',
                            'Minggu 11', 'Minggu 12', 'Minggu 13', 'Minggu 14', 'Minggu 15',
                            'Minggu 16', 'Minggu 17', 'Minggu 18', 'Minggu 19', 'Minggu 20',
                            'Minggu 21', 'Minggu 22', 'Minggu 23', 'Minggu 24',

                        ],
                        datasets: [{
                            label: 'Kemampuan Belajar',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: 5,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',

                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            fill: false,
                            data: [0, 1, 2, 3, 4, 5, 1, 1, 1, 1, 1, 1, 1,
                                1,
                            ] // Sesuaikan dengan data Anda
                        }]
                    },
                    options: lineChartOptions
                });
            });

            $(function() {
                var lineChartCanvas2 = $('#lineChart2').get(0).getContext('2d');

                var lineChartOptions2 = {
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


                var lineChart2 = new Chart(lineChartCanvas2, {
                    type: 'line',
                    data: {
                        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5',
                            'Minggu 6', 'Minggu 7', 'Minggu 8', 'Minggu 9', 'Minggu 10',
                            'Minggu 11', 'Minggu 12', 'Minggu 13', 'Minggu 14', 'Minggu 15',
                            'Minggu 16', 'Minggu 17', 'Minggu 18', 'Minggu 19', 'Minggu 20',
                            'Minggu 21', 'Minggu 22', 'Minggu 23', 'Minggu 24',

                        ],
                        datasets: [{
                            label: 'Kemandirian',
                            borderColor: 'rgba(223, 87, 33, 0.8)',
                            pointRadius: 5,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',

                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            fill: false,
                            data: [0, 1, 2, 3, 4, 5, 1, 1, 1, 1, 1, 1, 1,
                                1,
                            ] // Sesuaikan dengan data Anda
                        }]
                    },
                    options: lineChartOptions2
                });
            });


            $(function() {
                var lineChartCanvas3 = $('#lineChart3').get(0).getContext('2d');

                var lineChartOptions3 = {
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


                var lineChart3 = new Chart(lineChartCanvas3, {
                    type: 'line',
                    data: {
                        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5',
                            'Minggu 6', 'Minggu 7', 'Minggu 8', 'Minggu 9', 'Minggu 10',
                            'Minggu 11', 'Minggu 12', 'Minggu 13', 'Minggu 14', 'Minggu 15',
                            'Minggu 16', 'Minggu 17', 'Minggu 18', 'Minggu 19', 'Minggu 20',
                            'Minggu 21', 'Minggu 22', 'Minggu 23', 'Minggu 24',

                        ],
                        datasets: [{
                            label: 'Keterlambatan Perkembangan',
                            borderColor: 'rgba(100, 100, 100, 0.8)',
                            pointRadius: 5,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',

                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            fill: false,
                            data: [0, 1, 2, 3, 4, 5, 1, 1, 1, 1, 1, 1, 1,
                                1,
                            ] // Sesuaikan dengan data Anda
                        }]
                    },
                    options: lineChartOptions3
                });
            });
        })
    </script>
    </body>

    </html>
@endsection
