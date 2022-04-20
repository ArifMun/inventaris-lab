@extends('home.layout.layout')

@section('content')
<div class="container">
    {{-- <div class="card mt-2"> --}}
    {{-- <div class="card-body">
        <div class="main-panel"> --}}
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">KATEGORI BARANG</h4>
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
        {{-- </div>
</div> --}}

        {{-- </div> --}}
    </div>
</div>
@endsection
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
