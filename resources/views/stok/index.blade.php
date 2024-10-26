@extends('layouts.template')
@section('content')
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
        
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Stok</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Stok</a>
                <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Tambah Ajax</button>
            </div>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Filter Supplier:</label>
                        <select class="form-control" id="supplier_id" name="supplier_id">
                            <option value="">- Semua -</option>
                            @foreach ($supplier as $item)
                                <option value="{{ $item->supplier_id }}">{{ $item->supplier_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Supplier Stok</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Filter Barang:</label>
                        <select class="form-control" id="barang_id" name="barang_id">
                            <option value="">- Semua -</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Barang Stok</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Filter User:</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option value="">- Semua -</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">User</small>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Supplier ID</th>
                        <th>Barang ID</th>
                        <th>User ID</th>
                        <th>Stok Tanggal</th>
                        <th>Stok Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var datastok;
        $(document).ready(function() {
            datastok = $('#table_stok').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.supplier_id = $('#supplier_id').val();
                        d.barang_id = $('#barang_id').val();
                        d.user_id = $('#user_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "supplier.supplier_id",
                    orderable: true,
                    searchable: true
                }, {
                    data: "barang.barang_id",
                    orderable: true,
                    searchable: true
                }, {
                    data: "user.user_id",
                    orderable: true,
                    searchable: true
                }, {
                    data: "stok_tanggal",
                    orderable: true,
                    searchable: false
                }, {
                    data: "stok_jumlah",
                    orderable: true,
                    searchable: false
                }, {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#supplier_id, #barang_id, #user_id').on('change', function() {
                datastok.ajax.reload();
            });
        });
    </script>
@endpush
