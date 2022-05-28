@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pengajuan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Pengajuan</h4>
                                {{-- <a href="laporan/cetak-laporan-pengajuan" class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#modalAddPengajuan">
                                    <i class="fa fa-print"></i>
                                    Cetak Pengajuan
                                </a> --}}
                                <a href="/pengajuan/create" class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#modalAddPengajuan">
                                    <i class="fa fa-plus"></i>
                                    Tambah Pengajuan
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
                                            <th>Unit</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Penulis</th>
                                            <th>Pengajuan</th>
                                            <th>Verifikasi</th>
                                            <th>Action</th>
                                        </tr>
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
                                            <td>{{ substr($row->keterangan,0,5) }}</td>
                                            <td>{{ $row->jumlah_pengajuan }}</td>
                                            <td>{{ $row->penulis }}</td>
                                            <td><span class=" <?=$colora;?>">{{ $row->pengajuan }}</span></td>
                                            <td>
                                                <span class=" <?=$color;?>">{{ $row->verifikasi }}</span>
                                            </td>
                                            <td>
                                                <a href="#modalEditPengajuan{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#modalHapusPengajuan{{ $row->id }}" data-toggle="modal"
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
<div class="modal fade" id="modalAddPengajuan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/pengajuan/store">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="id_barang" name="id_barang">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>No Barang</label>
                                <select name="no_barang" onchange="barang()" id="no_barang" required
                                    class="form-control">
                                    <option value="" hidden>-- Pilih No Barang --</option>
                                    @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->no_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    placeholder="Nama Barang .." readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Jumlah Pengajuan</label>
                                <input type="text" class="form-control" name="jumlah_pengajuan"
                                    placeholder="Jumlah Pengajuan .." required>
                            </div>
                            <div class="col">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" id="unit" placeholder="Unit .."
                                    readonly>
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
                                <label>Pengajuan</label>
                                <select name="pengajuan" id="pengajuan" required class="form-control">
                                    <option value="sudah" selected>Sudah</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Verifikasi</label>
                                <select name="verifikasi" id="verifikasi" required class="form-control">
                                    @if(Auth::user()->level == 'superadmin')
                                    <option value="belum">Belum</option>
                                    <option value="sudah">Sudah</option>
                                    @elseif (Auth::user()->level == 'admin')
                                    <option value="belum">Belum</option>
                                    @endif
                                </select>
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
@foreach ($pengajuan as $p)
<div class="modal fade" id="modalEditPengajuan{{ $p->id  }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/pengajuan/{{ $p ->id }}/update">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ Auth::user()->id }}">
                    <input type="hidden" value="{{ $p->id_barang }}" id="id_barang" name="id_barang">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>No Barang</label>
                                <select name="no_barang" id="no_barang" required class="form-control">
                                    <option value="" hidden>-- Pilih No Barang --</option>
                                    @foreach ($barang as $b)

                                    @if (old('no_barang',$p->no_barang) == $b->id)
                                    <option value="{{  $p->no_barang }}" selected>{{ $b->no_barang }}</option>
                                    @else
                                    <option value="{{  $p->no_barang }}" disabled>{{ $b->no_barang }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $p->nama_barang }}"
                                    placeholder="Nama Barang .." readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Jumlah Pengajuan</label>
                                <input type="text" class="form-control" name="jumlah_pengajuan"
                                    value="{{ $p->jumlah_pengajuan }}" placeholder="Jumlah Pengajuan .." required>
                            </div>
                            <div class="col">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" value="{{ $p->unit }}"
                                    placeholder="Unit .." readonly>
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
                                <label>Pengajuan</label>
                                <select name="pengajuan" id="pengajuan" required class="form-control">
                                    <option value="sudah" selected>Sudah</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Verifikasi</label>
                                <select name="verifikasi" id="verifikasi" required class="form-control">
                                    @if(Auth::user()->level == 'superadmin')
                                    <option <?php if( $p->verifikasi =="belum" ) echo "selected" ; ?> value="belum">
                                        Belum
                                    </option>
                                    <option <?php if( $p->verifikasi =="sudah" ) echo "selected" ; ?> value="sudah">
                                        Sudah</option>
                                    @elseif (Auth::user()->level == 'admin')
                                    <option <?php if( $p->verifikasi =="belum" ) echo "selected" ; ?> value="belum">
                                        belum</option>
                                    @endif
                                    {{-- <option value="belum">Belum</option>
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option> --}}
                                </select>
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
@endforeach

{{-- Hapus --}}
@foreach ($pengajuan as $p)
<div class="modal fade" id="modalHapusPengajuan{{ $p->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-open">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hapus Pengajuan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/pengajuan/{{ $p->id }}/destroy">

                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $p->id }}" name="id" required>

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
    function barang() {
        let no_barang = $("#no_barang").val();
        $("#nama_barang").children().remove();
        if (no_barang != '' && no_barang != null) {
            $.ajax({

                url: "{{ url('') }}/pengajuan/id-barang/" + no_barang,
                success: function (res) {
                    $("#nama_barang").val(res.nama_barang);
                    $("#unit").val(res.unit);
                    $("#id_barang").val(res.id);
                }
            });
        }

    }

</script>

{{-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
        }
    })

</script> --}}

{{-- @include('sweetalert::alert') --}}
@endsection
