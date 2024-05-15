@extends('layouts.template')
@section('judulh1','Admin - pelanggan')
@section('konten')
<div class="col-md-6">
 @if ($errors->any())
 <div class="alert alert-danger">
 <strong>Whoops!</strong> There were some problems with your
input.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 <div class="card card-success">
 <div class="card-header">
 <h3 class="card-title">Tambah Data Pelanggan</h3>
 </div>
 <!-- /.card-header -->
 <!-- form start -->
 <form action="{{ route('pelanggan.store') }}" method="POST">
 @csrf
 <div class=" card-body">
 <div class="form-group">
 <label for="nama">Nama Pelanggan</label>
 <input type="text" class="form-control" id="nama"
name="nama" placeholder="">
 </div>

 <div class="form-group">
 <label for="alamat">Alamat</label>
 <input type="text" class="form-control" id="alamat"
name="alamat" placeholder="">
 </div>
 
 <div class="form-group">
 <label for="telepon">No Telepon</label>
 <input type="text" class="form-control" id="telepon"
name="telepon">
 </div>
 
 </div>
 <!-- /.card-body -->
 <div class="card-footer">
 <button type="submit" class="btn btn-success floatright">Simpan</button>
 </div>
 </form>
 </div>
</div>
@endsection
