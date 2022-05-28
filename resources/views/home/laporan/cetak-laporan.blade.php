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
        margin-top: 100px;
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
{{-- onload="window.print();" --}}

<body style="background-color: white;">
    <header style="position: fixed;top:-40px;width: 700px">
        <table style="width: 700px;border:none;">
            <tr>
                <td align="center">
                    <span class="kop-logo">
                        <img src="assets/img/logo.jpeg" width="100px">
                    </span>
                </td>
                <td align="center">
                    <span class="kop-judul">
                        <p>PROGRAM STUDI TEKNOLOGI INFORMASI
                            <br>LABORATORIUM JARINGAN DAN MULTIMEDIA
                            <br>DAFTAR BARANG INVENTARIS</p>
                    </span>
                </td>
            </tr>
        </table>
        <hr style="margin-top:-30px;border:1px solid black">
    </header>
    <table style="width: 700px; margin:auto; border-collapse: collapse; border:1px solid black" border="1">
        <thead style="font-weight: bold;">
            <td align="center">NO</td>
            <td align="center">NO BARANG</td>
            <td align="center">NAMA BARANG</td>
            <td align="center">KATEGORI</td>
            <td align="center">JUMLAH</td>
            <td align="center">UNIT</td>
            <td align="center">KONDISI</td>
        </thead>
        @php
        $no=1;
        @endphp
        @foreach ($barang as $row)
        <tr align="center">
            <td style="">{{ $no++ }}</td>
            <td>{{ $row->no_barang }}</td>
            <td>{{ $row->nama_barang }}</td>
            <td>{{ $row->nama_kategori }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->unit }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
    </table>
    <table style="width: 300px" align="right">
        <p align="center">
            <?php 
                    setlocale(LC_ALL, 'ID');
                    date_default_timezone_set('Asia/Jakarta');
                    $hariIni = new DateTime();
                    // echo "Purworejo" .",". $hariIni()->format('D M y, H:i');
                    echo "Purworejo," .strftime(' %d %B %Y', $hariIni->getTimestamp()) . '<br>';
                        ?>
        </p>
        <p align="center">Mengetahui, Ka.Lab</p><br><br>
        <p align="center"><u><b> Muhammad Hamid Jumasa, M.Eng</b></u></p>
        <p align="center">NIDN. 0603069001</p>
    </table>
</body>

</html>
