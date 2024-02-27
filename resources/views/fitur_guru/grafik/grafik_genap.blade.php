@extends('layouts.layout_guru.master_guru')

@section('content_guru')
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
                            <li class="breadcrumb-item"><a href="#">Rekap Absensi</a></li>
                            <li class="breadcrumb-item active">Home</li>
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
                            <div class="card-header d-flex justify-content-between align-items-center mt-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5>GRAFIK PERKEMBANGAN BELAJAR ANAK</h5>
                                            <h5>PERIODE JULI-DESEMBER</h5>
                                        </div>
                                    </div>
                                    <!-- Line chart -->
                                    <div class="card card-info mt-5">
                                        <div class="card-body">
                                            <!-- Tambahkan elemen canvas untuk chart di sini -->
                                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            // Data untuk chart
            var data = {
                labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4", "Minggu 5", "Minggu 6", "Minggu 7", "Minggu 8", "Minggu 9", "Minggu 10", "Minggu 11", "Minggu 12", "Minggu 13", "Minggu 14"],
                datasets: [{
                    label: 'Perkembangan Belajar Anak',
                    data: [3, 4, 4, 3, 5, 2, 4, 3, 4, 5, 3, 4, 5, 4], // Data vertikal
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                }]
            };

            // Konfigurasi chart
            var config = {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    }
                },
            };

            // Menggambar chart
            var lineChart = new Chart(
                document.getElementById('lineChart'),
                config
            );
        });
    </script>
@endsection

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Line Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @extends('layouts.layout_guru.master_guru')

@section('content_guru')
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
                        <li class="breadcrumb-item"><a href="#">Rekap Absensi</a></li>
                        <li class="breadcrumb-item active">Home</li>
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
                        <div class="card-header d-flex justify-content-between align-items-center mt-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5>GRAFIK PERKEMBANGAN BELAJAR ANAK</h5>
                                        <h5>PERIODE JULI-DESEMBER</h5>
                                    </div>
                                </div>
                                <!-- Line chart -->
                                <div class="card card-info mt-5">
                                    <div class="card-body mt-5">
                                        <!-- Tambahkan elemen canvas untuk chart di sini -->
                                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="legend mt-2">
                                        <span class="badge badge-primary">Keterlambatan Perkembangan</span>
                                        <span class="badge badge-secondary">Keterampilan Bina Diri</span>
                                        <span class="badge badge-success">Keterampilan Sosial</span>
                                    </div>
                                </div>
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
<script src="{{asset('adminlte-v3')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte-v3')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte-v3')}}/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte-v3')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte-v3')}}/dist/js/demo.js"></script>
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
    $(function () {
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
            },
            barPercentage: 50, // Menentukan lebar relatif dari setiap kategori pada sumbu y
            categoryPercentage: 20 // Menentukan lebar relatif dari setiap kategori pada sumbu y
        }]
    }
};


    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: {
            labels  : ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5', 'Minggu 6', 'Minggu 7', 'Minggu 8', 'Minggu 9', 'Minggu 10', 'Minggu 11', 'Minggu 12', 'Minggu 13', 'Minggu 14', 'Minggu 15', 'Minggu 16', 'Minggu 17', 'Minggu 18', 'Minggu 19', 'Minggu 20', 'Minggu 21', 'Minggu 22', 'Minggu 23', 'Minggu 24'],
            datasets: [
                {
                    label: 'Keterlambatan Perkembangan',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: 0,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    fill: false,
                    data: [3, 4, 2, 5, 4, 3, 2, 4, 5, 1, 3, 4, 2, 5, 3, 4, 2, 5, 4, 3, 2, 4, 5, 1] // Sesuaikan dengan data Anda
                },
                {
                    label: 'Keterampilan Bina Diri',
                    borderColor: 'rgba(100,100,100,0.8)',
                    pointRadius: 0,
                    pointColor: '#666666',
                    pointStrokeColor: 'rgba(100,100,100,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(100,100,100,1)',
                    fill: false,
                    data: [5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4] // Sesuaikan dengan data Anda
                },
                {
                    label: 'Keterampilan Sosial',
                    borderColor: 'rgba(46,204,113,0.8)',
                    pointRadius: 0,
                    pointColor: '#2ecc71',
                    pointStrokeColor: 'rgba(46,204,113,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(46,204,113,1)',
                    fill: false,
                    data: [2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5, 3, 2, 4, 1, 5] // Sesuaikan dengan data Anda
                }
            ]
        },
        options: lineChartOptions
    });
});



  })
</script>
</body>
</html>
@endsection
