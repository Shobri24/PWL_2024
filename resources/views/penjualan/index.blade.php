@extends('layouts.template')
@section('content')
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>

    <div class="col-md-3">
        <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active px-3 py-2 rounded-pill font-weight-bold" id="pills-home-tab" data-toggle="pill"
                    href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Transaksi
                    Penjualan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-2 rounded-pill font-weight-bold" id="pills-profile-tab" data-toggle="pill"
                    href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Detail
                    Penjualan</a>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- Transaksi Penjualan Tab -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card card-outline card-primary mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $page->title }}</h3>
                    <div class="card-tools">
                        <button onclick="modalAction('{{ url('/penjualan/import') }}')" class="btn btn-info">Import
                            Penjualan</button>
                        <a href="{{ url('/penjualan/export_excel') }}" class="btn btn-primary"><i
                                class="fa fa-file-excel"></i> Export Excel</a>
                        <a href="{{ url('/penjualan/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i>
                            Export PDF</a>
                        <button onclick="modalAction('{{ url('/penjualan/create_ajax') }}')" class="btn btn-success">Tambah
                            Data (Ajax)</button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="user_id">Filter Berdasarkan User:</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="">- Semua -</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tabel Penjualan -->
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-penjualan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penjualan</th>
                                <th>Pembeli</th>
                                <th>User ID</th>
                                <th>Tanggal Penjualan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Detail Penjualan Tab -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card card-outline card-primary mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $page->title }}</h3>
                    <div class="card-tools">
                        <button onclick="modalAction('{{ url('/detail/import') }}')" class="btn btn-info">Import
                            Detail</button>
                        <a href="{{ url('/detail/export_excel') }}" class="btn btn-primary"><i
                                class="fa fa-file-excel"></i> Export Excel</a>
                        <a href="{{ url('/detail/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i>
                            Export PDF</a>
                        <button onclick="modalAction('{{ url('/detail/create_ajax') }}')" class="btn btn-success">Tambah
                            Data (Ajax)</button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="barang_id">Filter Berdasarkan Barang:</label>
                            <select class="form-control" id="barang_id" name="barang_id">
                                <option value="">- Semua -</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tabel Detail -->
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-detail">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Penjualan ID</th>
                                <th>Barang ID</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tablePenjualan, tableDetail;
        $(document).ready(function() {
            // Tabel Penjualan
            tablePenjualan = $('#table-penjualan').DataTable({
                autoWidth: false,
                serverSide: true,
                ajax: {
                    "url": "{{ url('penjualan/list') }}",
                    "type": "POST",
                    "data": function(d) {
                        d.user_id = $('#user_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false
                    },
                    {
                        data: "penjualan_kode",
                        width: "20%"
                    },
                    {
                        data: "pembeli",
                        width: "27%"
                    },
                    {
                        data: "user.user_id",
                        width: "14%"
                    },
                    {
                        data: "penjualan_tanggal",
                        width: "14%"
                    },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#user_id').on('change', function() {
                tablePenjualan.ajax.reload();
            });

            // Tabel Detail
            tableDetail = $('#table-detail').DataTable({
                autoWidth: false,
                serverSide: true,
                ajax: {
                    "url": "{{ url('detail/list') }}",
                    "type": "POST",
                    "data": function(d) {
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false
                    },
                    {
                        data: "penjualan_id",
                        width: "10%"
                    },
                    {
                        data: "barang.barang_id",
                        width: "37%"
                    },
                    {
                        data: "harga",
                        width: "14%"
                    },
                    {
                        data: "jumlah",
                        width: "14%"
                    },
                    {
                        data: "aksi",
                        width: "14%",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#barang_id').on('change', function() {
                tableDetail.ajax.reload();
            });
        });
    </script>
@endpush
