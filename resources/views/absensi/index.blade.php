@extends('layouts.layout') 
@section('title', 'Absensi') 
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Data Absensi Pegawai</h1>
    <p class="mb-4">Daftar informasi absensi pegawai terdaftar.</p>

    <!-- Alerts -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
            <form class="form-inline">
                <input type="text" id="customSearchInput" class="form-control form-control-sm mr-2" placeholder="Cari data...">
                <button type="button" id="customSearchButton" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
        <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Laporan</h5>
                        <a class="btn btn-primary" href="{{ url('/cetak-semua-absensi') }}" target="_blank">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Hadir</th>
                            <th>Status Kehadiran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->translatedFormat('l, d F Y') }}</td>
                            <td>{{ $dt->statuskehadiran }}</td>
                            <td>{{ $dt->keterangan }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- Delete Form -->
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
    <!-- Delete Form -->
    <form action="{{ route('absensi.destroy', $dt->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>

    <!-- View Button -->
    <a class="btn btn-success" href="{{ route('absensi.show', $dt->id) }}">
        <i class="fas fa-eye"></i> Lihat
    </a>

    <!-- Edit Button -->
    <a class="btn btn-warning" href="{{ route('absensi.edit', $dt->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>

    <!-- Print PDF Button -->
    <a href="{{ route('absensi.pdf', $dt->id) }}" class="btn btn-primary">
        <i class="fas fa-file-pdf"></i> Cetak PDF
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
<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#dataTable').DataTable({
            "language": {
                "search": "Cari:",
                "searchPlaceholder": "Masukkan kata kunci..."
            }
        });

        // Custom search functionality
        $('#customSearchButton').on('click', function () {
            var value = $('#customSearchInput').val();
            table.search(value).draw();
        });

        $('#customSearchInput').on('keypress', function (e) {
            if (e.which == 13) {
                var value = $(this).val();
                table.search(value).draw();
                e.preventDefault();
            }
        });
    });
</script>

<!-- Vendor Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
