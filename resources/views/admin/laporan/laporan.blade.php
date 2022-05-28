@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Cetak Laporan</h4>
                                <a href="laporan/cetak-laporan" data-toggle="modal" data-target="#modalCetakLaporan"
                                    class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-print"></i>
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
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
                                            <td>{{ substr($row->keterangan,0,5) }}..</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCetakLaporan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pilih Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="laporan/cetak-laporan">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Cetak Laporan</label>
                                <select class="form-control" name="kategori" id="kategori" required>
                                    <option value="" hidden="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">
                        </i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"> </i> Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
