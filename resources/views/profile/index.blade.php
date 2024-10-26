@extends('layouts.template')
@section('content')
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    <div class="container rounded bg-white border shadow-sm">
        <div class="row" id="profile">
            <div class="col-md-4 border-right">
                <div class="p-3 py-5 text-center">
                    <img class="rounded-circle shadow" width="200px" height="200px" src="{{ asset($user->avatar) }}">
                    <h5 class="mt-2">{{ $user->nama }}</h5>
                    <div class="mt-4">
                        <button class="btn btn-primary profile-button" type="button" onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_foto') }}')">Edit Foto</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-4">
                    <h4 class="text-center">Profile Settings</h4>
                    <div class="row mt-3">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $user->level->level_nama }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>********</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-3 text-center">
                        <button onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_ajax') }}')"
                            class="btn btn-success profile-button">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .profile-button {
        width: 150px;
        border-radius: 30px;
        transition: background-color 0.3s;
    }
    .profile-button:hover {
        background-color: #0056b3; /* Ganti sesuai tema */
    }
    .rounded-circle {
        border: 4px solid #007bff; /* Warna border sesuai tema */
    }
</style>
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
    var profile;
    $(document).ready(function() {
        profile = $('#profile').on({
            autoWidth: false,
            serverSide: true,
            ajax: {
                "url": "{{ url('penjualan/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    d.user_id = $('#user_id').val();
                }
            },
        });
        $('#profile').on('change', function() {
            profile.ajax.reload();
        });
    });
</script>
@endpush
