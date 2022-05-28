@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Barang</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Barang</h4>
                                <a href="/barang/create" class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddBarang">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang
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
                                            <th>Kondisi</th>
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
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->penulis }}</td>
                                            <td>{{ $row->jumlah }}</td>
                                            <td>{{ $row->unit }}</td>
                                            <td>{{ substr($row->keterangan,0,5) }}</td>
                                            <td>
                                                <a href="#editDataBarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#modalHapusBarang{{ $row->id }}" data-toggle="modal"
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
<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
                    <input type="hidden" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori" onchange="no_kategori()" id="kategori"
                                    required>
                                    <option value="" hidden="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Kode Kategori</label>
                                <input type="text" class="form-control" name="kode_kategori" id="kode_kategori"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang .."
                                    required>
                            </div>
                            <div class="col">
                                <label>Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ Auth::user()->level }}"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah .." required>
                            </div>
                            <div class="col">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" placeholder="Unit .." required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan ..">
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
<div class="modal fade" id="editDataBarang{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
                    <input type="hidden" value="{{ Auth::user()->id }}">
                    <input type="hidden" value="{{ $d->no_barang }}" name="no_barang">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori" required>
                                    @foreach ($kategori as $k)

                                    @if (old('kategori',$d->kategori) == $k->id)
                                    <option value="{{  $d->kategori }}" selected>{{ $k->nama_kategori }}</option>
                                    @else
                                    <option value="{{  $d->kategori }}" disabled>{{ $k->nama_kategori }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>No Barang</label>
                                <input type="text" class="form-control" value="{{ $d->no_barang }}" name="kode_kategori"
                                    id="kode_kategori" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" value="{{ old('nama_barang',$d->nama_barang) }}"
                                    name="nama_barang" placeholder="Nama Barang .." required>
                            </div>
                            <div class="col">
                                <label>Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ Auth::user()->level }}"
                                    placeholder="{{ Auth::user()->level }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah .."
                                    value="{{ old('jumlah',$d->jumlah) }}" required>
                            </div>
                            <div class="col">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" placeholder="Unit .." required
                                    value="{{ old('unit',$d->unit) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan .."
                            value="{{ old('jumlah',$d->keterangan) }}">
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
@endforeach

{{-- Hapus --}}
@foreach ($barang as $d)
<div class="modal fade" id="modalHapusBarang{{ $d->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-open">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/barang/{{ $d->id }}/destroy">

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
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
<script>
    // nama function harus dibedakan dari nama id
    // pada form input
    function no_kategori() {
        let kategori = $("#kategori").val();
        $("#kode_kategori").children().remove();
        if (kategori != '' && kategori != null) {
            $.ajax({

                url: "{{ url('') }}/barang/kode_kategori/" + kategori,
                success: function (res) {
                    $("#kode_kategori").val(res.kode_kategori);
                }
            });
        }
    }

</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
        }
    })

</script>
{{-- @include('sweetalert::alert') --}}
@endsection
