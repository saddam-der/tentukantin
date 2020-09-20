<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container ">

        <div class="row">
            <div class="col-xl-10 offset-1 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 offset-3">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-sm-0">
                                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }} "
                                                    id="exampleFirstName" placeholder="Nama" name="name"
                                                    value="{{ old('name') }}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                id="exampleInputEmail" placeholder="Email" name="email"
                                                value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                            <div class="invalid-feedback ml-3">
                                                {{$errors->first('email')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    id="exampleInputPassword" placeholder="Password" name="password" required>
                                            </div>
                                            @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('password')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                    id="exampleInputPassword" placeholder="Konfirmasi Password"
                                                    name="password_confirmation" required>
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('password_confirmation')}}
                                            </div>
                                            @endif
                                        </div>
                                        <hr>
                                        <button type="submit" name="" id="" class="btn btn-primary btn-user btn-block"
                                            btn-lg btn-block">Daftar</button><hr>
                                    </form>

                                    <div class="text-center mt-2">
                                        <a class="small" href="{{route('login')}}">Sudah Punya Akun? Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
