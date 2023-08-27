<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ 'AdminLTE-master' }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ 'AdminLTE-master' }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'AdminLTE-master' }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center">
                    <img src="{{ asset('AdminLTE-master') }}/dist/img/logologin.jpg" id="icon" width="50px"
                        height="50px" alt="User Icon" />
                    <h4>LOUNDRY BUSSINESS</h4>
                    <div id="loading-overlay" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <form id="formInputLogin" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            id="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ 'AdminLTE-master' }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'AdminLTE-master' }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'AdminLTE-master' }}/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        const apiUrl = 'loginproses'

        $(document).ready(function() {
            var formTambah = $('#formInputLogin');
            formTambah.on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Tampilkan indikator loading
                $('#loading-overlay').show();

                $.ajax({
                    type: 'POST',
                    url: `{{ url('${apiUrl}') }}`,
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        localStorage.setItem('token', data.access_token);
                        Swal.fire({
                            title: 'Success',
                            text: 'Berhasil Login',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.href = '/';
                        });

                        // Sembunyikan indikator loading setelah selesai
                        $('#loading-overlay').hide();
                    },
                    error: function(data) {
                        Swal.fire({
                            title: 'Error',
                            html: 'Login Failed',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true
                        });

                        // Sembunyikan indikator loading setelah selesai
                        $('#loading-overlay').hide();
                    }
                });
            });
        });
    </script>

</body>

</html>
{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo-palu.png') }}" style="width: 80px; height:90px">
    <title>LOUNDRY</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="{{ asset('AdminLTE-master') }}/dist/img/logologin.jpg" id="icon" alt="User Icon" />
                <h3>LB</h3>
            </div>
            <form id="loginForm" method="POST">
                @csrf
                <input type="text" id="usename" class="fadeIn second" name="username" placeholder="username"
                    autocomplete="current-email">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"
                    autocomplete="current-password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
            <div id="formFooter">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const apiUrl = 'loginproses'

        $(document).ready(function() {
            var formTambah = $('#loginForm');
            formTambah.on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $('#loading-overlay').show();
                $.ajax({
                    type: 'POST',
                    url: `{{ url('${apiUrl}') }}`,
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        localStorage.setItem('token', data.access_token);
                        // Mengganti SweetAlert dengan alert Bootstrap
                        $('.alert').removeClass('d-none').addClass('alert-success').html(
                            'Berhasil Login');
                        setTimeout(function() {
                            window.location.href = '/';
                        }, 2000);
                    },
                    error: function(data) {
                        // Mengganti SweetAlert dengan alert Bootstrap
                        $('.alert').removeClass('d-none').addClass('alert-danger').html(
                            'Email atau password salah');
                        setTimeout(function() {
                            $('.alert').addClass('d-none').removeClass(
                                'alert-danger alert-success').html('');
                        }, 5000);
                    }
                });
            });
        });
    </script>


</body>

</html> --}}
