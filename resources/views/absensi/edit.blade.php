@extends('layouts.layout')

@section('title', 'Edit Data Absensi')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Data Absensi</h1>
    <p class="mb-4">Perbarui informasi data absensi pegawai.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Laravel directive untuk method PUT -->

                <div class="form-group">
                    <label for="nama">Nama Pegawai:</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        class="form-control" 
                        value="{{ old('nama', $absensi->nama) }}" 
                        required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input 
                        type="date" 
                        id="tanggal" 
                        name="tanggal" 
                        class="form-control" 
                        value="{{ old('tanggal', $absensi->tanggal) }}" 
                        required>
                </div>

                <div class="form-group">
                    <label for="statuskehadiran">Status Kehadiran:</label>
                    <select id="statuskehadiran" name="statuskehadiran" class="form-control" required>
                        <option value="hadir" {{ $absensi->statuskehadiran == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="sakit" {{ $absensi->statuskehadiran == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="izin" {{ $absensi->statuskehadiran == 'izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea 
                        id="keterangan" 
                        name="keterangan" 
                        class="form-control" 
                        required>{{ old('keterangan', $absensi->keterangan) }}</textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
