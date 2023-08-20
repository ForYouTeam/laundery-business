@extends('Layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 2080.4px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Masyarakat Yang Ingin Buat Surat Keterangan Kematian</h3>
                                <a href="{{ route('domisili.pindahCreate') }}" class="btn btn-outline-primary">Tambah
                                    Data</a>
                                <!-- ... -->
                            </div>
                            <!-- /.card-header -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
