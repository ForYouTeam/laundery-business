@extends('layouts.master')

@section('page-head')
    Data User
@endsection



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Data User</h3>
                    <p></p>
                </div>
                <!-- Tombol Tambah Data ditempatkan di bawah judul -->
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addUserModal">
                        Tambah Data
                    </button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                    <table id="userTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>username</th>
                                <th>password</th>
                                <th>scope</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->password }}</td>
                                    <td>{{ $d->scope }}</td>
                                    <td>
                                        <button type="button" data-id="{{ $d->id }}" href="#"
                                            class="btn btn-outline-primary btn-sm btn-edit">Edit</button>
                                        <button type="button" data-id="{{ $d->id }}" href="#"
                                            class="btn btn-outline-danger btn-sm btn-delete">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($data->currentPage() > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $data->lastPage(); $i++)
                                    <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($data->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form fields here -->
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="scope">Scope</label>
                            <input type="text" class="form-control" id="scope" name="scope">
                        </div>
                        <!-- Add more form fields for other data -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection
