@extends('Layouts.master');
@section('content')
    ;
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Welcome! @auth <span>{{ auth()->user()->name }}</span>
                            @endauth
                            <i class="fa-sharp fa-solid fa-face-smile text-warning"></i>
                            <a href="javascript:;" class="">Enjoy your work !!!</a>
                        </h2>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->
        </div>
    @endsection
