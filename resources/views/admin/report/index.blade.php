@extends('layouts.master')

@section('page-head')
    Data Report
@endsection



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
                    <button type="button" class="btn btn-outline-primary" id="btn-add">
                        Tambah Data
                    </button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                    <table id="reportTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>member</th>
                                <th>total order</th>
                                <th>progress</th>
                                <th>canceled</th>
                                <th>done</th>
                                <th>income</th>
                                <th>start</th>
                                <th>end</th>
                                <th style="width: 11%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['report'] as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->member }}</td>
                                    <td>{{ $d->total_order }}</td>
                                    <td>{{ $d->progress }}</td>
                                    <td>{{ $d->canceled }}</td>
                                    <td>{{ $d->done }}</td>
                                    <td>{{ $d->income }}</td>
                                    <td>{{ $d->start }}</td>
                                    <td>{{ $d->end }}</td>
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
                                    @if ($data['report']->currentPage() > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data['report']->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $data['report']->lastPage(); $i++)
                                        <li class="page-item {{ $data['report']->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                                href="{{ $data['report']->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($data['report']->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data['report']->nextPageUrl() }}"
                                                aria-label="Next">
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
    <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="addReportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="form-report"> --}}
                <div class="modal-body">
                    <!-- Add form fields here -->
                    <form id="form-paket">
                        <div class="form-group">
                            <label for="member">Member</label>
                            <select id="member_id" class="form-control">
                                <option value="" selected disabled>--pilih member--</option>
                                @foreach ($data['member'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_order">Total Order</label>
                            <input autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="total_order" name="total_order">
                            <small class="text-danger" id="total_order-alert"></small>
                        </div>
                        <div class="form-group">
                            <label autocomplete="OFF" for="progress">Progress</label>
                            <input placeholder="masukan nilai disini..." type="text" class="form-control" id="progress"
                                name="progress">
                            <small class="text-danger" id="progress-alert"></small>
                        </div>
                        <div class="form-group">
                            <label autocomplete="OFF" for="canceled">Canceled</label>
                            <input placeholder="masukan nilai disini..." type="text" class="form-control" id="canceled"
                                name="canceled">
                            <small class="text-danger" id="canceled-alert"></small>
                        </div>
                        {{--  --}}
                        <div class="form-group">
                            <label for="done">Done</label>
                            <input autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="done" name="done">
                            <small class="text-danger" id="done-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="income">Income</label>
                            <input autocomplete="OFF" placeholder="masukan nilai disini..." type="text"
                                class="form-control" id="income" name="income">
                            <small class="text-danger" id="income-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="start">Start</label>
                            <input autocomplete="OFF" placeholder="masukan nilai disini..." type="date"
                                class="form-control" id="start" name="start">
                            <small class="text-danger" id="start-alert"></small>
                        </div>
                        <div class="form-group">
                            <label for="end">End</label>
                            <input autocomplete="OFF" placeholder="masukan nilai disini..." type="date"
                                class="form-control" id="end" name="end">
                            <small class="text-danger" id="end-alert"></small>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="clearPayload()">Close</button>
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
            id: null,
            member_id: '',
            total_order: '',
            progress: '',
            canceled: '',
            done: '',
            income: '',
            start: '',
            end: '',
        }

        let url = "{{ config('app.url') }}"

        // JQURY CODE
        $(document).on('click', '#btn-add', () => {
            $('#addReportModal').modal('show')
        })

        $(document).on('click', '.btn-edit', function() {
            let dataId = $(this).data('id')
            let dataRow = $(this).data('row')

            payload.id = dataId
            for (const key in dataRow) {
                if (key === "created_at" || key === "updated_at" || key === "id") {
                    continue
                }
                $(`#${key}`).val(dataRow[key])
            }
            $('#addReportModal').modal('show')
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

        // VANILA CODE
        const setPayloadValue = async () => {
            for (const key in payload) {
                // // Hilangkan untuk tabel lainnya
                if (key === "id") {
                    continue
                }
                // // Batas
                payload[key] = $(`#${key}`).val()
            }
        }

        const clearPayload = async () => {
            clearAlert()
            for (const key in payload) {
                // // Hilangkan untuk tabel lainnya
                if (key === "id") {
                    continue
                }
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
                url: `${url}/api/v1/reports`,
                data: payload,
                success: (res) => {
                    iziToast.success({
                        title: 'Berhasil',
                        message: 'data telah disimpan',
                        position: 'topRight'
                    });

                    $('#addReportModal').modal('hide')
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
                            title: 'Maaf Ada Perbaikan',
                            message: 'Sedang terjadi maintenance pada server',
                            position: 'topRight'
                        })
                    }
                }
            });
        }

        const deleteByPayload = async (id) => {
            $.ajax({
                type: "DELETE",
                url: `${url}/api/v1/reports/${id}`,
                success: async (res) => {
                    iziToast.success({
                        title: 'Berhasil',
                        message: 'data telah dihapus',
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
