@extends('layouts.layout') <!-- Extends the layout.blade.php -->

@section('title', 'Edit Pegawai') <!-- Sets the page title -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h1>
    <p class="mb-4">Ubah informasi pegawai yang terdaftar.</p>

    <!-- Edit Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pegawai</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('pegawai.update', $pegawai->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama', $pegawai->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip', $pegawai->nip) }}" required>
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pangkat">Pangkat</label>
                    <input type="text" name="pangkat" class="form-control @error('pangkat') is-invalid @enderror"
                           value="{{ old('pangkat', $pegawai->pangkat) }}" required>
                    @error('pangkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                           value="{{ old('jabatan', $pegawai->jabatan) }}" required>
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Pegawai</button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
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
@endsection
