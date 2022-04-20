@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pengguna</h4>
                {{-- <ul class="breadcrumbs">
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
                        <a href="#">Pengguna</a>
                    </li>
                </ul> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No Induk</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                            <th>ip</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($user as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>{{ $row->no_induk }}</td>
                                            <td>{{ $row->username }}</td>
                                            <td>{{ $row->level }}</td>
                                            <td>
                                                <a href="#editDataUser{{ $row->id}}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash">
                                                    </i> Hapus</a>
                                            </td>
                                            <td>{{ $row->ip_login }}</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap ..">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan ..">
                    </div>

                    <div class="form-group">
                        <label>No induk</label>
                        <input type="text" class="form-control" name="no_induk" placeholder="No induk ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password ..">
                    </div>

                    <div class="form-group">
                        <label>level</label>
                        <select name="level" required class="form-control">
                            <option value="" hidden>-- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
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

{{-- edit --}}

@foreach ($user as $d)
<div class="modal fade" id="editDataUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/{{ $d->id }}/update">

                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->nama }}" class="form-control" name="nama"
                            placeholder="Nama Lengkap ..">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" value="{{ $d->jabatan }}" class="form-control" name="jabatan"
                            placeholder="Jabatan ..">
                    </div>

                    <div class="form-group">
                        <label>No induk</label>
                        <input type="text" value="{{ $d->no_induk }}" class="form-control" name="no_induk"
                            placeholder="No induk ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" value="{{ $d->username }}" class="form-control" name="username"
                            placeholder="Username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password ..">
                    </div>

                    <div class="form-group">
                        <label>level</label>
                        <select class="form-control" name="level" required>

                            {{-- @if (old('level',$d->level) == $d->level)
                            <option value="{{ $d->level }}" selected>{{ $d->level }}</option>
                            @endif --}}
                            <option <?php if( $d->level =="admin" ) echo "selected" ; ?> value="admin">Admin
                            </option>
                            <option <?php if( $d->level =="superadmin" ) echo "selected" ; ?> value="superadmin">
                                Super
                                Admin</option>
                        </select>
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
@foreach ($user as $g)
<div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-open">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hapus User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/user/{{ $g->id }}/destroy">

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
{{-- <script type="text/javascript">
    $('#search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            url: "{{ url('') }}/user/search/",
data: {
'search': $value
},
success: function (data) {
$('tbody').html(data);
}
});
})

</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });

</script> --}}
{{-- @include('sweetalert::alert') --}}
@endsection
