<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan Perkembangan Belajar Anak</title>
    <style>
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
            padding: 8px;
            text-align: left;
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
        <img src="../public/images/kopp.png" alt="Laporan Perkembangan Belajar Anak" style="width: 100%; height: auto;">
    </div>
    <div class="text-center">
        <h4>Laporan Perkembangan Belajar Anak </h4>
    </div>
    <div style="margin-bottom: 20px;">
        <div style="float: left; width: 50%;">
            <table>
                <tr>
                    <td style="width: 12%;">Nama</td>
                    <td>: &nbsp;&nbsp;{{$siswa->nama}}</td>
                </tr>
                <tr>
                    <td style="width: 12%;">NISN</td>
                    <td>: &nbsp;&nbsp;{{$siswa->nisn}}</td>
                </tr>
                <tr>
                    <td style="width: 12%;">Kelas</td>
                    <td>: &nbsp;&nbsp;{{$siswa->kelas}} - {{$siswa->jenis_kebutuhan}}
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-left: 55%; width: 50%;">
            <table>
                <tr>
                    <td style="width: 30%;">Semester</td>
                    <td>: &nbsp;&nbsp;{{$semester}}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tahun Pelajaran</td>
                    <td>: &nbsp;&nbsp;{{$tahun}}/{{$tahun+1}}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Bulan / Minggu</td>
                    <td>: &nbsp;&nbsp;{{ $bulan }} / Minggu {{$minggu}}</td>
                </tr>
            </table>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr style="background-color: #315E77; color: white; text-align: center;">
                <th style="width: 2%;">No</th>
                <th style="width: 10%;">Aspek</th>
                <th style="width: 35%;">Indikasi</th>
                <th style="width: 3%;">Skala 1-5</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody style="page-break-inside: avoid;">
            @php
            $huruf = range('A', 'Z');
            $no = 0;
            $aspekn = '';
            $c = 1;
            @endphp

            @foreach($penilaian as $aspek => $pln)
            @foreach($pln as $indikasi => $pl)
            <tr>
                @if($aspekn != $aspek)
                <td style="border-bottom: none;">{{$huruf[$no]}}</td>
                <td style="border-bottom: none;">{{$aspek}}</td>
                @else
                <td style="border-bottom: none;border-top: none;"></td>
                <td style="border-bottom: none;border-top: none;"></td>
                @endif
                <td>{{$c}}. {{$indikasi}}</td>
                <td>{{$pl['skala']}}</td>
                <td>{{$pl['catatan']}}</td>
            </tr>
            @php
            $aspekn = $aspek;
            $c++;
            @endphp
            @endforeach
            @php
            $no++;
            $c = 1;
            @endphp
            @endforeach
        </tbody>
    </table>

    <p style="margin-bottom: 0;">Keterangan Skala Penilaian:</p>
    <ul>
        <li>1 = Perlu Bimbingan Intensif</li>
        <li>2 = Perlu Bimbingan</li>
        <li>3 = Perkembangan Sedang</li>
        <li>4 = Perkembangan Baik</li>
        <li>5 = Perkembangan Sangat Baik</li>
    </ul>
</body>

</html>
