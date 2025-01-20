<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page">
    <meta name="author" content="Your Name">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        .form-bg {
            background:rgb(183, 224, 237);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-horizontal {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .form-horizontal .heading {
            font-size: 35px;
            font-weight: 700;
            padding-bottom: 30px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 30px;
        }
        .form-horizontal .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .form-horizontal .form-control {
            background: #f0f0f0;
            border: none;
            border-radius: 20px;
            padding: 10px 45px;
            height: 40px;
            transition: background 0.3s ease;
        }
        .form-horizontal .form-control:focus {
            background: #e0e0e0;
            outline: none;
            box-shadow: none;
        }
        .form-horizontal .form-group i {
            position: absolute;
            top: 12px;
            left: 20px;
            font-size: 17px;
            color: #c8c8c8;
        }
        .form-horizontal .form-control:focus + i {
            color: #00b4ef;
        }
        .form-horizontal .btn {
            background: #00b4ef;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 25px;
            transition: background 0.5s ease;
        }
        .form-horizontal .btn:hover {
            background: #008ace;
        }
    </style>
</head>
<body>
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="form-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="form-horizontal" action="/login" method="post">
                        <span class="heading">Log In</span>
                        <!-- CSRF Token -->
                        @csrf
                        <!-- Username -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <i class="fa fa-user"></i>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <i class="fa fa-lock"></i>
                        </div>
                        <!-- Login Button -->
                        <div class="form-group">
                            <button type="submit" class="btn">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
