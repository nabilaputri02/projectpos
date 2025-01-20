@extends('layouts.layout')

@section('title', 'Detail pegawai') <!-- Judul halaman -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Pegawai</h1>
    <p class="mb-4">Informasi lengkap dari data pegawai terpilih.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama pegawai:</div>
                <div class="col-sm-9">{{ $pegawai->nama }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">NIP:</div>
                <div class="col-sm-9">{{ $pegawai->nip }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Pangkat:</div>
                <div class="col-sm-9">{{ $pegawai->pangkat }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Jabatan:</div>
                <div class="col-sm-9">{{ $pegawai->jabatan }}</div>
            </div>


            <div class="text-right">
                <a href="{{ url('/pegawai') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
