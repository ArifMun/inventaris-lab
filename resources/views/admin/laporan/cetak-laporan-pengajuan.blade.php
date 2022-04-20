<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Cetak Laporan</title>
</head>
<style>
    .line.title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    body {
        display: flex;
        justify-content: center;
    }

</style>
{{-- onload="window.print();" --}}

<body style="background-color: white;" onload="window.print();">
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card border"> --}}
            <div class="card-body">
                <table style="width: 800px;" class="mb-4">
                    <tr class="border-bottom border-dark mb-2">
                        <td align="center">
                            <span style="line-height: 1.6; font-weight: bold;">
                                <img src="/assets/img/logo.png" alt="..." class="rounded float-end" width="100px">
                            </span>
                        </td>
                        <td align="center">
                            <span style="line-height: 1.6; font-weight: bold;">
                                SURAT PENGAJUAN
                                <br>PENGADAAN BARANG INVENTARIS
                                <br>LABORATORIUM JARINGAN DAN MULTIMEDIA
                            </span>
                        </td>
                    </tr>
                </table>
                <p>Dengan ini Saya mengajukan Barang dengan perincian:</p>
                <table class="table text-bold table-bordered" style="width: 700px;margin:auto">
                    <thead align="center" style="font-weight: bold">
                        <td>NO</td>
                        <td>NO BARANG</td>
                        <td>JUMLAH PENGAJUAN</td>
                        <td>UNIT</td>
                        <td>KONDISI</td>
                    </thead>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($pengajuan as $row)
                    <tr align="center" class="border">
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->no_barang }}</td>
                        <td>{{ $row->jumlah_pengajuan }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ $row->keterangan }}</td>
                    </tr>
                    @endforeach
                </table><br>
                <p>Barang tersebut akan digunakan untuk keperluan perkuliahan mahasiswa prodi Teknologi Informasi
                </p>
            </div>
            {{-- </div> --}}
            <p>
                <center> <span id="tanggalwaktu"></span></center>
            </p>
            <div class="card float-md-left border-0">
                <p class="text-center">Mengetahui, Kaprodi</p><br><br>
                <p><u><b> Murhadi,S.PdT, M.Eng</b></u></p>
                <p class="text-center">NIDN. 0612128504</p>
            </div>
            <div class="card float-md-right border-0">
                <p class="text-center">Mengetahui, Ka.LAB</p><br><br>
                <p><u><b> Muhammad Hamid Jumasa, M.Eng</b></u></p>
                <p class="text-center">NIDN. 0603069001</p>
            </div>
        </div>

    </div>
</body>
<script>
    var tw = new Date();
    if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
    else(a = tw.getTime());
    tw.setTime(a);
    var tahun = tw.getFullYear();
    var hari = tw.getDay();
    var bulan = tw.getMonth();
    var tanggal = tw.getDate();
    var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
    var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
        "Oktober", "Nopember", "Desember");
    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] +
        " " + tahun;

</script>

</html>
