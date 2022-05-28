@extends('home.layout.layout')

@section('content')
<div class="container">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">PENGADAAN BARANG</h4>
                                {{-- <a href="laporan/cetak-laporan-pengajuan" class="btn btn-success btn-rounded ml-auto">
                                    <i class="fa fa-print"></i>
                                    Cetak
                                </a> --}}
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
                                            {{-- <th>Kategori</th> --}}
                                            <th>Jumlah</th>
                                            <th>Unit</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($pengajuan as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->no_barang }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            {{-- <td>{{ $row->kategori }}</td> --}}
                                            <td>{{ $row->jumlah_pengajuan }}</td>
                                            <td>{{ $row->unit }}</td>
                                            <td>{{ substr($row->keterangan,0,5) }}</td>
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

@endsection
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
