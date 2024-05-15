@extends('layouts.template')
@section('judulh1','Admin - produk')
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
 <div class="card card-primary">
 <div class="card-header">
 <h3 class="card-title">Data produk</h3>
 </div>
 <!-- /.card-header -->
 <div class=" card-body">
 <table>
 <tr>
 <th>Nama Produk</th>
 <td>:</td>
 <td>{{ $data[0]->nama }}</td>
 </tr>
 <!-- <tr>
 <th>Kategori Produk</th>
 <tr> -->
 <th>Harga</th>
 <td>:</td>
 <td>@money($data[0]->price)</td>
 </tr>
 <tr>
 <th>Deskripsi</th>
 <td>:</td>

 <td>{{ $data[0]->description}}</td>
 </tr>
 </table>
 </div>
 <!-- /.card-body -->
 </div>
</div>
@endsection