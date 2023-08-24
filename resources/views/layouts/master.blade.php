<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-master') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-master') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master') }}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{ asset('iziToast/css/iziToast.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" integrity="sha256-VJuwjrIWHWsPSEvQV4DiPfnZi7axOaiWwKfXaJnR5tA=" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('AdminLTE-master') }}/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>
        @include('layouts.navbar')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            @include('layouts.sidebar')
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-head')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-2024 <a href=>oneD|ATW</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ 'AdminLTE-master' }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ 'AdminLTE-master' }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/chart.js/Chart.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/sparklines/sparkline.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/moment/moment.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ 'AdminLTE-master' }}/dist/js/adminlte.js"></script>
    <script src="{{ 'AdminLTE-master' }}/dist/js/pages/dashboard.js"></script>
    <script src="{{ asset('iziToast/js/iziToast.js') }}"></script>
    <script src="{{ asset('js/PostAction.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js" integrity="sha256-S/HO+Ru8zrLDmcjzwxjl18BQYDCvFDD7mPrwJclX6U8=" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
