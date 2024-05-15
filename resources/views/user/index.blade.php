@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatablesbs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesresponsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesbuttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css"
href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('judulh1','Admin - users')
@section('judulh3','users')
@section('konten')
<div class="col-md-4">
 <div class="card card-success">
 <div class="card-header">
 <h3 class="card-title">Input User</h3>
 </div>
 <!-- /.card-header -->
 <!-- form start -->
 <form action="{{ route('pengguna.store') }}" method="POST">
 @csrf
 <div class=" card-body">
 <div class="form-group">
 <label for="name">Nama</label>
 <input type="text" class="form-control" id="name"
name="name" placeholder=" Nama Lengkap" required value="{{ old('name') }}">
 </div>

 <!-- <div class="form-group">
 <label for="alamat">Alamat</label>
 <input type="text" class="form-control" id="alamat"
name="alamat" placeholder="alamat" required>
 </div> -->

 <div class="form-group">
 <label for="email">Email</label>
 <input type="email" class="form-control @error('email') isinvalid @enderror" id="email" name="email" placeholder="JohnDoe@example.com"
required value="{{ old('email') }}">
 @error('email')
 <div class="invalid-feedback">
 {{ $message }}
 </div>
 @enderror
 </div>
 <div class="form-group">
 <label for="password">Password</label>
 <input type="password" class="form-control" id="password"
name="password" required>
 </div>

 </div>
 <!-- /.card-body -->
 <div class="card-footer">
 <button type="submit" class="btn btn-success floatright">Simpan</button>
 </div>
 </form>
 </div>
</div>
<div class="col-md-8">
 <div class="card card-info">
 <div class="card-header">
 <h3 class="card-title">Data User</h3>
 </div>
 <!-- /.card-header -->
 <div class="card-body">
 <table id="example1" class="table table-bordered table-striped ">
 <thead>
 <tr>
 <th>No</th>
 <th>Nama </th>
 <th>email</th>

 </tr>
 </thead>
 <tbody>
 @foreach($data as $dt)
 <tr>
 <td>{{ $loop->iteration }}</td>
 <td>{{ $dt->name }}</td>
 <td>{{ $dt->email }}</td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
</div>
@endsection
@section('tambahanJS')
<!-- DataTables & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatablesresponsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatablesresponsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script
src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></s
cript>
@endsection
@section('tambahScript')
<script>
$(function() {
 $("#example1").DataTable({
 "responsive": true,
 "lengthChange": true,
 "autoWidth": false,
 "responsive": true,
 }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
@if($message = Session::get('success'))
toastr.success("{{ $message}}");
@elseif($message = Session::get('updated'))
toastr.warning("{{ $message}}");
@endif
</script>
@endsection