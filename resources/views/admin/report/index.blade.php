@extends('layouts.master')
@section('page-head')
    Data Report
@endsection

<style>

    .pagination-center {
        display: flex;
        justify-content: center;
    }
    .pagination-container {
        margin-top: 20px; /* Atur jarak yang diinginkan di sini */
    }

    </style>

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Data Report</h3>
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
                                <th>member Id</th>
                                <th>total order</th>
                                <th>progress</th>
                                <th>canceled</th>
                                <th>done</th>
                                <th>income</th>
                                <th>start</th>
                                <th>end</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->member_id }}</td>
                                    <td>{{ $d->total_order }}</td>
                                    <td>{{ $d->progress }}</td>
                                    <td>{{ $d->canceled }}</td>
                                    <td>{{ $d->done }}</td>
                                    <td>{{ $d->income }}</td>
                                    <td>{{ $d->start }}</td>
                                    <td>{{ $d->end }}</td>
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
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto; display: flex;">
                    <!-- Bagian kiri dengan margin kanan -->
                    <div style="flex: 1; margin-right: 20px;">
                        <form>
                            <div class="form-group">
                                <label for="member_id">Member Id</label>
                                <input type="text" class="form-control" id="member_id" name="member_id">
                            </div>
                            <div class="form-group">
                                <label for="total_order">Total Order</label>
                                <input type="text" class="form-control" id="total_order" name="total_order">
                            </div>
                            <div class="form-group">
                                <label for="progress">Progress</label>
                                <input type="text" class="form-control" id="progress" name="progress">
                            </div>
                            <div class="form-group">
                                <label for="canceled">Canceled</label>
                                <input type="text" class="form-control" id="canceled" name="canceled">
                            </div>

                        </form>
                    </div>
                    <!-- Bagian kanan -->
                    <div style="flex: 1;">
                        <form>
                            <div class="form-group">
                                <label for="done">Done</label>
                                <input type="text" class="form-control" id="done" name="done">
                            </div>
                            <div class="form-group">
                                <label for="income">Income</label>
                                <input type="text" class="form-control" id="income" name="income">
                            </div>
                            <div class="form-group">
                                <label for="start">Start</label>
                                <input type="text" class="form-control" id="start" name="start">
                            </div>
                            <div class="form-group">
                                <label for="end">End</label>
                                <input type="text" class="form-control" id="end" name="end">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection
