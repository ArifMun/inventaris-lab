@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Barang</h4>
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
                        <a href="#">Barang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Barang</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang
                                </button>
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
                                            <th>Keterangan</th>
                                            <th>Action</th>
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
                                            <td>{{ $row->Kategori }}</td>
                                            <td>{{ $row->penulis }}</td>
                                            <td>{{ $row->jumlah }}</td>
                                            <td>{{ $row->Keterangan }}</td>
                                            <td>
                                                <a href="#editDataUser{{ $row->id}}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal"
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
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/barang/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>No Barang</label>
                        <input type="text" class="form-control" name="no_baranga" placeholder="No Barang ..">
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang ..">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="" hidden="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="kategori" placeholder="Kategori .."> --}}
                    </div>

                    <div class="form-group">
                        <label>Penulis</label>
                        <select name="penulis" required class="form-control">
                            <option value="" hidden>-- Pilih Penulis --</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="Jumlah ..">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keteranga" placeholder="Keterangan ..">
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
@foreach ($barang as $d)
<div class="modal fade" id="editDataUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/barang/{{ $d->id }}/update">

                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>No Barang</label>
                        <input type="text" value="{{ $d->no_barang }}" class="form-control" name="no_baranga"
                            placeholder="No Barang ..">
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" value="{{ $d->nama_barang }}" class="form-control" name="nama_barang"
                            placeholder="Nama Barang ..">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" value="{{ $d->kategori }}" class="form-control" name="kategori"
                            placeholder="Kategori ..">
                    </div>

                    <div class="form-group">
                        <label>Penulis</label>
                        <select class="form-control" name="level" required>

                            {{-- @if (old('level',$d->level) == $d->level)
                            <option value="{{ $d->level }}" selected>{{ $d->level }}</option>
                            @endif --}}
                            <option <?php if( $d->penulis =="admin" ) echo "selected" ; ?> value="admin">Admin
                            </option>
                            <option <?php if( $d->penulis =="superadmin" ) echo "selected" ; ?> value="superadmin">
                                Super
                                Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" value="jumlah" class="form-control" name="jumlah" placeholder="Jumlah ..">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" value="keterangan" class="form-control" name="keterangan"
                            placeholder="Jumlah ..">
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
@foreach ($barang as $g)
<div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-open">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/barang/{{ $g->id }}/destroy">

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
