@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Kategori</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kategori</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Kategori</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddKategori">
                                    <i class="fa fa-plus"></i>
                                    Tambah Kategori
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Kode Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($kategori as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->kode_kategori }}</td>
                                            <td>
                                                <a href="#editDataKategori{{ $row->id}}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#modalHapusKategori{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash">
                                                    </i> Hapus</a>
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

{{-- Tambah --}}
<div class="modal fade" id="modalAddKategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/kategori/store">
                @csrf
                <div class="modal-body">

                    <div class=" form-group">
                        <label>Nama kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori ..">
                    </div>

                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input type="text" class="form-control" name="kode_kategori" placeholder="Kode kategori ..">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">
                        </i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> </i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit --}}
@foreach ($kategori as $d)
<div class="modal fade" id="editDataKategori{{ $d->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/kategori/{{ $d->id }}/update">

                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama kategori</label>
                        <input type="text" value="{{ $d->nama_kategori }}" class="form-control" name="nama_kategori"
                            placeholder="Nama kategori ..">
                    </div>

                    <div class="form-group">
                        <label>Kode kategori</label>
                        <input type="text" value="{{ $d->kode_kategori }}" class="form-control" name="kode_kategori"
                            placeholder="Kode kategori ..">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Hapus --}}
@foreach ($kategori as $d)
<div class="modal fade" id="modalHapusKategori{{ $d->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-open">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hapus kategori</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/kategori/{{ $d->id }}/destroy">

                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class=" form-group">
                        <h4>Apakah anda ingin menghapus data ini ?</h4>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- @include('sweetalert::alert') --}}
@endsection
