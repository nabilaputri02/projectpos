@extends('layouts.layout')

@section('title', 'Detail Absensi') <!-- Judul halaman -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Absensi</h1>
    <p class="mb-4">Informasi lengkap dari data absensi terpilih.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Absensi</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama Pegawai:</div>
                <div class="col-sm-9">{{ $absensi->nama }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tanggal Absensi:</div>
                <div class="col-sm-9">
                    {{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Status Kehadiran:</div>
                <div class="col-sm-9">{{ ucfirst($absensi->statuskehadiran) }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Keterangan:</div>
                <div class="col-sm-9">{{ $absensi->keterangan }}</div>
            </div>

            <div class="text-right">
                <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
