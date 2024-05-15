<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login Pengguna</title>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700
&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('plugins/fontawesomefree/css/all.min.css') }}">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheckbootstrap.min.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ ('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page" style="background-image: url('wallpeper.jpg'); background-size: cover";>
<div class="login-box">
 <!-- /.login-logo -->
 <div class="card card-outline card-primary">
 <div class="card-header text-center">
 <h1 class="h1">Aplikasi<b>POS</b></h1>
 </div>
 <div class="card-body">
 <p class="login-box-msg">Please Login</p>
 @if(session()->has('loginError'))
 <div class="alert alert-danger alert-dismissible">
 <button type="button" class="close" data-dismiss="alert"
aria-hidden="true">×</button>
 <h5><i class="icon fas fa-ban"></i> Alert!</h5>
 {{ session('loginError') }}
 </div>
 @endif
 <form action="/login" method="post">
 @csrf
 <div class="input-group mb-3">
 <input type="email" class="form-control @error('email') is-invalid 
@enderror" placeholder="Email" id="email" name="email" value="{{ old('email') 
}}">
 <div class="input-group-append">
 <div class="input-group-text">
 <span class="fas fa-envelope"></span>
 </div>
 </div>
 @error('email')
 <div class="invalid-feedback">
 {{ $message }}
 </div>
 @enderror
 </div>
 <div class="input-group mb-3">
 <input type="password" class="form-control" placeholder="Password"
id="password" name="password">
 <div class="input-group-append">
 <div class="input-group-text">
 <span class="fas fa-lock"></span>
 </div>
 </div>
 </div>
 
 
 </div>
 <div class="card-footer">
 <button type="reset" class="btn btn-warning">Cancel</button>
 <button type="submit" class="btn btn-primary floatright">Login</button>
 </div>
 <!-- /.card-body -->
 </div>
 </form>
 <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script
src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>