@extends('layouts.layout')  
@section('title', 'Pengguna')  
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables Data User</h1>
<p class="mb-4">Berikut adalah data pengguna yang terdaftar.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
        <a type="button" class="btn btn-primary float-right" href="{{ route('user.create') }}">
            <i class="fas fa-plus"></i> Tambah Petugas
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->username }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('tambahanJS')
<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- SB Admin 2 -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
