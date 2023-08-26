@extends('layouts.master')

@section('page-head')
    Data laundry
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
                    <h3 class="card-title">Daftar Data Laundry</h3>
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
                                <th>address</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>location</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                {{-- @php
                                    $no = 0;
                                @endphp --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->location }}</td>
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
    <div class="modal fade" id="addLaundryModal" tabindex="-1" role="dialog" aria-labelledby="addLaundryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data Laundry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form fields here -->
                    <form id="form-laundry">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="name" name="name">
                            <small class="text-danger" id="name-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="address" name="address">
                            <small class="text-danger" id="laundry-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="number"
                                class="form-control" id="phone" name="phone">
                            <small class="text-danger" id="phone-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="email" name="email">
                            <small class="text-danger" id="email-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input autofocus autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="location" name="location">
                            <small class="text-danger" id="location-alert"></small>
                        </div>
                        <!-- Add more form fields for other data -->
                    </form>
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
            address: '',
            phone: '',
            email: '',
            location: '',
        }

        let url = "{{ config('app.url') }}"

        // JQURY CODE
        $(document).on('click', '#btn-add', () => {
            $('#addLaundryModal').modal('show')
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
                url: `${url}/api/v1/laundrys`,
                data: payload,
                success: (res) => {
                    iziToast.success({
                        title: 'Berhasil',
                        message: 'data telah disimpan',
                        position: 'topRight'
                    });

                    $('#addLaundryModal').modal('hide')
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
