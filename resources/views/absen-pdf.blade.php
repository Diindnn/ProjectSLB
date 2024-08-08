<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rekap Absensi Siswa</title>
    <style>
        body,
        html {
            margin: 10vh;
            padding: 10vh;
        }

        .text-center {
            text-align: center;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
            /* font-size: 12px; */
        }

        .table th {
            background-color: #315E77;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="kop">
        <center>
            <img src="../public/images/kop-landscape.png" alt="Laporan Perkembangan Belajar Anak" style="width: 100%; height: auto;">
        </center>
    </div>
    <div class="text-center">
        <h4>Rekap Absensi Bulan {{ $namabulan }} {{ $tahun_selected }} </h4>
    </div>
    <div style="padding-left: 5px;padding-right: 5px;">
        <table class="table">
            <thead>
                <tr style="background-color: #315E77; color: white; text-align: center;">
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    @foreach($dates as $d => $t)
                    <th>{{$d}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach($data as $da)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$da['nisn']}}</td>
                    <td>{{$da['nama']}}</td>
                    @foreach($da['absensi'] as $a => $ab)
                    <td>{{$ab ?? '-'}}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p style="margin-bottom: 0;">Keterangan:</p>
    <ul>
        <li>H = Hadir</li>
        <li>S = Sakit</li>
        <li>I = Izin</li>
        <li>A = Alfa</li>
    </ul>
</body>

</html>
