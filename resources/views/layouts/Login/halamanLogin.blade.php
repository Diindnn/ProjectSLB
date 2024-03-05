<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .input-group {
            margin-left: 10px;
            margin-right: 10px;
            padding-right: 20px;
        }
        .social-auth-links {
            margin-left: 10px;
            margin-right: 10px;
        }
        /* Ganti warna background tombol login */
        .btn-custom {
            background-color: #315E77; /* Ganti dengan warna pilihan Anda */
            color: white;
        }
        /* Ganti warna teks tombol login */
        .btn-custom:hover,
        .btn-custom:active,
        .btn-custom:focus {
            background-color: #275067; /* Ganti dengan warna pilihan Anda saat tombol hover/active/focus */
            color: white; /* Ganti dengan warna teks yang kontras */
        }
    </style>
</head>

<body class="hold-transition login-page" style="background:#D8E1E6;">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card rounded-bottom">
            <div class="login-logo mt-5">
                <div class="logo-container text-center" style="margin-bottom: 20px;">
                    <img src="{{ asset('images') }}/logoslb.png" class="image" alt="SLB Insan Prima bestari"
                        style="max-width: 100%; height: auto; width: 125px; height: 125px;">
                </div>
                <h5 style="margin-bottom: 0px">Login Pengguna</h5>
            </div>
            <div class="card-body login-card-body rounded-bottom" style="padding-top: 0;">
                <p class="login-box-msg">Login menggunakan akun terdaftar</p>
                <form action="../../index3.html" method="post">
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-5">
                    <!-- Ganti kelas tombol menjadi .btn-custom -->
                    <a href="#" class="btn btn-block btn-custom">
                        <i class=""></i> Login
                    </a>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte-v3') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3') }}/dist/js/adminlte.min.js"></script>

</body>

</html>
