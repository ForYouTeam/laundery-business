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
                    <button type="button" class="btn btn-outline-primary" id="btn-add">
                        Tambah Data
                    </button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                    <table id="userTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 4%">no</th>
                                <th>name</th>
                                <th>username</th>
                                <th>scope</th>
                                <th style="width: 11%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->scope }}</td>
                                    <td>
                                        <button type="button" data-id="{{ $d->id }}" data-row="{{ $d }}"
                                            class="btn btn-outline-primary btn-sm btn-edit">Edit</button>
                                        <button type="button" data-id="{{ $d->id }}"
                                            class="btn btn-outline-danger btn-sm btn-delete-data">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (count($data) >= 1)
                        <div class="d-flex justify-content-end mt-4">
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
                    @endif

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
                    <form id="form-user">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text" class="form-control" id="name" name="name">
                            <small class="text-danger" id="name-alert"></small>
                        </div>
                        <div class="form-group">
                            <label autocomplete="OFF" for="username">Username</label>
                            <input placeholder="masukan nilai disini..." type="text" class="form-control" id="username" name="username">
                            <small class="text-danger" id="username-alert"></small>
                        </div>
                        <div class="form-group">
                            <label autocomplete="OFF" for="password">Password</label>
                            <input placeholder="masukan nilai disini..." type="password" class="form-control" id="password" name="password">
                            <small class="text-danger" id="password-alert"></small>
                        </div>
                        <div class="form-group">
                            <label autocomplete="OFF" for="password">Konfirmasi Password</label>
                            <input placeholder="masukan nilai disini..." type="password" class="form-control" id="password_confirmation" name="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearPayload()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendPayload()">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // GLOBAL variabel
        let payload = {
            id                    : null ,
            name                  : '' ,
            username              : '' ,
            password              : '' ,
            password_confirmation : '' ,
            scope                 : 'admin',
        }

        let url = "{{config('app.url')}}"

        // JQUERY code
        $(document).on('click', '#btn-add', () => {
            $('#addUserModal').modal('show')
        })

        $(document).on('click', '.btn-edit', function() {
            let dataId  = $(this).data('id' )
            let dataRow = $(this).data('row')

            payload.id = dataId
            for (const key in dataRow) {
                if (key === "created_at" || key === "updated_at" || key === "scope" || key === "id") {
                    continue
                }
                $(`#${key}`).val(dataRow[key])
            }
            $('#addUserModal').modal('show')
        })

        $(document).on('click', '.btn-delete-data', function() {
            let dataId = $(this).data('id')
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Proses ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteByPayload(dataId)
                }
            })
        })

        // VANILA code
        const setPayloadValue = async () => {
            for (const key in payload) {
                // Hilangkan untuk tabel lainnya
                if (key === "scope" || key === "id") {
                    continue
                }
                // Batas
                payload[key] = $(`#${key}`).val()
            }
        }

        const clearPayload = async () => {
            payload.id = null
            for (const key in payload) {
                // Hilangkan untuk tabel lainnya
                if (key === "scope" || key === "id") {
                    continue
                }
                // Batas
                payload[key] = ""
                $(`#${key}`).val('')
            }
            clearAlert()
        }

        const clearAlert = async () => {
            for (const key in payload) {
                // Hilangkan untuk tabel lainnya
                if (key === "scope" || key === "password_confirmation") {
                    continue
                }
                // Batas
                $(`#${key}-alert`).html('')
            }
        }

        async function sendPayload() {
            await setPayloadValue();
            clearAlert()
            $.ajax({
                type: "POST",
                url: `${url}/api/v1/users`,
                data: payload,
                success: async (res) => {
                    iziToast.success({
                        title   : 'Berhasil',
                        message : 'data telah disimpan',
                        position: 'topRight'
                    });

                    $('#addUserModal').modal('hide')
                    clearPayload()
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                },
                error: (err) => {
                    if (err.responseJSON.errors) {
                        let data = err.responseJSON.errors.data
                        for (const key in data) {
                            $(`#${key}-alert`).html(data[key])
                        }
                    }
                    if (err.status === 500) {
                        iziToast.error({
                            title    : 'Maaf Ada Perbaikan' ,
                            message  : 'Sedang terjadi maintenance pada server',
                            position: 'topRight'
                        })
                    }
                }
            });
        }

        const deleteByPayload = async (id) => {
            $.ajax({
                type: "DELETE",
                url: `${url}/api/v1/users/${id}`,
                success: async (res) => {
                    iziToast.success({
                        title   : 'Berhasil',
                        message : 'data telah dihapus',
                        position: 'topRight'
                    });
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                },
                error: (err) => {
                    console.log(err);
                }
            });
        }

    </script>
@endsection
