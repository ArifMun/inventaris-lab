<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> --}}
    <title>Cetak Laporan</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        margin-top: -50px;
    }

    img {
        margin-top: 45px;
    }

    .kop-judul p {
        line-height: 1.6;
        font-weight: bold;
        margin-top: -10px;
    }

    .kop-logo {
        line-height: 1.6;
        font-weight: bold;
    }

</style>

<body style="background-color: white;">
    <table style="width: 700px;">
        <tr>
            <td align="center">
                <span class="kop-logo">
                    <img src="assets/img/logo.jpeg" alt="..." width="100px">
                </span>
            </td>
            <td align="center">
                <span class="kop-judul">
                    <p>PROGRAM STUDI TEKNOLOGI INFORMASI
                        <br>SURAT PENGAJUAN
                        <br>PENGADAAN BARANG INVENTARIS
                        <br>LABORATORIUM JARINGAN DAN MULTIMEDIA </p>
                </span>
            </td>
        </tr>
    </table>
    <hr style="margin-top:-20px;border:1px solid black">
    <p>Dengan ini Saya mengajukan Barang dengan perincian:</p>
    <table style="width: 700px; margin:auto; border-collapse: collapse; border:1px solid black" border="1">
        <thead style="font-weight: bold;">
            <td align="center">NO</td>
            <td align="center">NO BARANG</td>
            <td align="center">JUMLAH PENGAJUAN</td>
            <td align="center">UNIT</td>
            <td align="center">KONDISI</td>
        </thead>
        @php
        $no=1;
        @endphp
        @foreach ($pengajuan as $row)
        <tr align="center">
            <td>{{ $no++ }}</td>
            <td>{{ $row->no_barang }}</td>
            <td>{{ $row->jumlah_pengajuan }}</td>
            <td>{{ $row->unit }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
    </table>
    <p>Barang tersebut akan digunakan untuk keperluan perkuliahan mahasiswa prodi Teknologi Informasi
    </p>

    {{-- </div> --}}
    <table style="width: 700px;">
        <tr>
            <td colspan="2">
                <p align="center">
                    <?php 
                            setlocale(LC_ALL, 'ID');
                            date_default_timezone_set('Asia/Jakarta');
                            $hariIni = new DateTime();
                            echo "Purworejo," .strftime(' %d %B %Y', $hariIni->getTimestamp()) . '<br>';
                                ?>
                </p>
            </td>
        </tr>
        <tr>
            @foreach ($users as $user)
            @if ($user->level=="superadmin")
            <td style="width: 350px">
                <p align="center">Mengetahui, {{ $user->jabatan }}</p><br><br>
                <p align="center"><u><b> {{ $user->nama }}</b></u></p>
                <p align="center">NIDN. {{ $user->no_induk }}</p>
            </td>
            @elseif($user->level=="admin")
            <td>
                <p align="center">Mengetahui, {{ $user->jabatan }}</p><br><br>
                <p align="center"><u><b> {{ $user->nama }}</b></u></p>
                <p align="center">NIDN. {{ $user->no_induk }}</p>
            </td>
            @endif
            @endforeach
        </tr>
    </table>
</body>

</html>
