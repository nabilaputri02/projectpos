@extends('layouts.layout') 
@section('title', 'Pegawai') 
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Data Pegawai</h1>
    <p class="mb-4">Daftar informasi pegawai terdaftar.</p>
    <!-- DataTables Example -->
   
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
        <a type="button" class="btn btn-primary float-right" href="{{ route('pegawai.create') }}">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->nip }}</td>
                            <td>{{ $dt->pangkat }}</td>
                            <td>{{ $dt->jabatan }}</td>

                            <td>
                                <div class="btn-group">
                                    <!-- Form Delete -->
                                    <form action="{{ route('pegawai.destroy', $dt->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <a type="button" class="btn btn-success" href="{{ route('pegawai.show', $dt->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a type="button" class="btn btn-warning btn-sm" href="{{ route('pegawai.edit', $dt->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                   
                                                                        
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
