@extends('layouts.master')

@section('page-head')
    Data Member
@endsection
<style>
    .pagination-center {
        display: flex;
        justify-content: center;
    }

    .pagination-container {
        margin-top: 20px;
        /* Atur jarak yang diinginkan di sini */
    }
</style>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Data Member</h3>
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
                                <th>id</th>
                                <th>name</th>
                                <th>nik</th>
                                <th>address</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>laundry Id</th>
                                <th>verify</th>
                                <th>user Id</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->nik }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->laundry_id }}</td>
                                    <td>{{ $d->verify }}</td>
                                    <td>{{ $d->user_id }}</td>

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
    <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Tambah Data Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="form-member">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                        class="form-control" id="name" name="name">
                                    <small class="text-danger" id="name-alert"></small>
                                </div>
                                <div class="form-group">
                                    <label autocomplete="OFF" for="nik">Nik</label>
                                    <input placeholder="masukan nilai disini..." type="number" class="form-control"
                                        id="nik" name="nik">
                                    <small class="text-danger" id="nik-alert"></small>
                                </div>
                                <div class="form-group">
                                    <label autocomplete="OFF" for="address">Address</label>
                                    <input placeholder="masukan nilai disini..." type="text" class="form-control"
                                        id="address" name="address">
                                    <small class="text-danger" id="address-alert"></small>
                                </div>
                                <div class="form-group">
                                    <label autocomplete="OFF" for="phone">Phone</label>
                                    <input placeholder="masukan nilai disini..." type="number" class="form-control"
                                        id="phone" name="phone">
                                    <small class="text-danger" id="phone-alert"></small>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="form-member">
                                <div class="form-group">
                                    <label autocomplete="OFF" for="email">Email</label>
                                    <input placeholder="masukan nilai disini..." type="text" class="form-control"
                                        id="email" name="email">
                                    <small class="text-danger" id="email-alert"></small>
                                </div>
                                <div class="form-group">
                                    <label autocomplete="OFF" for="laundry_id">Laundry Id</label>
                                    <input placeholder="masukan nilai disini..." type="text" class="form-control"
                                        id="laundry_id" name="laundry_id">
                                    <small class="text-danger" id="laundry_id-alert"></small>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="laundry_id">Laundry</label>
                                    <select class="form-control" id="laundry_id" name="laundry_id">
                                        <option value="">Pilih Laundry</option>
                                        @foreach ($laundryData as $laundry)
                                            <option value="{{ $laundry->id }}">{{ $laundry->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger" id="laundry_id-alert"></small>
                                </div> --}}
                                <div class="form-group">
                                    <label autocomplete="OFF" for="verify">Verify</label>
                                    <input placeholder="masukan nilai disini..." type="text" class="form-control"
                                        id="verify" name="verify">
                                    <small class="text-danger" id="verify-alert"></small>
                                </div>
                                <div class="form-group">
                                    <label autocomplete="OFF" for="user_id">User Id</label>
                                    <input placeholder="masukan nilai disini..." type="number" class="form-control"
                                        id="user_id" name="user_id">
                                    <small class="text-danger" id="user_id-alert"></small>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="user_id">User</label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        <option value="">Pilih User</option>
                                        @foreach ($userData as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger" id="user_id-alert"></small>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="clearAlert()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendPayload()">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        // Global variabel
        let payload = {
            name: '',
            nik: '',
            address: '',
            phone: '',
            email: '',
            laundry_id: '',
            verify: '',
            user_id: '',
        }

        let url = "{{ config('app.url') }}"

        // JQURY CODE
        $(document).on('click', '#btn-add', () => {
            $('#addMemberModal').modal('show')
        })

        // VANILA CODE
        const setPayloadValue = async () => {
            for (const key in payload) {
                // // Hilangkan untuk tabel lainnya
                // if (key === "scope") {
                //     continue
                // }
                // // Batas
                payload[key] = $(`#${key}`).val()
            }
        }

        const clearPayload = async () => {
            for (const key in payload) {
                // // Hilangkan untuk tabel lainnya
                // if (key === "scope") {
                //     continue
                // }
                // // Batas
                payload[key] = ""
                $(`#${key}`).val('')
            }
        }

        const clearAlert = async () => {
            for (const key in payload) {
                // // Hilangkan untuk tabel lainnya
                // if (key === "scope" || key === "password_confirmation") {
                //     continue
                // }
                // // Batas
                $(`#${key}-alert`).html('')
            }
        }

        async function sendPayload() {
            await setPayloadValue();
            clearAlert()
            $.ajax({
                type: "POST",
                url: `${url}/api/v1/members`,
                data: payload,
                success: (res) => {
                    iziToast.success({
                        title: 'Berhasil',
                        message: 'data telah disimpan',
                        position: 'topRight'
                    });

                    $('#addMemberModal').modal('hide')
                    clearPayload()
                },
                error: (err) => {
                    if (err.responseJSON.errors) {
                        let data = err.responseJSON.errors.data
                        for (const key in data) {
                            $(`#${key}-alert`).html(data[key])
                        }
                    }
                }
            });
        }
    </script>
@endsection
