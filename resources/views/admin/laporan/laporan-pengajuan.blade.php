@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan Pengajuan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Cetak Pengajuan</h4>
                                <a href="laporan/cetak-laporan-pengajuan" data-toggle="modal"
                                    data-target="#modalCetakLaporan" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-print"></i>
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead align="center">
                                        <td>No</td>
                                        <td>No Barang</td>
                                        <td>Nama Barang</td>
                                        <td>Unit</td>
                                        <td>Keterangan</td>
                                        <td>Jumlah Pengajuan</td>
                                        <td>Pengajuan</td>
                                        <td>Verifikasi</td>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($pengajuan as $row)
                                        @php
                                        if($row->verifikasi == 'belum' ){
                                        $color = 'bg-danger p-1 rounded text-bold';
                                        }else if($row->verifikasi == 'sudah' ){
                                        $color = 'bg-success p-1 rounded';
                                        } @endphp
                                        @php
                                        if($row->pengajuan == 'belum' ){
                                        $colora = 'bg-danger p-1 rounded';
                                        }else if($row->pengajuan == 'sudah' ){
                                        $colora = 'bg-success p-1 rounded';
                                        } @endphp
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->no_barang }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td>{{ $row->unit }}</td>
                                            <td>{{ substr($row->keterangan,0,5) }}..</td>
                                            <td>{{ $row->jumlah_pengajuan }}</td>
                                            <td><span class=" <?=$colora;?>">{{ $row->pengajuan }}</span></td>
                                            <td>
                                                <span class=" <?=$color;?>">{{ $row->verifikasi }}</span>
                                            </td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Cetak Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="laporan/cetak-laporan-pengajuan">
                @csrf
                <div class="modal-body">
                    {{-- <input type="hidden" value="{{ Auth::user()->id }}"> --}}

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <select class="form-control" name="verifikasi" id="verifikasi" required>
                                    <option value="" hidden="">-- Pilih Verifikasi --</option>
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
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
