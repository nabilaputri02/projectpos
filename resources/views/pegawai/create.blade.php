@extends('layouts.layout') <!-- Extends the layout.blade.php -->

@section('title', 'Tambah Pegawai') <!-- Sets the page title -->

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Pegawai</h1>
<p class="mb-4">Silakan isi data pegawai baru.</p>

<!-- Create pegawai Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah pegawai</h6>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="card-body">
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input type="text" class="form-control" id="pangkat" name="pangkat" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan pegawai</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
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
