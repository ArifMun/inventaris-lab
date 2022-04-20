{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Document</title>
</head>


<body>
    <div class="card text-center border m-3">
        <div class="col-10 text-center mt-2">
            <div class="row border-bottom border-dark">
                <div class="col-4 border">
                    <img src="/assets/img/logo.png" alt="..." class="rounded float-end" width="100px">
                </div>
                <div class="col-8 ">
                    <h5 class="text-center">PROGRAM STUDI TEKNOLOGI INFORMASI</h5>
                    <h5 class="text-center">FAKULTAS TEKNIK</h5>
                    <h5 class="text-center">UNIVERSITAS MUHAMMADIYAH PURWOREJO</h5>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Jumlah</th>
                                <th>Unit</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($barang as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
<td>{{ $row->no_barang }}</td>
<td>{{ $row->nama_barang }}</td>
<td>{{ $row->nama_kategori }}</td>
<td>{{ $row->penulis }}</td>
<td>{{ $row->jumlah }}</td>
<td>{{ $row->unit }}</td>
<td>{{ $row->keterangan}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>


</html> --}}
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
                <table style="width: 800px" class="mb-4">
                    <tr class="border-bottom border-dark mb-2">
                        <td align="center">
                            <span style="line-height: 1.6; font-weight: bold;">
                                <img src="/assets/img/logo.png" alt="..." class="rounded float-end" width="100px">
                            </span>
                        </td>
                        <td align="center">
                            <span style="line-height: 1.6; font-weight: bold;">
                                DAFTAR BARANG INVENTARIS
                                <br>LABORATORIUM JARINGAN DAN MULTIMEDIA
                                <br>PROGRAM STUDI TEKNOLOGI INFORMASI
                            </span>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered text-bold" style="width: 700px; margin:auto">
                    <thead align="center" style="font-weight: bold">
                        <td>NO</td>
                        <td>NO BARANG</td>
                        <td>NAMA BARANG</td>
                        <td>KATEGORI</td>
                        <td>JUMLAH</td>
                        <td>UNIT</td>
                        <td>KONDISI</td>
                    </thead>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($barang as $row)
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->no_barang }}</td>
                        <td>{{ $row->nama_barang }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ $row->keterangan }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{-- </div> --}}
            <p>
                <center> <span id="tanggalwaktu"></span></center>
            </p>
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
