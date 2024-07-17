@extends('layouts.admin.index')

@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#transaksi').DataTable();
        });
    </script>
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h1 class="my-4 text-center">List Transaksi</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-striped" id="transaksi">
                    <thead>
                        <tr>
                            <th>No. Invoice</th>
                            <th>Nama Pembeli</th>
                            <th>Email Pembeli</th>
                            <th>No. Telepon Pembeli</th>
                            <th>Nama Tiket</th>
                            <th>Nama Tribun</th>
                            <th>Pertandingan</th>
                            <th>Jumlah Tiket</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $trans)
                            <tr>
                                <td>{{ $trans->no_invoice }}</td>
                                <td>{{ $trans->nama }}</td>
                                <td>{{ $trans->email }}</td>
                                <td>{{ $trans->no_hp }}</td>
                                <td>{{ $trans->tiket->nama_tiket }}</td>
                                <td>{{ $trans->tiket->tribun }}</td>
                                <td>{{ $trans->tiket->jadwal_pertandingan->club1->nama }} vs
                                    {{ $trans->tiket->jadwal_pertandingan->club2->nama }}</td>
                                <td>{{ $trans->jumlah }}</td>
                                <td>
                                    @if ($trans->status == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($trans->status == 2)
                                        <span class="badge badge-info">Diproses</span>
                                    @elseif ($trans->status == 3)
                                        <span class="badge badge-success">Berhasil</span>
                                    @elseif ($trans->status == 4)
                                        <span class="badge badge-danger">Gagal</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($trans->status == 1 || $trans->status == 2)
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalKonfirmasi{{ $trans->id }}">
                                            Konfirmasi Pembayaran
                                        </button>
                                    @elseif ($trans->status == 3)
                                        <button type="button" class="btn btn-success btn-sm" disabled>
                                            Diterima
                                        </button>
                                    @elseif ($trans->status == 4)
                                        <button type="button" class="btn btn-danger btn-sm" disabled>
                                            Ditolak
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modalKonfirmasi{{ $trans->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalKonfirmasiLabel{{ $trans->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalKonfirmasiLabel{{ $trans->id }}">Konfirmasi
                                                Pembayaran
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>No. Invoice:</strong> {{ $trans->no_invoice }}</p>
                                            <p><strong>Nama Pembeli:</strong> {{ $trans->nama }}</p>
                                            <p><strong>Email Pembeli:</strong> {{ $trans->email }}</p>
                                            <p><strong>No. Telepon Pembeli:</strong> {{ $trans->no_hp }}</p>
                                            <p><strong>Nama Tiket:</strong> {{ $trans->tiket->nama_tiket }}</p>
                                            <p><strong>Nama Tribun:</strong> {{ $trans->tiket->tribun }}</p>
                                            <p><strong>Pertandingan:</strong>
                                                {{ $trans->tiket->jadwal_pertandingan->club1->nama }} vs
                                                {{ $trans->tiket->jadwal_pertandingan->club2->nama }}</p>
                                            <p><strong>Jumlah Tiket:</strong> {{ $trans->jumlah }}</p>
                                            <p><strong>Status: </strong>
                                                @if ($trans->status == 1)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif ($trans->status == 2)
                                                    <span class="badge badge-info">Diproses</span>
                                                @elseif ($trans->status == 3)
                                                    <span class="badge badge-success">Berhasil</span>
                                                @elseif ($trans->status == 4)
                                                    <span class="badge badge-danger">Gagal</span>
                                                @endif
                                            </p>
                                            <p><strong>Bukti Pembayaran:</strong></p>
                                            <center>
                                                <img src="{{ $trans->buktiBayar() }}" width="100%" alt="Bukti Pembayaran"
                                                    class="img-fluid">
                                            </center>
                                            <br>
                                            <form action="{{ route('admin.transaksi.konfirmasi', $trans->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" name="action" value="accept"
                                                    class="btn btn-success">Diterima</button>
                                                <button type="button" class="btn btn-danger" data-toggle="collapse"
                                                    data-target="#formTolak{{ $trans->id }}">Ditolak</button>
                                                <div id="formTolak{{ $trans->id }}" class="collapse mt-3">
                                                    <div class="form-group mb-2">
                                                        <label for="keterangan">Keterangan Penolakan</label>
                                                        <textarea class="form-control" name="keterangan" rows="3"></textarea>
                                                    </div>
                                                    <button type="submit" name="action" value="reject"
                                                        class="btn btn-danger">Submit
                                                        Penolakan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
